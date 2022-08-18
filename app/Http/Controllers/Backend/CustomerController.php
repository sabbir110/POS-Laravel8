<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Customer::orderBy('id', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '';
                    $editUrl = route('customer.edit', $data->id);
                    $deleteUrl = route('customer.destroy',$data->id);
                    if ($data->status != 5) {
                        $button = ' <a href="javascript:void(0)" data-title="Edit customer Info.."  data-action="' . $editUrl . '" data-modal="common_modal_lg" data-id="' . $data->id . '" class="open_modal text-primary mx-1"><i class="bi-pencil-square h4"></i></a>';

                        $button .= '&nbsp;&nbsp;';
                        $button .= '<a href="javascript:void(0)" data-action="' . $deleteUrl . '" data-id="' . $data->id . '"  class="delete_data text-danger mx-1 deleteIcon"> <i class="bi-trash h4"></i></a>';
                    }
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.customers.view_customer');
    }

    public function create_customer_form()
    {
        return view('backend.customers.create_customer_form');
    }
    public function create()
    {
        return view('backend.customers.create_customer');
    }
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|min:2|max:191',
                'mobile' => 'required',
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
            Customer::create($data);
            $status = ['status' => 200, 'message' => "Data Added success"];
        } else {
            $data['updated_by'] = Auth::id();
            Customer::where('id', $id)->update($data);
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
        $customer_data = Customer::find($id);
        return view('backend.customers.create_customer_form', compact('customer_data'));
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        $stdData = Customer::destroy($id);
        return response()->json(['status' => 200, 'message' => "Student Data Deleted success!!!!"]);
    }
}
