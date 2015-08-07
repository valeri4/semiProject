
var feildId = '';

//Adding Bootstrap Error Class 
function addErrorClass(feildId) {
    $('#' + feildId).parent().addClass("has-error has-feedback");
    $('<span class="glyphicon glyphicon-remove form-control-feedback"></span>').insertAfter('#' + feildId);
    $('<small class="help-block"  style="display: block;">' +
            'The input is not a valid email address</small>').insertAfter('#' + feildId + ':last');
}

//Remove Bootstrap Error Class 
function removeErrorClass(feildId) {
    $('#' + feildId).parent().removeClass("has-error has-feedback");
    $('#' + feildId).next().remove();
    $('#' + feildId).next().remove();
}

$(function () {
    $(':input').focus(function () {
        var feildId = $(this).attr('id');
        var feildErr = false;
        var errCount = 0;
        $(this).keypress(function () {
            if ($(this).val().length < 3) {
                feildErr = true;
                errCount++;

                if (feildErr === true && errCount === 1) {
                    addErrorClass(feildId);
                }
            }else{
                removeErrorClass(feildId);
                errCount = 0;
            }

//            
//                console.dir($(this).val().length);
        });

    });


//    $(':input').blur(function () {
//        removeErrorClass(feildId);
//    });


});
