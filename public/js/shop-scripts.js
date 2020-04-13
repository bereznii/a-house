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
        var currentInCartQuantity = $('#cartQuantity').data('currentquantity');

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
                newQuantity = currentInCartQuantity + 1;
                $('.cartQuantity').text('('+newQuantity+')');
                $('.cartQuantity').data('currentquantity', newQuantity);
            }
        });

    });

    $(document).on('change', '.quantity-input', function() {

        var productId = $(this).data('productid');
        var productQuantity = $(this).val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN':  '{{csrf_token()}}'
            },
            type: "get",
            dataType: "json", //Expected data format from server
            url: '/ajax/update-cart-quantity',
            data: {
                productId: productId,
                productQuantity: productQuantity
            },
            success: function(data) {
                location.reload();
            }
        });

    });

    $(document).on('click', '.sendCallbackRequest-btn', function(event) {
        event.preventDefault();

        var name = $('[name="callbackName"]').val();
        var phone = $('[name="callbackPhone"]').val();
        var comment = $('[name="callbackComment"]').val();

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
                comment: comment,
            },
            success: function(data) {
                $('.callback-modal-content').empty();
                $('#exampleModalLabel').empty();
                $('#exampleModalLabel').text('Спасибо! Менеджер свяжется с Вами в ближайшее время.');
            }
        });

    });

    $(".item-card").hover(function()
    {
        $(this).toggleClass('classWithShadow');
    });

    $('#search_input').on('keyup', function() {
        var value = $(this).val();
        $(this).val(value.replace(/[^a-z0-9]/i, ""));
    });

    (function(){function r(n,t){for(var r=document.querySelectorAll(t),i=0;i<r.length;i++)n(r[i])}function u(t,i,u){var f=u?"https://a1.avto.pro/img/verified_logo.svg":"https://a1.avto.pro/img/verified_robo.svg",e='<a href="https://avto.pro" target="_blank" class="'+n+'"><div class="'+n+'__logo-box"><div class="'+n+'__logo"><img src="'+f+'" alt="" class="'+n+'__logo__img" /></div></div><div class="'+n+'__text">'+t+"</div></a>";r(function(n){n.innerHTML=e},i)}var n="Logo_1_0_0_22221",t,i;(function(){for(var t=document.querySelectorAll(".pro-seller-label-anchor"),n=0;n<t.length;n++)t[n].parentNode.removeChild(t[n])})(),t='.pro-seller-label-banner[data-style="logo"]',i='<div class="'+n+"__text-item "+n+"__text-item--top "+n+'__text-item--big">Autoglass House</div>',u(i,t,!0)})()
});
