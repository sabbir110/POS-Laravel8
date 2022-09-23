<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::orderBy('id', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('supplier_id', function ($data) {
                    $supplier_id = $data['supplier']['name'];
                    return $supplier_id;
                })
                ->addColumn('unit_id', function ($data) {
                    $supplier_id = $data['unit']['unit_name'];
                    return $supplier_id;
                })
                ->addColumn('category_id', function ($data) {
                    $supplier_id = $data['category']['category_name'];
                    return $supplier_id;
                })
                ->addColumn('action', function ($data) {
                    $button = '';
                    $editUrl = route('product.edit', $data->id);
                    $deleteUrl = route('product.destroy', $data->id);
                        $button = ' <a href="javascript:void(0)" data-title="Edit product Info.."  data-action="' . $editUrl . '" data-modal="common_modal_lg" data-id="' . $data->id . '" class="open_modal text-primary mx-1"><i class="nav-icon fas fa-edit"></i>
                        </a>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<a href="javascript:void(0)" data-action="' . $deleteUrl . '" data-id="' . $data->id . '"  class="delete_data text-danger mx-1 deleteIcon"><i class="far fa-trash-alt"></a>';

                    return $button;
                })

                ->rawColumns(['action','supplier_id','unit_id'])
                ->make(true);
        }

        return view('backend.product.view_product');
    }
    public function create_product_form()
    {
        $data['supplier'] = Supplier::all();
        $data['unit'] = Unit::all();
        $data['category'] = Category::all();
        return view('backend.product.create_product_form', $data);
    }

    public function create()
    {
        $data['supplier'] = Supplier::all();
        $data['unit'] = Unit::all();
        $data['category'] = Category::all();
        return view('backend.product.create_product', $data);
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'supplier' => 'required',
                'category' => 'required',
                'unit' => 'required',
                'product_name' => 'required|min:2|max:50',
            ]
        );
        $id = $request->product_id;
        $data = [];
        $data = [
            'supplier_id' => $request->supplier,
            'category_id' => $request->category,
            'unit_id' => $request->unit,
            'product_name' => $request->product_name,
        ];

        if ($id == null || $id == "") {
            $data['created_by'] = Auth::id();
            Product::create($data);
            $status = ['status' => 200, 'message' => "Data Added success"];
        } else {
            $data['updated_by'] = Auth::id();
            Product::where('id', $id)->update($data);
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
        $data['edit_category'] =Product::find($id);
        $data['supplier'] = Supplier::all();
        $data['unit'] = Unit::all();
        $data['category'] = Category::all();
        return view('backend.product.create_product_form',$data);
    }

    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        $product = Product::destroy($id);
        return response()->json(['status' => 200, 'message' => "Product Deleted success!!!!"]);
    }
}
