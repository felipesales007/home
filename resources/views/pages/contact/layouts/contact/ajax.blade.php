<script>
    $(function () {
        // enviando e-mail
        $(document).on('click', '#button-send-contact', function (e) {
            e.preventDefault();

            if (!$(this).hasClass('disabled')) {
                if ($('#form-contact').valid()) {
                    $(this).attr('disabled', 'disabled').addClass('disabled').html('<i class="fas fa-spinner fa-pulse mr-10"></i>Enviando');

                    $.ajax({
                        data: $('#form-contact').serialize(),
                        url: '{{ route('contact.email') }}',
                        type: 'post',
                        dataType: 'json',
                        success: function (data) {
                            $('#button-send-contact').removeAttr('disabled', 'disabled').removeClass('disabled').html('Enviar mensagem');
                            grecaptcha.reset();
                            $('#form-contact').trigger('reset');
                            removeValidate();
                            notify(data);
                        },
                        error: function (data) {
                            $('#button-send-contact').removeAttr('disabled', 'disabled').removeClass('disabled').html('Tentar novamente');
                            $('#form-contact').valid();
                            serverValidate(data);
                            notifyError('Erro ao enviar a mensagem.');
                        }
                    });
                } else {
                    $('a[data-dismiss="modal"]').removeClass('fe-hidden');
                    $(this).removeAttr('disabled', 'disabled').removeClass('disabled').html('Tentar novamente');
                    return false;
                }
            }
        });
    });
</script>
