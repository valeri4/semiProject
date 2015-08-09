
$(function () {

    /*
     * Registration Form Validation
     */

    $('#defaultForm').formValidation({
        message: 'This value is not valid',
//        live: 'disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and can\'t be empty'
                    },
                    remote: {
                        type: 'POST',
                        url: 'users/validationCheck.php',
                        message: 'The username is not available',
                        delay: 1000
                    }
                }
            },
            firstName: {
                validators: {
                    notEmpty: {
                        message: 'The first name is required and cannot be empty'
                    }
                }
            },
            lastName: {
                validators: {
                    notEmpty: {
                        message: 'The last name is required and cannot be empty'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and can\'t be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    },
                    remote: {
                        type: 'POST',
                        url: 'users/validationCheck.php',
                        message: 'The email is not available',
                        delay: 1000
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and can\'t be empty'
                    },
                    different: {
                        field: 'username',
                        message: 'The password can\'t be the same as username'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and can\'t be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'The gender is required'
                    }
                }
            },
            date: {
                validators: {
                    notEmpty: {
                        message: 'The date is required'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'The date is not a valid'
                    }
                }
            }
        }
    }).on('success.form.fv', function (e) {
        // Prevent form submission
        e.preventDefault();

        var $form = $(e.target),
                fv = $(e.target).data('formValidation');

        // Do whatever you want here ...

        // Then submit the form as usual
        fv.defaultSubmit();
    });


    /**************************************/
    /* Custom Login Form Validation      */
    /*************************************/

    var email_logIn = $('#email_login');
    var pwd_logIn = $('#pwd_login');
    var fieldId, errMsg = '';
    var emailErr = false;
    var passErr = false;


    //Adding Bootstrap Error Class 
    function addErrorClass(fieldId, errMsg) {
        $('#' + fieldId).parent().addClass("has-error has-feedback");
        $('<span class="glyphicon glyphicon-remove form-control-feedback"></span>').insertAfter('#' + fieldId);
        $('<small class="help-block"  style="display: block;">' + errMsg + '</small>').insertAfter('#' + fieldId + ':last');
    }

    //Remove Bootstrap Error Class 
    function removeErrorClass(fieldId) {
        $('#' + fieldId).parent().removeClass("has-error has-feedback");
        $('#' + fieldId).next().remove();
        $('#' + fieldId).next().remove();
    }


    //Email & Password Validation 
    $('#logInSubmit').click(function () {

        var dataString = 'email_login=' + email_logIn.val() + '&pwd_login=' + pwd_logIn.val();

        $.ajax({
            type: "POST",
            url: "users/loginValidation.php",
            data: dataString,
            cache: false,
            beforeSend: function () {
                $("#loader").css("visibility", "visible");
            },
            complete: function () {
                $("#loader").css("visibility", "hidden");
            },
            success: function (data) {
                if (data)
                {
                    //If wrong Email -> Add bootstrap error to field
                    if (data == 'email') {
                        fieldId = 'email_login';
                        errMsg = 'Wrong Email!';
                        if (!emailErr) {
                            addErrorClass(fieldId, errMsg);
                            emailErr = true;
                        }
                    }
                    //If wrong Password -> Add bootstrap error to field
                    if (data == 'password') {
                        fieldId = 'pwd_login';
                        errMsg = 'Wrong Password';
                        if (!passErr) {
                            addErrorClass(fieldId, errMsg);
                            passErr = true;
                        }
                    }
                    //If login passed -> redirect to index.php
                    if (data == 'true') {
                        window.location.href = "index.php";
                    }
                }
            }
        });
    });

    //If email was wrong and user start typing -> Remove Bootstrap error class  
    $('#email_login').keydown(function () {
        if (emailErr) {
            removeErrorClass('email_login');
            emailErr = false;
        }
    });

    //If email was wrong and user start typing -> Remove Bootstrap error class
    $('#pwd_login').keydown(function () {
        if (passErr) {
            removeErrorClass('pwd_login');
            passErr = false;
        }
    });
});
