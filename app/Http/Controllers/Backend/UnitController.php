<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class UnitController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Unit::orderBy('id', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '';
                    $editUrl = route('unit.edit', $data->id);
                    $deleteUrl = route('unit.destroy', $data->id);
                    if ($data->status != 5) {
                        $button = ' <a href="javascript:void(0)" data-title="Edit unit Info.."  data-action="' . $editUrl . '" data-modal="common_modal_lg" data-id="' . $data->id . '" class="open_modal text-primary mx-1"><i class="nav-icon fas fa-edit"></i></a>';

                        $button .= '&nbsp;&nbsp;';
                        $button .= '<a href="javascript:void(0)" data-action="' . $deleteUrl . '" data-id="' . $data->id . '"  class="delete_data text-danger mx-1 deleteIcon"><i class="far fa-trash-alt"></i></a>';
                    }
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.unit.view_unit');
    }

    public function create_unit_form()
    {
        return view('backend.unit.create_unit_form');
    }

    public function create()
    {
        return view('backend.unit.create_unit');
    }

    public function store(Request $request)
    {

        $this->validate(
            $request,
            [
                'unit_name' => 'required|min:1|max:10',
            ]
        );
        $id = $request->user_id;
        $data = [];
        $data = [
            'unit_name' => $request->unit_name,
        ];

        if ($id == null || $id == "") {
            $data['created_by'] = Auth::id();
            Unit::create($data);
            $status = ['status' => 200, 'message' => "Data Added success"];
        } else {
            $data['updated_by'] = Auth::id();
            Unit::where('id', $id)->update($data);
            $status = ['status' => 200, 'message' => "Data Updated success"];
        }
        return response()->json($status);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $unit_data = Unit::find($id);
        return view('backend.unit.create_unit_form', compact('unit_data'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $stdData = Unit::destroy($id);
        return response()->json(['status' => 200, 'message' => "Unit Deleted success!!!!"]);
    }
}
