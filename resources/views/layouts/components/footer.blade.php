<footer class="site-footer">
    <div class="container">
        <div class="row mt-lg-4">
            <!-- autor -->
            <div class="col-lg-6 text-left">
                <p><span class="fe-mobile-none">Copyright</span> &copy; <script>document.write(new Date().getFullYear())</script>, Desenvolvido por <a href="https://www.zendigital.com.br" target="_blank">Zen Digital</a></p>
            </div>

            <!-- social -->
            <div class="col-lg-6 text-right">
                @foreach (App\Models\About\Information\Social::getSocial() as $social)
                    <a href="{{ $social['link'] }}" target="_blank" class="pl-0 pr-3">
                        <i class="{{ $social->getIcon->icon }}"></i>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</footer>
