
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//Open Modal
$(document).on('click', '.open_modal', function () {
    var id = $(this).attr("data-id");
    var action = $(this).attr("data-action");
    var title = $(this).attr("data-title");
    var modal = $(this).attr("data-modal");
    $.ajax({
        async: true,
        url: action,
        data: {
            id: id
        },
        type: "get",
        beforeSend: function () {
            $('.' + modal).modal('show');
            $('.' + modal + ' .modal-body').html("<h3>Loading...</h3>");
            $('.' + modal + ' .modal_title').html(title);
        },
        success: function (data) {
            $('.' + modal + ' .modal-body').html(data);

        },
        complete: function (data) {

        }

    });
    event.stopImmediatePropagation();
})
// delete_data
$(document).on('click', '.delete_data', function (e) {
    e.preventDefault();
    var id = $(this).attr("data-id");
    var action = $(this).attr("data-action");
    if (confirm('Are You Sure?')) {
        $.ajax({
            async: true,
            url: action,
            data: {
                id: id,
            },
            type: "post",
            beforeSend: function () {
            },
            success: function (res) {
                alert(res.message)
                $(".data_table").DataTable().ajax.reload(null, false);
            }, error: function (error){
                alert("Internet  Problem ")
            },
            complete: function (data) {

            }

        });
    }
    event.stopImmediatePropagation();
})

//Form Submit
function saveUpdate(element, redirectUrl = '',data_table='') {
    event.preventDefault();
    var formAction = $(element).parents("form").attr("action");
    var formId = $(element).parents("form").attr("id");
    var formData = new FormData($('#' + formId)[0]);
    var formMethod = $(element).parents("form").attr("method");

    $.ajax({
        async: true,
        type: formMethod,
        url: formAction,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {},
        success: (res) => {
            $("#" + formId)[0].reset();
            $(document).find('span.error_text').text('');
            $('.modal').modal('hide');
            if(data_table == null || data_table){
                $(data_table).DataTable().ajax.reload(null, false);
            }
            // window.history.pushState({ path: '/' }, '', '/');
            window.location.href =redirectUrl;
            alert(res.message)
            document.querySelector(".show_img").setAttribute("src","");
        },
        error: function (error) {
            $(document).find('span.error_text').text('');
            $.each(error.responseJSON.errors, function (prefix, val) {
                $('span.' + prefix + '-error').text(val[0]);
            })

        },
        complete: function () {
        }
    });
    event.stopImmediatePropagation();
}




//Image Show
function imageShow(uploadImage,showImage){
    $(uploadImage).change(function(e) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(showImage).attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
        event.stopImmediatePropagation();
    });
}




// $(document).ready(function(){
//     var page_url =$(location).attr('href');
//     alert(page_url);
// });
