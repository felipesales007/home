<div class="site-blocks-cover inner-page-cover overlay fe-img-center" style="background-image: url({{ $background }});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <h1 class="mb-2">{{ basename(request()->path()) == 'lancamentos' ? 'lançamentos' : basename(request()->path()) }}</h1>
            </div>
        </div>
    </div>
</div>
