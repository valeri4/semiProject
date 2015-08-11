
$(document).ready(function () {
    $('#sidebar').affix({
        offset: {
            top: 240
        }
    });

    $("#signUpFormCollaps").click(function () {
        $(".collapse").collapse('toggle');
    });

    $("#collapsePwd").click(function () {
        $("#collapse1").collapse('toggle');
    });

    $('#datePicker')
            .datepicker({
                format: 'dd/mm/yyyy'
            })
            .on('changeDate', function (e) {
                // Revalidate the date field
                $('#eventForm').formValidation('revalidateField', 'date');
            });

    $('#about').tinymce({
    });


});