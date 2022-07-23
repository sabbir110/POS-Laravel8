<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class UserController extends Controller
{
    public function view(Request $request)
    {
        if ($request->ajax()) {
            $data = User::orderBy('id', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    // $editUrl = route('edit.student');
                    // $deleteUrl = route('student.delete');
                    $button = ' <a href="javascript:void(0)" data-title="Update Student Info.."  data-action="" data-modal="common_modal" data-id="' . $data->id . '" class="open_modal text-primary mx-1"><i class="bi-pencil-square h4"></i></a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="javascript:void(0)" data-action="" data-id="' . $data->id . '"  class="delete_data text-danger mx-1 deleteIcon"> <i class="bi-trash h4"></i></a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.user.view_user');
    }

    public function create(){
        return "<h1>Create User</h1>";
    }

    public function createForm(){
        return view('backend.user.create_user_form');
    }
}
