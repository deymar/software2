$(document).ready(comenzar);

function comenzar() {
    
    $('.btn-form').click(function (e) { 
        e.preventDefault();
        var val = $(this).attr('value'),
            form = document
                    .getElementById('formLogin');
         if(val == 'Ingresar'){
            form.method = 'POST';
            form.action = validacionURL;
         }else{
            form.method = 'GET';
            form.action = homeURL;
         }
         form.submit();
    });


}
