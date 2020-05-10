<script>
    $(function () {
        // validação
        $('#form-contact').validate({
            rules: {
                house: {
                    minlength: 3,
                    maxlength: 191,
                },
                link: {
                    minlength: 3,
                    maxlength: 191,
                    url: true,
                },
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
                phone: {
                    minlength: 14,
                    maxlength: 15,
                    phones: true,
                },
                message: {
                    required: true,
                    minlength: 10,
                    maxlength: 1500,
                },
            },
            messages: {
                house: {
                    minlength: 'O campo imóvel deve ter pelo menos {0} caracteres.',
                    maxlength: 'O campo imóvel não pode ser superior a {0} caracteres.',
                },
                link: {
                    minlength: 'O campo link deve ter pelo menos {0} caracteres.',
                    maxlength: 'O campo link não pode ser superior a {0} caracteres.',
                    url:       'O campo link não é uma URL válida.',
                },
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
                phone: {
                    minlength: 'O campo telefone deve ter pelo menos 10 dígitos.',
                    maxlength: 'O campo telefone não pode ser superior a 11 dígitos.',
                    phones:    'O campo telefone deve ter um número de telefone ou celular válido.',
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
