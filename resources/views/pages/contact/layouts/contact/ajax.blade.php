<script>
    $(function () {
        // enviando e-mail
        $(document).on('click', '#button-send-contact', function (e) {
            e.preventDefault();

            if (!$(this).hasClass('disabled')) {
                if ($('#form-contact').valid()) {
                    $(this).attr('disabled', 'disabled').addClass('disabled').html('<i class="fas fa-spinner fa-pulse mr-10"></i>Enviando');

                    var sendForm = function () {
                        $.ajax({
                            data: $('#form-contact').serialize(),
                            url: '{{ route('contact.email') }}',
                            type: 'post',
                            dataType: 'json',
                            success: function (data) {
                                $('#button-send-contact').removeAttr('disabled', 'disabled').removeClass('disabled').html('Enviar mensagem');
                                $('#g-recaptcha-response').val('');
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
                    };

                    if (typeof grecaptcha !== 'undefined' && grecaptcha.execute) {
                        grecaptcha.ready(function () {
                            grecaptcha.execute('{{ env('NOCAPTCHA_SITEKEY') }}', { action: 'contact' })
                                .then(function (token) {
                                    $('#g-recaptcha-response').val(token);
                                    sendForm();
                                })
                                .catch(function () {
                                    sendForm();
                                });
                        });
                    } else {
                        sendForm();
                    }
                } else {
                    $('a[data-dismiss="modal"]').removeClass('fe-hidden');
                    $(this).removeAttr('disabled', 'disabled').removeClass('disabled').html('Tentar novamente');
                    return false;
                }
            }
        });
    });
</script>
