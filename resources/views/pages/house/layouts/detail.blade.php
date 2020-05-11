<div class="site-blocks-cover inner-page-cover overlay fe-img-center" style="background-image: url({{ url('template/images/casa-1.png') }});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <h1 class="mb-2">Condomínio Varandas do Vale</h1>
            </div>
        </div>
        <div class="mt-20">
            @include('layouts.components.return')
        </div>
    </div>
</div>

<!-- corpo -->
<div class="site-section site-section-sm">
    <div class="container">
        <div class="row">
            <!-- card casa -->
            <div class="col-lg-8 mb-5 mb-lg-0">
                <!-- slide -->
                <div class="slide-one-item home-slider owl-carousel bg-light">
                    <img src="{{ url('template/images/casa-1.png') }}" class="img-fluid img-fluid-detail" alt="">
                    <img src="{{ url('template/images/casa-2.png') }}" class="img-fluid img-fluid-detail" alt="">
                    <img src="{{ url('template/images/casa-3.png') }}" class="img-fluid img-fluid-detail" alt="">
                </div>

                <!-- informações -->
                <div class="bg-white property-body border-bottom border-left border-right card-house-detail">
                    <!-- compartilhar -->
                    <div class="fe-share">
                        <small>Compartilhar: </small>
                        <!-- whatsapp -->
                        <a href="https://api.whatsapp.com/send?text={{ request()->url() }}" target="_blank" class="fe-share-button whatsapp" title="Compartilhe no Whatsapp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <!-- facebook -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->url() }}" onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;" class="fe-share-button facebook" title="Compartilhe no Facebook">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        <!-- twitter -->
                        <a href="https://twitter.com/intent/tweet?url={{ request()->url() }}" onclick="window.open(this.href, 'twitter-share', 'width=550,height=235');return false;" class="fe-share-button twitter" title="Compartilhe no Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>

                    <!-- especificações -->
                    <div class="row mb-2 mt-2">
                        <div class="col-md-12 mb-3 mt--20">
                            <strong class="h3 text-black">Condomínio Varandas do Vale</strong>
                        </div>
                        <div class="col-md-12">
                            <span class="property-location fe-text-color d-block mb-3">
                                <span class="property-icon icon-room"></span>
                                Rua Dom João, Piatã, Salvador - BA
                            </span>
                        </div>
                        <div class="col-md-6">
                            <strong class="h3 text-success">R$ 250.000</strong>
                        </div>
                        <div class="col-md-6 mt-4 mt-lg-0">
                            <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                                <li class="text-center">
                                    <span class="property-specs">Quartos</span>
                                    <span class="property-specs-number">2</span>
                                </li>
                                <li class="text-center">
                                    <span class="property-specs">Banheiros</span>
                                    <span class="property-specs-number">2</span>
                                </li>
                                <li class="text-center">
                                    <span class="property-specs">Garagem</span>
                                    <span class="property-specs-number">1</span>
                                </li>
                                <li class="text-center">
                                    <span class="property-specs">Área</span>
                                    <span class="property-specs-number">165m²</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- mais dados -->
                    <div class="row mb-5">
                        <div class="col-md-6 col-lg-6 text-center border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text">Tipo de imóvel</span>
                            <strong class="d-block">Condomínio</strong>
                        </div>
                        <div class="col-md-6 col-lg-6 text-center border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text">Condomínio</span>
                            <strong class="d-block">R$ 520</strong>
                        </div>
                    </div>

                    <!-- descrição -->
                    <h2 class="h4 text-black mb-4">Mais informações</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda aperiam perferendis deleniti vitae asperiores accusamus tempora facilis sapiente, quas! Quos asperiores alias fugiat sunt tempora molestias quo deserunt similique sequi.</p>
                    <p>Nisi voluptatum error ipsum repudiandae, autem deleniti, velit dolorem enim quaerat rerum incidunt sed, qui ducimus! Tempora architecto non, eligendi vitae dolorem laudantium dolore blanditiis assumenda in eos hic unde.</p>
                    <p>Voluptatum debitis cupiditate vero tempora error fugit aspernatur sint veniam laboriosam eaque eum, et hic odio quibusdam molestias corporis dicta! Beatae id magni, laudantium nulla iure ea sunt aliquam.</p>

                    <!-- galeria -->
                    <div class="row no-gutters mt-5">
                        <div class="col-12">
                            <h2 class="h4 text-black mb-3">Galeria</h2>
                        </div>
                        <!-- imagens -->
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <a href="{{ url('template/images/img_1.jpg') }}" class="image-popup gal-item">
                                <img src="{{ url('template/images/img_1.jpg') }}" class="img-fluid img-fluid-gallery" alt="">
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <a href="{{ url('template/images/img_2.jpg') }}" class="image-popup gal-item">
                                <img src="{{ url('template/images/img_2.jpg') }}" class="img-fluid img-fluid-gallery" alt="">
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <a href="{{ url('template/images/img_3.jpg') }}" class="image-popup gal-item">
                                <img src="{{ url('template/images/img_3.jpg') }}" class="img-fluid img-fluid-gallery" alt="">
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <a href="{{ url('template/images/img_4.jpg') }}" class="image-popup gal-item">
                                <img src="{{ url('template/images/img_4.jpg') }}" class="img-fluid img-fluid-gallery" alt="">
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <a href="{{ url('template/images/img_5.jpg') }}" class="image-popup gal-item">
                                <img src="{{ url('template/images/img_5.jpg') }}" class="img-fluid img-fluid-gallery" alt="">
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <a href="{{ url('template/images/casa-1.png') }}" class="image-popup gal-item">
                                <img src="{{ url('template/images/casa-1.png') }}" class="img-fluid img-fluid-gallery" alt="">
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <a href="{{ url('template/images/img_7.jpg') }}" class="image-popup gal-item">
                                <img src="{{ url('template/images/img_7.jpg') }}" class="img-fluid img-fluid-gallery" alt="">
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <a href="{{ url('template/images/img_8.jpg') }}" class="image-popup gal-item">
                                <img src="{{ url('template/images/img_8.jpg') }}" class="img-fluid img-fluid-gallery" alt="">
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <a href="{{ url('template/images/img_1.jpg') }}" class="image-popup gal-item">
                                <img src="{{ url('template/images/img_1.jpg') }}" class="img-fluid img-fluid-gallery" alt="">
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <a href="{{ url('template/images/caixa.jpg') }}" class="image-popup gal-item">
                                <img src="{{ url('template/images/caixa.jpg') }}" class="img-fluid img-fluid-gallery" alt="">
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <a href="{{ url('template/images/img_3.jpg') }}" class="image-popup gal-item">
                                <img src="{{ url('template/images/img_3.jpg') }}" class="img-fluid img-fluid-gallery" alt="">
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <a href="{{ url('template/images/img_4.jpg') }}" class="image-popup gal-item">
                                <img src="{{ url('template/images/img_4.jpg') }}" class="img-fluid img-fluid-gallery" alt="">
                            </a>
                        </div>

                        <!-- vídeos -->
                        <iframe src="https://www.youtube.com/embed/7o9MjRcjTg0{{--{{ substr($item['youtube'], strrpos($item['youtube'], '=') + 1) }}--}}" class="mt-3 fe-radius" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen width="100%" height="250px"></iframe>
                        <iframe src="https://www.youtube.com/embed/YSsDr2YrB-U{{--{{ substr($item['youtube'], strrpos($item['youtube'], '=') + 1) }}--}}" class="mt-3 fe-radius" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen width="100%" height="250px"></iframe>
                    </div>
                </div>
            </div>

            <!-- card contato -->
            <div class="col-lg-4">
                <!-- telefone -->
                <div class="bg-white widget border rounded">
                    <h3 class="h4 text-black widget-title mb-3">Contato</h3>
                    <i class="fas fa-phone mr-1"></i>
                    (71) 99140-2371
                </div>

                <!-- whatsapp -->
                <div class="bg-white widget border rounded mt-4">
                    <h3 class="h4 text-black widget-title mb-3">Contato por whatsapp</h3>
                    <a href="https://api.whatsapp.com/send?phone=55{{ preg_replace('/[^0-9]/', '', App\Models\About\Information\Description::getDescription()['whatsapp']) }}&text=Gostaria de saber mais sobre o imóvel Condomínio Varandas do Vale https://www.youtube.com" target="_blank" class="btn btn-success text-white">
                        <i class="fab fa-whatsapp mr-1"></i>
                        Conversar
                    </a>
                </div>

                <!-- e-mail -->
                <div class="bg-white widget border rounded mt-4">
                    <h3 class="h4 text-black widget-title mb-3">Contato por e-mail</h3>
                    <form id="form-contact" role="form" autocomplete="off" novalidate>
                        @csrf
                        <!-- imóvel -->
                        <div hidden class="form-group">
                            <label class="form-control-label font-weight-bold" for="house">Imóvel</label>
                            <span class="fe-star" title="obrigatório">*</span>
                            <div class="input-group input-group-merge validate-house">
                                <input readonly type="text" id="house" name="house" class="form-control {{ $errors->has('house') ? 'is-invalid' : '' }}" value="{{ old('house', 'Condomínio Varandas do Vale') }}" minlength="3" maxlength="191" @if ($errors->has('house')) autofocus @endif>
                            </div>
                            @if ($errors->has('house'))
                                <!-- alerta de erro -->
                                <div class="invalid-feedback" role="alert">{{ $errors->first('house') }}</div>
                            @endif
                        </div>

                        <!-- link -->
                        <div hidden class="form-group">
                            <label class="form-control-label font-weight-bold" for="link">Link</label>
                            <span class="fe-star" title="obrigatório">*</span>
                            <div class="input-group input-group-merge validate-link">
                                <input readonly type="url" id="link" name="link" class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" value="{{ old('link', 'https://www.youtube.com/'/*request()->url()*/) }}" minlength="3" maxlength="191" @if ($errors->has('link')) autofocus @endif>
                            </div>
                            @if ($errors->has('link'))
                                <!-- alerta de erro -->
                                <div class="invalid-feedback" role="alert">{{ $errors->first('link') }}</div>
                            @endif
                        </div>

                        <!-- nome -->
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold" for="name">Nome</label>
                            <span class="fe-star" title="obrigatório">*</span>
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
                            <label class="form-control-label font-weight-bold" for="email">E-mail</label>
                            <span class="fe-star" title="obrigatório">*</span>
                            <div class="input-group input-group-merge validate-email">
                                <input type="email" id="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="ex.: exemplo@dominio.com" value="{{ old('email') }}" maxlength="191" required autocomplete="email" @if ($errors->has('email')) autofocus @endif>
                            </div>
                            @if ($errors->has('email'))
                                <!-- alerta de erro -->
                                <div class="invalid-feedback" role="alert">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <!-- telefone -->
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold" for="phone">Telefone</label>
                            <div class="input-group input-group-merge validate-phone">
                                <input type="tel" id="phone" name="phone" class="form-control mask-phones {{ $errors->has('phone') ? 'is-invalid' : '' }}" placeholder="ex.: (71) 98888-8888" value="{{ old('phone') }}" minlength="14" maxlength="15" @if ($errors->has('phone')) autofocus @endif>
                            </div>
                            @if ($errors->has('phone'))
                                <!-- alerta de erro -->
                                <div class="invalid-feedback" role="alert">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>

                        <!-- mensagem -->
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold" for="message">Mensagem</label>
                            <span class="fe-star" title="obrigatório">*</span>
                            <div class="input-group validate-message">
                                <textarea id="message" name="message" rows="4" resize="none" class="form-control form-control-textarea {{ $errors->has('message') ? 'is-invalid' : '' }}" placeholder="ex.: Olá tudo bem, gostaria de entrar em contato com você." minlength="10" maxlength="1500" required onkeyup="firstLetterUppercase(this);" @if ($errors->has('message')) autofocus @endif>{{ old('message') }}</textarea>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('pages.contact.layouts.contact.ajax')
@include('pages.contact.layouts.contact.validate')
