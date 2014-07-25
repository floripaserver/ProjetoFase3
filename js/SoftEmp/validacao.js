/**
 * Created by paulo on 06/07/14.
 */
$('form').validate({
    rules: {
        nome: {
            minlength: 3,
            maxlength: 255,
            required: true
        },
        email: {
            required: true,
            email: true
        },
        assunto: {
            required: true
        },
        mensagem: {
            required: true
        }
    },
    messages: {
        nome: {
            required: 'Nome é obrigatório!'
        },
        email: {
            required: 'Email é obrigatório!',
            email: 'Entre com um email válido!'
        },
        assunto: {
            required: 'Assunto é obrigatório!'
        },
        mensagem: {
            required: 'Mensagem é obrigatório!'
        }
    },
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});