<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
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
}
