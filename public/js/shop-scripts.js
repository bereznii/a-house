$(document).ready(function() {

    $(document).on('change', '#makes', function() {

        var selectedMake = $(this).val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  '{{csrf_token()}}'
            },
            type: "get",
            dataType: "json", //Expected data format from server
            url: '/ajax/get-models',
            data: {
                selectedMake: selectedMake,
            },
            success: function(data) {

                $("#models option").remove();
                $("#types option").remove();

                var select = "<option value=''>Модель автомобиля</option>";

                $.each(data, function(key, value) {
                    select += "<option value='"+value.id+"'>"+value.name+"</option>";
                });

                select += "</select></div>";

                $('#models').append(select);
                $('#models').prop("disabled", false);
            }
        });

    });

    $(document).on('change', '#models', function() {

        var selectedModel = $(this).val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  '{{csrf_token()}}'
            },
            type: "get",
            dataType: "json", //Expected data format from server
            url: '/ajax/get-types',
            data: {
                selectedModel: selectedModel,
            },
            success: function(data) {

                $("#types option").remove();

                var select = "<option value=''>Тип стекла</option>";

                $.each(data, function(key, value) {
                    select += "<option value='"+value.id+"'>"+value.translation+"</option>";
                });

                select += "</select></div>";

                $('#types').append(select);
                $('#types').prop("disabled", false);
            }
        });

    });

    $(document).on('click', '.addToCart-btn', function() {

        var productId = $(this).data('productid');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  '{{csrf_token()}}'
            },
            type: "get",
            dataType: "json", //Expected data format from server
            url: '/ajax/add-to-cart',
            data: {
                productId: productId,
            },
            success: function(data) {
                console.log(data);
            }
        });

    });

    $(document).on('click', '.sendCallbackRequest-btn', function(event) {
        event.preventDefault();

        var name = $('[name="callbackName"]').val();
        var phone = $('[name="callbackPhone"]').val();

        var myForm = $('.modal-form');
        if(! myForm[0].checkValidity()) {
            myForm[0].reportValidity();
            return;
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  '{{csrf_token()}}'
            },
            type: "get",
            dataType: "json", //Expected data format from server
            url: '/ajax/add-callback',
            data: {
                name: name,
                phone: phone,
            },
            success: function(data) {
                $('.callback-modal-content').empty();
                $('#exampleModalLabel').empty();
                $('#exampleModalLabel').text('Спасибо! Менеджер свяжется с Вами в ближайшее время.');
            }
        });

    });

});
