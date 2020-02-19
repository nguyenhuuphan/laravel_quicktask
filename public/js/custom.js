// Logout Ajax
$(document).on('click', '#logout-btn', function(e){
    var url = $(this).attr('data');
    $.ajax({
        type: "POST",
        url: url,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success: function(response) {
            if(response.success) {
                location.reload();
            }
        },
    });
});


// Update Task Name Ajax
$(document).on('click', '.edit-btn', function(){
    var check = $(this).parent().parent().find('.task-name input');
    var target = $(this).parent().parent().find('.task-name');
    if (!check.length) {
        target.html(
            "<input type='text' name='name' value='" + target.text() + "'>"
        );
    } else {
        var name = target.find('input').val();
        var id = $(this).find('a').attr('data');
        var url = $(this).find('a').attr('url');
        $.ajax({
            type: "POST",
            url: url,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                'name': name,
                'id': id,
            },
            success: function(response) {
                if(response.success) {
                    target.text(name);
                }
            },
            error: function(err) {
                if(err.status == 422) {
                    var errors = '';
                    $.each(err.responseJSON.errors, function(i, error){
                        errors += error[0];
                    })
                    alert(errors);
                }
            }
        });
    }
})
