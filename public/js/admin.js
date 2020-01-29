$(document).ready(function() {

    $('.change_status').on('change', function () {

        var recordId = $(this).attr('data-id');
        var value = $(this).is(':checked');
        var output = $(this);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            dataType: "json", //Expected data format from server
            url: '/admin/confirm-callback-request',
            data: {
                recordId: recordId,
                value: value
            },
            success: function (data) {
                if (value === true) {
                    $(output).closest('tr').removeClass('table-danger');
                    $(output).closest('tr').addClass('table-success');
                } else {
                    $(output).closest('tr').removeClass('table-success');
                    $(output).closest('tr').addClass('table-danger');
                }
            }
        });
    });

});
