<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class SupplierController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Supplier::orderBy('id', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '';
                    $editUrl = route('supplier.edit', $data->id);
                    $deleteUrl = route('supplier.destroy',$data->id);
                    if ($data->status != 5) {
                        $button = ' <a href="javascript:void(0)" data-title="Edit Supplier Info.."  data-action="' . $editUrl . '" data-modal="common_modal_lg" data-id="' . $data->id . '" class="open_modal text-primary mx-1"><i class="bi-pencil-square h4"></i></a>';

                        $button .= '&nbsp;&nbsp;';
                        $button .= '<a href="javascript:void(0)" data-action="' . $deleteUrl . '" data-id="' . $data->id . '"  class="delete_data text-danger mx-1 deleteIcon"> <i class="bi-trash h4"></i></a>';
                    }
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.suppliers.view_supplier');
    }
    public function createForm()
    {
        return view('backend.suppliers.create_supplier_form');
    }
    public function create()
    {
        return view('backend.suppliers.create_supplier');
    }
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|min:2|max:191',
                'mobile' => 'required',
                'address' => 'required',
            ]
        );
        $id = $request->user_id;
        $data = [];
        $data = [
            'name' => $request->name,
            'mobile_no' => $request->mobile,
            'address' => $request->address,
            'email' => $request->email,
        ];

        if ($id == null || $id == "") {
            $data['created_by'] = Auth::id();
            Supplier::create($data);
            $status = ['status' => 200, 'message' => "Data Added success"];
        } else {
            $data['updated_by'] = Auth::id();
            Supplier::where('id', $id)->update($data);
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
        $supplierData = Supplier::find($id);
        return view('backend.suppliers.create_supplier_form', compact('supplierData'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $stdData = Supplier::destroy($id);
        return response()->json(['status' => 200, 'message' => "Student Data Deleted success!!!!"]);
    }
}
