
var fieldId, fieldVal, errMsg = '';
var fieldErr = false;
var errCount = 0;
var fieldsArr = {fieldVal: {}, fieldErr: {}};
var charRegEx = /^[a-zA-Z]*$/;
var mailRegEx = /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+){1,4}$/;

//Adding Bootstrap Error Class 
function addErrorClass(fieldId) {
    $('#' + fieldId).parent().addClass("has-error has-feedback");
    $('<span class="glyphicon glyphicon-remove form-control-feedback"></span>').insertAfter('#' + fieldId);
    $('<small class="help-block"  style="display: block;">' + errMsg + '</small>').insertAfter('#' + fieldId + ':last');
}

//Adding Bootstrap Success Class
function addSuccessClass(fieldId) {
    $('#' + fieldId).parent().addClass("has-success has-feedback");
    $('<span class="glyphicon glyphicon-ok form-control-feedback"></span>').insertAfter('#' + fieldId);
}

//Remove Bootstrap Error Class
function removeSuccessClass(fieldId) {
    $('#' + fieldId).parent().removeClass("has-success has-feedback");
}

//Remove Bootstrap Error Class 
function removeErrorClass(fieldId) {
    $('#' + fieldId).parent().removeClass("has-error has-feedback");
    $('#' + fieldId).next().remove();
    $('#' + fieldId).next().remove();
}

function ajaxEmailcheck(emailCheck) {
    $.ajax({
        url: "./validationCheck.php?email="+emailCheck,
        type: 'GET',
        success: function (data) {
            if (data > 0){
                $('#resText').html("No data");
            } else {
                $('#resText').html(data);
            }
        }
    });
}


//Main function for check fields
function mainCheckFunction(fieldId, checkIf, fieldVal) {

    if (checkIf) {
        errCount++;
        fieldsArr.fieldErr[fieldId] = true;
        if (errCount === 1) {
            removeErrorClass(fieldId);
            addErrorClass(fieldId);
        }
    } else {
        removeErrorClass(fieldId);
        errCount = 0;
        addSuccessClass(fieldId);
        fieldsArr.fieldErr[fieldId] = false;
        fieldsArr.fieldVal[fieldId] = fieldVal;
    }
}


$(function () {
    $(':input').focus(function () {
        //On Focus of input field get this id
        fieldId = $(this).attr('id');

        //Username Check
        if (fieldId === 'username') {
            $(this).keyup(function () {
                fieldVal = $(this).val();
                var checkIf = $(this).val().length <= 2;
                mainCheckFunction(fieldId, checkIf, fieldVal);
                errMsg = 'More 3 symbols';
            });
        }

        //First name and Last name Check
        if (fieldId === 'firstName' || fieldId === 'lastName') {
            $(this).keyup(function () {
                emailCheck = $(this).val();
                var checkIf = !charRegEx.test(fieldValcheck) || fieldValcheck == 0;
                mainCheckFunction(fieldId, checkIf, fieldValcheck);
                errMsg = 'Characters Only!';
                fieldsArr.fieldErr
            });
        }

        //Email Check
        if (fieldId === 'email') {
            $(this).keyup(function () {
                fieldValcheck = $(this).val();
                var checkIf = !mailRegEx.test(fieldValcheck) || fieldValcheck == 0;
                mainCheckFunction(fieldId, checkIf, fieldValcheck);
                errMsg = 'Incorrect mail!';
                console.dir(fieldsArr.fieldErr.email);

            });
        }

        $('#submit').click(function () {
            ajaxEmailcheck('valeri4@gmail.com');
//            $.each(fieldsArr.fieldVal, function (key, value) {
//                console.dir(key + ": " + value);
//            });
        });
    });
});
