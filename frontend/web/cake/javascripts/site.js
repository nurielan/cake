$(document).ready(function () {
    new WOW().init();

    $('input[name="reveal-password"]').change(function () {
        var inputPassword = $('.reveal-password');

        if ($(this).prop('checked')) {
            inputPassword.attr('type', 'text');
        } else {
            inputPassword.attr('type', 'password');
        }
    });

    var inputNo = $('#noo');
    var inputTitle = $('#title');
    var inputName = $('#name');
    var inputAddress = $('#addresss');
    var inputSubdistrict = $('#subdistrict');
    var inputDistrict = $('#district');
    var inputProvince = $('#province');
    var inputPostalCode = $('#postal_code');
    var inputPhoneNumber = $('#phone_number');

    var inputFormAddress = {
        'no': inputNo.val(),
        'title': inputTitle.val(),
        'name': inputName.val(),
        'address': inputAddress.val(),
        'subdistrict': inputSubdistrict.val(),
        'district': inputDistrict.val(),
        'province': inputProvince.val(),
        'postal_code': inputPostalCode.val(),
        'phone_number': inputPhoneNumber.val()
    };

    $('#editable_form').change(function () {
        if ($(this).prop('checked')) {
            inputNo.val('');
            inputTitle.val('');
            inputName.val('');
            inputAddress.val('');
            inputSubdistrict.val('');
            inputDistrict.val('');
            inputProvince.val('');
            inputPostalCode.val('');
            inputPhoneNumber.val('');
        } else {
            inputNo.val(inputFormAddress.no);
            inputTitle.val(inputFormAddress.title);
            inputName.val(inputFormAddress.name);
            inputAddress.val(inputFormAddress.address);
            inputSubdistrict.val(inputFormAddress.subdistrict);
            inputDistrict.val(inputFormAddress.district);
            inputProvince.val(inputFormAddress.province);
            inputPostalCode.val(inputFormAddress.postal_code);
            inputPhoneNumber.val(inputFormAddress.phone_number);
        }
    });

    $('#primary_address').change(function () {
        function getUserAddress(noid) {
            $.getJSON(baseUrl + '/rest-data/user-address/' + noid, function (data, status) {
                $('#editable_form').prop('checked', false);
                inputTitle.focus();
                inputNo.val(data.no);
                inputTitle.val(data.title);
                inputName.val(data.name);
                inputAddress.val(data.address);
                inputSubdistrict.val(data.subdistrict);
                inputDistrict.val(data.district);
                inputProvince.val(data.province);
                inputPostalCode.val(data.postal_code);
                inputPhoneNumber.val(data.phone_number);
            });
        }

        $(this).each(function () {
            getUserAddress($(this).val());
        });
    });

    function filePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                //$('#image_thumb').remove();
                $('#image_thumb').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#input_image').change(function () {
        filePreview(this);
    });

    function imagePreviews(input, no) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image_thumb' + no).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('.input_images').change(function () {
        imagePreviews(this, $(this).data('no'));
    });

    yii.confirm = function (message, ok, cancel) {
        swal({
            title: message,
            type: 'warning',
            showCancelButton: true,
            closeOnConfirm: true,
            allowOutsideClick: false,
        }, ok);
    };

    $('.bootstrap-textarea').wysihtml5();

    inptUserAddress1 = $('.inpt-user_address-1');
    inptUserAddress2 = $('.inpt-user_address-2');
    inptQty1 = $('.inpt-qty-1');
    inptQty2 = $('.inpt-qty-2');

    inptUserAddress1.change(function () {
        $('.inpt-user_address-2[data-position="' + $(this).data('position') + '"]').val($(this).val());

        //swal($('.inpt-user_address-2[data-position="' + $(this).data('position') + '"]').val());
    });

    inptQty1.change(function () {
        $('.inpt-qty-2[data-position="' + $(this).data('position') + '"]').val($(this).val());

        //swal($('.inpt-qty-2[data-position="' + $(this).data('position') + '"]').val());
    });

    $('.btn-checkout').click(function () {
        burlCheckout = baseUrl + '/cart/checkout';
        burlCartUpdate = baseUrl + '/cart/update';
        frmCartUpdate = $('#frm-cart-update');

        $.ajax({
            url: burlCartUpdate,
            type: 'post',
            data: frmCartUpdate.serialize(),
            beforeSend: function () {
                swal('Please wait...');
            },
            success: function (result) {
                window.location = burlCheckout;
            },
            error: function (xhr) {
                swal(xhr + ' ' + xhr.statusText);
            },
        });

        return false;
    });
});