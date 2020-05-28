<footer class="site-footer">
    <div class="container">
        <div class="row mt-lg-4 footer-mb-desktop {{ isset($socials[0]) ? '' : 'py-2 py-lg-0' }}">
            <!-- autor -->
            <div class="col-lg-6 text-left fe-center-mobile">
                <div>
                    <span class="fe-mobile-none">Copyright</span> &copy; {{ now()->year }}, Desenvolvido por <a href="https://www.zendigital.com.br" target="_blank">Zen Digital</a>
                </div>
            </div>

            <!-- social -->
            <div class="col-lg-6 text-right fe-center-mobile">
                @foreach($socials as $social)
                    <a href="{{ $social['link'] }}" target="_blank" class="pl-0 pr-3">
                        <i class="{{ $social->getIcon->icon }}"></i>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</footer>
