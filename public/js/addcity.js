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
                errCode = parseInt(result.errCode);
                showRequestResult(errCode, result.data)
            },
            error: function() {
                errCode = 2;
                showRequestResult(errCode)
            }
        });
    });

    function showRequestResult(errCode, data = null) {
        msg = '';
        switch (errCode) {
            case 0:  msg = "Запись успешно добавлена в БД"; break;
            case 1:  msg = "Ошибка добавления записи в БД"; break;
            case 2:  msg = "Ошибка в ходе запроса к серверу"; break;
        }
        if(errCode == 0) {
            $tag = '<div class="alert alert-success" role="alert">' + msg + '</div>';
            if(data !== null) {
                udateTable(data);
            }
        } else {
            $tag = '<div class="alert alert-danger" role="alert">' + msg + '</div>';
        }
        $('#alert-area').html($tag);
        window.setTimeout(function(){
            $('.alert').alert('close');
        },5000);
    }

    function udateTable(data) {
        $table = $('#cityTable');
        $table.toggleClass('invisible', false);
        body = $table.find('tbody');
        tr = $('<tr>');
        td = $('<th scope="row">');
        td.text(data.id);
        tr.append(td);
        td = $('<td>');
        td.text(data.name);
        tr.append(td);
        td = $('<td>');
        td.text(data.latitude);
        tr.append(td);
        td = $('<td>');
        td.text(data.longitude);
        tr.append(td);
        td = $('<td>');
        td.text(data.population);
        tr.append(td);
        body.append(tr);
    }
});