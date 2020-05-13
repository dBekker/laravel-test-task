$(document).ready(function(){
    $('#addcity').on('submit', function(e){
        e.preventDefault();
        $form = $(this);

        $.ajax({
            type: 'POST',
            url: $form.attr('action'),
            data: $form.serialize(),
            success: function(result){
                console.log(result);
            }
        });
    });
});