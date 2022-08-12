        @php
        $userData = isset($userData) && !empty($userData) ? $userData : [];
        $name = isset($userData->name) ? $userData->name : '';
        $email = isset($userData->email) ? $userData->email : '';
        $user_type = isset($userData->user_type) ? $userData->user_type : '';
        $id = isset($userData->id) ? $userData->id : '';
        // dd($id);
        @endphp
        <form action="{{ route('user.store') }}" id="user_form" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ $id }}">
        <div class="form-row">
        <div class="form-group col-md-4">
            <label for="">User Role</label>
            <select name="user_type" class="form-control">
                <option value="">Select Role</option>
                <option value="admin" {{ $user_type=="admin"? "selected" : "" }} >Admin</option>
                <option value="user" {{ $user_type=="user"? "selected" : "" }}>User</option>
            </select>
            <span class="text-danger error_text user_type-error"></span>
        </div>
        <div class="form-group col-md-4">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $name }}" placeholder="Enter Name">
            <span class="text-danger error_text name-error"></span>
        </div>
        @if ($userData=='' || $userData== null)
        <div class="form-group col-md-4">
            <label for="">Email</label>
            <input type="email" name="email" value="{{ $email }}" class="form-control" placeholder="Enter Email">
            <span class="text-danger error_text email-error"></span>
        </div>
        @endif

        <div class="form-group col-md-4">
            <label for="">Password</label>
            <input type="password" name="password1" class="form-control" placeholder="Enter Password">
            <span class="text-danger error_text password1-error"></span>
        </div>
        @if ($userData=='' || $userData== null)
        <div class="form-group col-md-4">
            <label for="">Confirm Password</label>
            <input type="password" name="password2" class="form-control" placeholder="Confirm Password">
            <span class="text-danger error_text password2-error"></span>
        </div>
        @endif
        <div class="form-group col-md-12">
            @php
            $url = route('user.view');
        @endphp
        <button type="submit" onclick="saveUpdate(this,'{{ $url }}','#datatable')" class="btn btn-info float-right"><i class="bi bi-cloud-download"></i> {{ $id ? "Update" : "Save" }}</button>
        </div>
        </div>
        </form>
