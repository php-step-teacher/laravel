$(document).ready(function() {
    $('.deleteButton').on('click', function(e) {
        e.preventDefault();

        var todoId = $(this).data('id');
        var token = $('meta[name="csrf-token"]').attr('content')
        var button = $(this);
        if (confirm('A you sure to delete todo with id ' + todoId)) {

            $.ajax({
                url: '/delete/' + todoId,
                method: 'delete',
                success: function (data) {
                    button.closest('tr').remove();
                    console.log(data);
                },
                headers:
                    {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
        }
    });
    $('.openModal').on('click', function (e) {
        e.preventDefault();
        $("#ex1").modal({
            fadeDuration: 100
        });
        var todoId = $(this).data('id');
        $.ajax({
            url: '/todo/' + todoId,
            method: 'get',
            success: function (data) {
                for (var param in data) {
                    $('[name="' + param +'"]').val(data[param]);
                }
            },
            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
    });

    $('form').on('submit', function (e) {
        e.preventDefault();

        var todoId = $('[name="id"]').val();
        $.ajax({
            url: '/todo/' + todoId,
            method: 'post',
            data:  $('form').serialize(),
            success: function (data) {
                console.log(data);
            },
            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
    });

});