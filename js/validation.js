
//Adding Bootstrap Class Error
function addErrorClass(feildId) {
    $('#' + feildId).parent().addClass("has-error has-feedback");
    $('<span class="glyphicon glyphicon-remove form-control-feedback"></span>').insertAfter('#' + feildId);
    $('<small class="help-block"  style="display: block;">'+
                              'The input is not a valid email address</small>').insertAfter('#' + feildId+':last');
}

//Remove Bootstrap Class Error
function removeErrorClass(feildId) {
    $('#' + feildId).parent().removeClass("has-error has-feedback");
    $('#' + feildId).next().remove();
    $('#' + feildId).next().remove();
}

$(function () {
    
    $(':input').focus(function () {
        addErrorClass($(this).attr('id'));
    });

    $(':input').blur(function () {
        removeErrorClass($(this).attr('id'));
    });
});
