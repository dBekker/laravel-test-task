$(document).ready(function(){
    $('#addcity').on('submit', function(e){
        e.preventDefault();
        $form = $(this);
        errCode = 0;
        $.ajax({
            type: 'POST',
            url: $form.attr('action'),
            data: $form.serialize(),
            success: function(result) {
                errCode = parseInt(result);
                showRequestStatus(errCode)
            },
            error: function() {
                errCode = 2;
                showRequestStatus(errCode)
            }
        });
    });

    function showRequestStatus(errCode) {
        console.log(errCode);
        msg = '';
        switch (errCode) {
            case 0:  msg = "Запись успешно добавлена в БД"; break;
            case 1:  msg = "Ошибка добавления записи в БД"; break;
            case 2:  msg = "Ошибка в ходе запроса к серверу"; break;
        }
        if(errCode == 0) {
            $tag = '<div class="alert alert-success" role="alert">' + msg + '</div>';
            udateTable();
        } else {
            $tag = '<div class="alert alert-danger" role="alert">' + msg + '</div>';
        }
        $('#alert-area').html($tag);
        window.setTimeout(function(){
            $('.alert').alert('close');
        },5000);
    }

    function udateTable() {

    }
});