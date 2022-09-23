        @php
            $edit_category_data = isset($edit_category) && !empty($edit_category) ? $edit_category : [];
            $id = isset($edit_category_data->id) ? $edit_category_data->id : '';
            $supplier_id = isset($edit_category_data->supplier_id) ? $edit_category_data->supplier_id : '';
            $unit_id = isset($edit_category_data->unit_id) ? $edit_category_data->unit_id : '';
            $category_id = isset($edit_category_data->category_id) ? $edit_category_data->category_id : '';
            $product_name = isset($edit_category_data->product_name) ? $edit_category_data->product_name : '';
        @endphp
        <form action="{{ route('product.store') }}" id="user_form" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $id }}">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Supplier</label><strong class="text-danger">*</strong>
                        <select name="supplier" id="" class="form-control">
                            <option value="">Select Supplier</option>
                            @if (isset($supplier))
                            @foreach ($supplier as $data)
                            <option value="{{ $data->id }}"  {{ ($data->id == $supplier_id ? 'selected' : '') }}>{{ $data->name }}</option>
                            @endforeach

                            @endif
                        </select>
                    <span class="text-danger error_text supplier-error"></span>
                </div>

                <div class="form-group col-md-6">
                    <label for="">Category</label><strong class="text-danger">*</strong>
                        <select name="category" id="" class="form-control">
                            <option value="">Select Category</option>
                            @if (isset($category))
                            @foreach ($category as $data)
                            <option value="{{ $data->id }}" {{ ($data->id == $category_id ? 'selected' : '') }}>{{ $data->category_name }}</option>
                            @endforeach

                            @endif
                        </select>
                    <span class="text-danger error_text category-error"></span>
                </div>

                <div class="form-group col-md-6">
                    <label for="">Unit</label><strong class="text-danger">*</strong>
                        <select name="unit" id="" class="form-control">
                            <option value="">Select Unit</option>
                            @if (isset($unit))
                            @foreach ($unit as $data)
                            <option value="{{ $data->id }}" {{ ($data->id == $unit_id ? 'selected' : '') }}>{{ $data->unit_name }}</option>
                            @endforeach

                            @endif
                        </select>
                    <span class="text-danger error_text unit-error"></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Product Name</label><strong class="text-danger">*</strong>
                    <input type="text" name="product_name" class="form-control" value="{{ $product_name }}"
                        placeholder="Enter product Name">
                    <span class="text-danger error_text product_name-error"></span>
                </div>

                <div class="form-group col-md-12">
                    @php
                        $url = route('product.index');
                    @endphp
                    <button type="submit" onclick="saveUpdate(this,'{{ $url }}','#datatable')"
                        class="btn btn-info float-right"><i class="bi bi-cloud-download"></i>
                        {{ $id ? 'Update' : 'Save' }}</button>
                </div>
            </div>
        </form>
