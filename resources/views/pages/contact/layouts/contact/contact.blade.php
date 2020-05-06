<section>
    <form id="form-contact" role="form" autocomplete="off" novalidate>
        @csrf
        <div class="col-lg-12">
            <!-- nome -->
            <div class="form-group">
                <label class="form-control-label" for="name">Nome</label>
                <div class="input-group input-group-merge validate-name">
                    <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="ex.: Felipe Sales" value="{{ old('name') }}" minlength="3" maxlength="191" required onkeypress="return onlyLetters(event);" onkeyup="letterUppercase('name');" @if ($errors->has('name')) autofocus @endif>
                </div>
                @if ($errors->has('name'))
                    <!-- alerta de erro -->
                    <div class="invalid-feedback" role="alert">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <!-- e-mail -->
            <div class="form-group">
                <label class="form-control-label" for="email">E-mail</label>
                <div class="input-group input-group-merge validate-email">
                    <input type="email" id="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="ex.: exemplo@dominio.com" value="{{ old('email') }}" maxlength="191" required autocomplete="email" @if ($errors->has('email')) autofocus @endif>
                </div>
                @if ($errors->has('email'))
                    <!-- alerta de erro -->
                    <div class="invalid-feedback" role="alert">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <!-- mensagem -->
            <div class="form-group">
                <label class="form-control-label" for="message">Mensagem</label>
                <div class="input-group validate-message">
                    <textarea id="message" name="message" rows="4" resize="none" class="form-control form-control-textarea {{ $errors->has('message') ? 'is-invalid' : '' }}" placeholder="ex.: Olá tudo bem, gostaria de entrar em contato com você." minlength="10" maxlength="1500" onkeyup="firstLetterUppercase(this);" @if ($errors->has('message')) autofocus @endif>{{ old('message') }}</textarea>
                </div>
                @if ($errors->has('message'))
                    <!-- alerta de erro -->
                    <div class="invalid-feedback" role="alert">{{ $errors->first('message') }}</div>
                @endif
            </div>

            <!-- no-captcha -->
            <div class="form-group">
                <div class="input-group input-group-merge validate-g-recaptcha-response fe-recaptcha mt-20">
                    {!!  NoCaptcha::renderJs () !!}
                    {!!  NoCaptcha::display() !!}
                </div>
                <div id="g-recaptcha-error"></div>
                @if ($errors->has('g-recaptcha-response'))
                    <!-- alerta de erro -->
                    <div class="invalid-feedback" role="alert">{{ $errors->first('g-recaptcha-response') }}</div>
                @endif
            </div>

            <!-- botão -->
            <a href="javascript:void(0)" type="submit" id="button-send-contact" class="btn btn-primary">Enviar mensagem</a>
        </div>
    </form>
</section>

@include('pages.contact.layouts.contact.ajax')
@include('pages.contact.layouts.contact.validate')
