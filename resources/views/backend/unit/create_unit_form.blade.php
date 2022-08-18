        @php
            $unit_data = isset($unit_data) && !empty($unit_data) ? $unit_data : [];
            $unit_name = isset($unit_data->unit_name) ? $unit_data->unit_name : '';
            $id = isset($unit_data->id) ? $unit_data->id : '';
        @endphp

        <form action="{{ route('unit.store') }}" id="user_form" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ $id }}">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Unit Name</label><strong class="text-danger">*</strong>
                    <input type="text" name="unit_name" class="form-control" value="{{ $unit_name }}"
                        placeholder="Enter Unit Name">
                    <span class="text-danger error_text unit_name-error"></span>
                </div>

                <div class="form-group col-md-12">
                    @php
                        $url = route('unit.index');
                    @endphp
                    <button type="submit" onclick="saveUpdate(this,'{{ $url }}','#datatable')"
                        class="btn btn-info float-right"><i class="bi bi-cloud-download"></i> {{ $id ? "Update" : "Save" }}</button>
                </div>
            </div>
        </form>
