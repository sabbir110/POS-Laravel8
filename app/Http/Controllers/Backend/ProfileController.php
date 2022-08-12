<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function view()
    {

        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.user.profile.view_profile', compact('user'));
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $userData = User::find($id);
        return view('backend.user.profile.edit_user_profile_form', compact('userData'));
    }

    public function store(Request $request)
    {
        $id = $request->user_id;
        $fileName = '';
        if ($request->file('image')) {
            if (isset($request->image_id)) {
                Storage::delete('public/upload/user_image/' . $request->image_id);
            }
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/upload/user_image/', $fileName);
        } else {
            $fileName = $request->image_id;
        }
        $data = [
            'name' => $request->name,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'gender' => $request->gender,
            'image' => $fileName,
        ];
        User::where('id', $id)->update($data);

        return response()->json(['status' => 200, 'message' => "Data Updated success"]);
    }

    public function change_password()
    {
        return view('backend.user.profile.change_password');
    }

    public function update_password(Request $request)
    {
        $this->validate(
            $request,
            [
                'old_password' =>[
                    'required', function($attribute, $value, $fail){
                        if( !\Hash::check($value, Auth::user()->password) ){
                            return $fail(__('The current password is incorrect'));
                        }
                    },
                    'min:8',
                    'max:30'
                 ],
                'new_password' => 'required|min:8|max:20',
                'confirm_password' => 'required|same:new_password',
            ]
        );

        User::find(Auth::user()->id)->update(['password'=>bcrypt($request->new_password)]);
        return response()->json(['status' => 200, 'message' => "Password Change success"]);
    }
}
