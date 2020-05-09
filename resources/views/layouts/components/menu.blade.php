<div id="menu" class="site-wrap">
    <!-- menu mobile -->
    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body">
            <!-- social -->
            <div class="col-lg-12 text-right fe-social-mobile">
                <a href="javascript:void(0)" target="_blank" class="pl-0 pr-3 fe-text-color">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="javascript:void(0)" target="_blank" class="pl-3 pr-3 fe-text-color">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="javascript:void(0)" target="_blank" class="pl-3 pr-3 fe-text-color">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="javascript:void(0)" target="_blank" class="pl-3 pr-3 fe-text-color">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- menu desktop -->
    <div class="site-navbar mt-4">
        <div class="container py-1">
            <div class="row align-items-center">
                <!-- título -->
                <div class="col-8 col-md-8 col-lg-4">
                    <div class="text-white h2 mb-0">
                        <strong>Casa Online<span class="text-danger">.</span></strong>
                    </div>
                </div>
                <!-- menu -->
                <div class="col-4 col-md-4 col-lg-8">
                    <nav class="site-navigation text-right text-md-right" role="navigation">
                        <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3">
                            <a href="javascript:void(0)" class="site-menu-toggle js-menu-toggle text-white">
                                <span class="icon-menu h3"></span>
                            </a>
                        </div>

                        <!-- opções -->
                        <ul class="site-menu js-clone-nav d-none d-lg-block">
                            <li><a href="{{ route('home.page') }}">Home</a></li>
                            <li><a href="{{ route('house.release') }}">Lançamentos</a></li>
                            <li><a href="{{ route('house.used') }}">Usados</a></li>
                            <li><a href="{{ route('house.rental') }}">Aluguel</a></li>
                            <li><a href="{{ route('blog.page') }}">Notícias</a></li>
                            <li><a href="javascript:void(0)">Sobre</a></li>
                            @if (App\Models\About\Information\Description::getDescription()['email'])
                                <li><a href="{{ route('contact.page') }}">Contato</a></li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
