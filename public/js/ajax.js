jQuery(document).ready(function($){
    //----- Open model CREATE -----//
    jQuery('#btn-add').click(function () {
        jQuery('#btn-save').val("add");
        jQuery('#myForm').trigger("reset");
        jQuery('#formModal').modal('show');
    });
    // CREATE
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="@csrf"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            product_id: jQuery('#product_id').val(),
            quantity: jQuery('#quantity').val(),
            customer_id: jQuery('#customer_id').val(),
            warehouse_id: jQuery('#warehouse_id').val(),
            customer_phone_number: jQuery('#customer_phone_number').val(),
            "_token": $('#token').val(),
        };
        var state = jQuery('#btn-save').val();
        var type = "POST";
        var todo_id = jQuery('#todo_id').val();
        var ajaxurl = 'add-to-cart';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var todo = '<tr id="todo' + data.id + '"><td>' + data.id + '</td><td>' + data.product_id + '</td><td>' + data.quantity + '</td>' + '<td>' + data.selling_price + '</td>' + '<td>' + data.selling_price*data.quantity + '</td>' + '<td>Delete' + data.quantity + '</td>';
                if (state == "add") {
                    jQuery('#todo-list').append(todo);
                } else {
                    jQuery("#todo" + todo_id).replaceWith(todo);
                }
                jQuery('#myForm').trigger("reset");
                jQuery('#formModal').modal('hide')
                $('#formModal').on('hidden.bs.modal', function () {
                    location.reload();
                   })
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});