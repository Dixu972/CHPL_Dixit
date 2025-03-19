(function ($) {
    "use strict";

    var input = $('.validate-input .input100');

    $('.validate-form').on('submit', function (event) {
        var check = true;

        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                check = false;
            }
        }

        if (!check) {
            event.preventDefault(); // Form submission rokne ke liye
        }
    });

    $('.validate-form .input100').each(function () {
        $(this).focus(function () {
            hideValidate(this);
        });
    });

    function validate(input) {
        var value = $(input).val().trim();
        var type = $(input).attr('type');
        var name = $(input).attr('name');

        if (type === 'email' && name === 'a_email') {
            var emailRegex = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,5}|[0-9]{1,3})(\]?)$/;
            if (!emailRegex.test(value)) {
                return false;
            }
        } else if (type === 'password' && name === 'a_password') {
            if (value.length < 6) {
                return false;
            }
        } else if (type === 'text' && name === 'admin_name') {
            if (value.length < 3) {
                return false;
            }
        } else if (name === 'role') {
            if (value === '') {
                return false;
            }
        } else if (name === 'a_company_id') {
            var roleValue = $('#role').val();
            if (roleValue === 'company_admin' && value === '') {
                return false;
            }
        } else if (name === 'admin_name') {
            var nameRegex = /^[A-Za-z\s]{3,}$/;
            if (!nameRegex.test(value)) {
                return false;
            }
        }

        return true;
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();
        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();
        $(thisAlert).removeClass('alert-validate');
    }

})(jQuery);
