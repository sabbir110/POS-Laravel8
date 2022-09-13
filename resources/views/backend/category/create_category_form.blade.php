        @php
            $categoryData = isset($category_data) && !empty($category_data) ? $category_data : [];
            $category_name = isset($categoryData->category_name) ? $categoryData->category_name : '';
            $id = isset($categoryData->id) ? $categoryData->id : '';
            // dd($id);
        @endphp
        <form action="{{ route('category.store') }}" id="user_form" method="POST">
            @csrf
            <input type="hidden" name="category_id" value="{{ $id }}">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Category Name</label><strong class="text-danger">*</strong>
                    <input type="text" name="category_name" class="form-control" value="{{ $category_name }}"
                        placeholder="Enter Category Name">
                    <span class="text-danger error_text category_name-error"></span>
                </div>

                <div class="form-group col-md-12">
                    @php
                        $url = route('category.index');
                    @endphp
                    <button type="submit" onclick="saveUpdate(this,'{{ $url }}','#datatable')"
                        class="btn btn-info float-right"><i class="bi bi-cloud-download"></i>
                        {{ $id ? 'Update' : 'Save' }}</button>
                </div>
            </div>
        </form>
