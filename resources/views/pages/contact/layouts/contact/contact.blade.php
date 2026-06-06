<div class="site-blocks-cover inner-page-cover overlay fe-img-center" style="background-image: url({{ url('images/default/others/background.png') }});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <h1 class="mb-2">Contato</h1>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <!-- formulário -->
            <div class="col-md-12 col-lg-6 mb-5 mb-lg-0">
                <form id="form-contact" role="form" autocomplete="off" novalidate>
                    @csrf
                    <!-- nome -->
                    <div class="form-group">
                        <label class="form-control-label font-weight-bold" for="name">Nome</label>
                        <span class="fe-star" title="obrigatório">*</span>
                        <div class="input-group input-group-merge validate-name">
                            <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="ex.: Felipe Sales" value="{{ old('name') }}" minlength="3" maxlength="191" required onkeypress="return onlyLetters(event);" onkeyup="letterUppercase('name');" @if($errors->has('name')) autofocus @endif>
                        </div>
                        @if($errors->has('name'))
                            <!-- alerta de erro -->
                            <div class="invalid-feedback" role="alert">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <!-- e-mail -->
                    <div class="form-group">
                        <label class="form-control-label font-weight-bold" for="email">E-mail</label>
                        <span class="fe-star" title="obrigatório">*</span>
                        <div class="input-group input-group-merge validate-email">
                            <input type="email" id="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="ex.: exemplo@dominio.com" value="{{ old('email') }}" maxlength="191" required autocomplete="email" @if($errors->has('email')) autofocus @endif>
                        </div>
                        @if($errors->has('email'))
                            <!-- alerta de erro -->
                            <div class="invalid-feedback" role="alert">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <!-- telefone -->
                    <div class="form-group">
                        <label class="form-control-label font-weight-bold" for="phone">Telefone</label>
                        <div class="input-group input-group-merge validate-phone">
                            <input type="tel" id="phone" name="phone" class="form-control mask-phones {{ $errors->has('phone') ? 'is-invalid' : '' }}" placeholder="ex.: (71) 98888-8888" value="{{ old('phone') }}" minlength="14" maxlength="15" @if($errors->has('phone')) autofocus @endif>
                        </div>
                        @if($errors->has('phone'))
                            <!-- alerta de erro -->
                            <div class="invalid-feedback" role="alert">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>

                    <!-- mensagem -->
                    <div class="form-group">
                        <label class="form-control-label font-weight-bold" for="message">Mensagem</label>
                        <span class="fe-star" title="obrigatório">*</span>
                        <div class="input-group validate-message">
                            <textarea id="message" name="message" rows="4" resize="none" class="form-control form-control-textarea {{ $errors->has('message') ? 'is-invalid' : '' }}" placeholder="ex.: Olá tudo bem, gostaria de entrar em contato com você." minlength="10" maxlength="1500" required onkeyup="firstLetterUppercase(this);" @if($errors->has('message')) autofocus @endif>{{ old('message') }}</textarea>
                        </div>
                        @if($errors->has('message'))
                            <!-- alerta de erro -->
                            <div class="invalid-feedback" role="alert">{{ $errors->first('message') }}</div>
                        @endif
                    </div>

                    <!-- no-captcha -->
                    <div class="form-group">
                        <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" value="">
                        @if ($errors->has('g-recaptcha-response'))
                            <!-- alerta de erro -->
                            <div class="invalid-feedback d-block" role="alert">{{ $errors->first('g-recaptcha-response') }}</div>
                        @endif
                        <small class="text-muted d-block mt-2">
                            Protegido por reCAPTCHA. Aplicam-se a
                            <a href="https://policies.google.com/privacy" target="_blank" rel="noopener">Política de Privacidade</a>
                            e os <a href="https://policies.google.com/terms" target="_blank" rel="noopener">Termos</a> do Google.
                        </small>
                    </div>

                    <!-- botão -->
                    <a href="javascript:void(0)" type="submit" id="button-send-contact" class="btn btn-primary">Enviar mensagem</a>
                </form>
            </div>

            <!-- imagem -->
            <div class="col-lg-6">
                <img src="{{ url('images/default/others/contact.png') }}" class="img-fluid fe-center-y op-0-9" alt="">
            </div>
        </div>
    </div>
</div>

@include('pages.contact.layouts.contact.ajax')
@include('pages.contact.layouts.contact.validate')
