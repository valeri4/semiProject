
$(function () {
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
                        url: './validationCheck.php',
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
                        url: './validationCheck.php',
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
    }).on('err.form.fv', function (e) {
        console.log('err.form.fv');

        // You can get the form instance and then access API
        var $form = $(e.target);
        console.log($form.data('formValidation').getInvalidFields());

        // If you want to prevent the default handler (formValidation._onError(e))
        // e.preventDefault();
    })
            .on('success.form.fv', function (e) {
                console.log('success.form.fv');

                // If you want to prevent the default handler (formValidation._onSuccess(e))
                // e.preventDefault();
            })
            .on('err.field.fv', function (e, data) {
                console.log('err.field.fv -->', data);
            })
            .on('success.field.fv', function (e, data) {
                console.log('success.field.fv -->', data);
            })
            .on('status.field.fv', function (e, data) {
                // I don't want to add has-success class to valid field container

                // I want to enable the submit button all the time
                data.fv.disableSubmitButtons(false);
            });


});
