        @php
            $supplierData = isset($supplierData) && !empty($supplierData) ? $supplierData : [];
            $name = isset($supplierData->name) ? $supplierData->name : '';
            $mobile_no = isset($supplierData->mobile_no) ? $supplierData->mobile_no : '';
            $address = isset($supplierData->address) ? $supplierData->address : '';
            $email = isset($supplierData->email) ? $supplierData->email : '';
            $id = isset($supplierData->id) ? $supplierData->id : '';
            // dd($id);
        @endphp
        <form action="{{ route('supplier.store') }}" id="user_form" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ $id }}">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Supplier Name</label><strong class="text-danger">*</strong>
                    <input type="text" name="name" class="form-control" value="{{ $name }}"
                        placeholder="Enter Name">
                    <span class="text-danger error_text name-error"></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Mobile No.</label><strong class="text-danger">*</strong>
                    <input type="text" name="mobile" class="form-control" value="{{ $mobile_no }}"
                        placeholder="Enter Mobile No">
                    <span class="text-danger error_text mobile-error"></span>
                </div>
                    <div class="form-group col-md-6">
                        <label for="">Email</label>
                        <input type="email" name="email" value="{{ $email }}" class="form-control"
                            placeholder="Enter Email">
                        <span class="text-danger error_text email-error"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Address</label><strong class="text-danger">*</strong>
                        <input type="text" name="address" value="{{ $address }}" class="form-control"
                            placeholder="Enter Address">
                        <span class="text-danger error_text address-error"></span>
                    </div>


                <div class="form-group col-md-12">
                    @php
                        $url = route('supplier.index');
                    @endphp
                    <button type="submit" onclick="saveUpdate(this,'{{ $url }}','#datatable')"
                        class="btn btn-info float-right"><i class="bi bi-cloud-download"></i> {{ $id ? "Update" : "Save" }}</button>
                </div>
            </div>
        </form>
