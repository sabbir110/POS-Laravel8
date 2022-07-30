        @php
            $userData = isset($userData) && !empty($userData) ? $userData : [];
            $name = isset($userData->name) ? $userData->name : '';
            $email = isset($userData->email) ? $userData->email : '';
            $user_type = isset($userData->user_type) ? $userData->user_type : '';
            $gender = isset($userData->gender) ? $userData->gender : '';
            $mobile = isset($userData->mobile) ? $userData->mobile : '';
            $address = isset($userData->address) ? $userData->address : '';
            $image = isset($userData->image) ? $userData->image : '';
            $id = isset($userData->id) ? $userData->id : '';
            // dd($id);
        @endphp
        <form action="{{ route('profiles.store') }}" id="user_form" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ $id }}">
            <input type="hidden" name="image_id" value="{{ $image }}">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $name }}"
                        placeholder="Enter Name">
                    <span class="text-danger error_text name-error"></span>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Mobile No</label>
                    <input type="text" name="mobile" class="form-control" value="{{ $mobile }}"
                        placeholder="Enter Mobile No.">
                    <span class="text-danger error_text mobile-error"></span>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ $address }}"
                        placeholder="Your Address">
                    <span class="text-danger error_text address-error"></span>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Gender</label>
                    <select name="gender" class="form-control">
                        <option value="">Select Role</option>
                        <option value="male" {{ $gender == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $gender == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                    <span class="text-danger error_text gender-error"></span>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Profile Photo</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <span class="text-danger error_text image-error"></span>
                </div>
                <div class="form-group col-md-6">
                    <img id="show_image" src="{{ !empty($image) ? url('/storage/upload/user_image/' . $image) : url('/storage/upload/no_image.png') }}"
                        style="width: 100px;height:100px;border:1px solid gray" alt="">
                </div>
                <div class="form-group col-md-12">
                    <button type="submit" onclick="saveUpdate(this)" class="btn btn-info float-right"><i
                            class="bi bi-cloud-download"></i> Save</button>
                </div>
            </div>
        </form>

        <script>
            imageShow("#image","#show_image")
        </script>
