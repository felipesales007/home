<script>
    $(function () {
        // validação
        $('#form-contact').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                    maxlength: 191,
                },
                email: {
                    required: true,
                    maxlength: 191,
                    email: true,
                },
                message: {
                    required: true,
                    minlength: 10,
                    maxlength: 1500,
                },
            },
            messages: {
                name: {
                    required:  'O campo nome é obrigatório.',
                    minlength: 'O campo nome deve ter pelo menos {0} caracteres.',
                    maxlength: 'O campo nome não pode ser superior a {0} caracteres.',
                },
                email: {
                    required:  'O campo e-mail é obrigatório.',
                    maxlength: 'O campo e-mail não pode ser superior a {0} caracteres.',
                    email:     'O campo e-mail deve ser um endereço de e-mail válido.',
                },
                message: {
                    required:  'O campo mensagem é obrigatório.',
                    minlength: 'O campo mensagem deve ter pelo menos {0} caracteres.',
                    maxlength: 'O campo mensagem não pode ser superior a {0} caracteres.',
                },
            }
        });
    });
</script>
