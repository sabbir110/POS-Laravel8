<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Category::orderBy('id', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = '';
                    $editUrl = route('category.edit', $data->id);
                    $deleteUrl = route('category.destroy',$data->id);
                    if ($data->status != 5) {
                        $button = ' <a href="javascript:void(0)" data-title="Edit category Info.."  data-action="' . $editUrl . '" data-modal="common_modal_lg" data-id="' . $data->id . '" class="open_modal text-primary mx-1"><i class="nav-icon fas fa-edit"></i>
                        </a>';

                        $button .= '&nbsp;&nbsp;';
                        $button .= '<a href="javascript:void(0)" data-action="' . $deleteUrl . '" data-id="' . $data->id . '"  class="delete_data text-danger mx-1 deleteIcon"><i class="far fa-trash-alt"></a>';
                    }
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.category.view_category');
    }

    public function create_category_form()
    {
        return view('backend.category.create_category_form');
    }
    public function create()
    {
        return view('backend.category.create_category');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'category_name' => 'required|min:2|max:50',
            ]
        );
        $id = $request->category_id;
        $data = [];
        $data = [
            'category_name' => $request->category_name,
        ];

        if ($id == null || $id == "") {
            $data['created_by'] = Auth::id();
            Category::create($data);
            $status = ['status' => 200, 'message' => "Data Added success"];
        } else {
            $data['updated_by'] = Auth::id();
            Category::where('id', $id)->update($data);
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
        $category_data = Category::find($id);
        return view('backend.category.create_category_form', compact('category_data'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $Category = Category::destroy($id);
        return response()->json(['status' => 200, 'message' => "Category Deleted success!!!!"]);
    }
}
