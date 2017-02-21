$(document).ready(function() {
    $('#parameterReset').click(function(){
        resetForm($('form[name=generator]'));
    });

    function resetForm($form) {
        $form.find('input:text, input:password, input:file, select, textarea').val('');
        $form.find('input:radio, input:checkbox')
            .removeAttr('checked').removeAttr('selected');
        console.log("reset done");
    }
});