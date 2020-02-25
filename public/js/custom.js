$(document).on('click', '#logout-btn', function(e){
    var url = $(this).attr('data');
    $.ajax({
        type: "POST",
        url: url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            if(response.success) {
                window.location.href = '/login';
            }
        },
    });
})
