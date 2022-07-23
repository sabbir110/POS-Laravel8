@php
$stuData = isset($stuData) && !empty($stuData) ? $stuData : [];
$name = isset($stuData->name) ? $stuData->name : '';
$id = isset($stuData->id) ? $stuData->id : '';
$student_img = isset($stuData->image) ? $stuData->image : '';
// dd($id);
@endphp


<form action="" id="student_form" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="student_id" value="{{ $id }}">
    <input type="hidden" name="student_img" value="{{$student_img}}">

    <div class="my-2">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Your Name"
            value="{{ $name }}">
        <span class="text-danger error_text name-error"></span>
    </div>
    <div class="my-2">
        <label for="">Image</label>
        <input type="file" name="image" id="upload_img" class="form-control">
        <span class="text-danger error_text image-error"></span>
    </div>

    <div class="my-2" style="width: 80px;height:80px">
        <img id="" class="img-thumbnail rounded show_img"
            src="{{ !empty($stuData->image) ? url('/storage/student_image/' . $stuData->image) : '' }}"
            style="float: left;width:100%;height:100%" alt="No Image">
    </div>
    <div class="text-end">
        @php
            // $url = route('student.index');
        @endphp
        <button type="submit" onclick="saveUpdate(this,'')" class="btn btn-primary">Save</button>
    </div>
</form>
<script>
    imageShow('#upload_img','.show_img')
</script>
