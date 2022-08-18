        @php
            $customer_data = isset($customer_data) && !empty($customer_data) ? $customer_data : [];
            $name = isset($customer_data->name) ? $customer_data->name : '';
            $mobile_no = isset($customer_data->mobile_no) ? $customer_data->mobile_no : '';
            $address = isset($customer_data->address) ? $customer_data->address : '';
            $email = isset($customer_data->email) ? $customer_data->email : '';
            $id = isset($customer_data->id) ? $customer_data->id : '';
            // dd($id);
        @endphp
        <form action="{{ route('customer.store') }}" id="user_form" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ $id }}">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Customer Name</label><strong class="text-danger">*</strong>
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
                        <label for="">Address</label>
                        <input type="text" name="address" value="{{ $address }}" class="form-control"
                            placeholder="Enter Address">
                        <span class="text-danger error_text address-error"></span>
                    </div>

                <div class="form-group col-md-12">
                    @php
                        $url = route('customer.index');
                    @endphp
                    <button type="submit" onclick="saveUpdate(this,'{{ $url }}','#datatable')"
                        class="btn btn-info float-right"><i class="bi bi-cloud-download"></i> {{ $id ? "Update" : "Save" }}</button>
                </div>
            </div>
        </form>
