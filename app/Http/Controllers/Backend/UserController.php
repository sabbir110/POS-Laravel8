<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function view(Request $request)
    {

        if ($request->ajax()) {
            $data = User::orderBy('id', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '';
                    $editUrl = route('user.edit');
                    $deleteUrl = route('user.delete');
                    if ($data->status != 5) {
                        $button = ' <a href="javascript:void(0)" data-title="Edit User Info.."  data-action="' . $editUrl . '" data-modal="common_modal_lg" data-id="' . $data->id . '" class="open_modal text-primary mx-1"><i class="bi-pencil-square h4"></i></a>';

                        $button .= '&nbsp;&nbsp;';
                        $button .= '<a href="javascript:void(0)" data-action="' . $deleteUrl . '" data-id="' . $data->id . '"  class="delete_data text-danger mx-1 deleteIcon"> <i class="bi-trash h4"></i></a>';
                    }
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.user.view_user');
    }

    public function create()
    {
        return view('backend.user.create_user');
    }

    public function createForm()
    {
        return view('backend.user.create_user_form');
    }

    public function store(Request $request)
    {
        $id = $request->user_id;
        $data = [];
        $data = [
            'user_type' => $request->user_type,
            'name' => $request->name,
            'password' => bcrypt($request->password1),
        ];

        if ($id == null || $id == "") {
            $this->validate(
                $request,
                [
                    'user_type' => 'required',
                    'email' => 'required|email|unique:users',
                    'name' => 'required|min:2|max:191',
                    'password1' => 'required|min:8|max:20',
                    'password2' => 'required|same:password1',
                ],
                [
                    'user_type.required' => "User type Required..",
                    'name.required' => "Name Fill Required..",
                    'password1.required' => "Password Required..",
                    'password2.required' => "Need Comfirm Password",
                    'password2.same' => "Password doesn't Match..",
                ]
            );
            $data['au_entry_at'] = Auth::id();
            $data['email'] = $request->email;
            User::create($data);
            $status = ['status' => 200, 'message' => "Data Added success"];
        } else {
            User::where('id', $id)->update($data);
            $status = ['status' => 200, 'message' => "Data Updated success"];
        }
        return response()->json($status);
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $userData = User::find($id);
        return view('backend.user.create_user_form', compact('userData'));
    }

    public function delete(Request $request)
    {
        $stdData = User::destroy($request->id);
        return response()->json(['status' => 200, 'message' => "Student Data Deleted success!!!!"]);
    }
}
