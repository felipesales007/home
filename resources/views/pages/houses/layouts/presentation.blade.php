<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ url('template/images/casa-1.png') }});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <h1 class="mb-2">{{ request()->segment(count(request()->segments())) == 'lancamentos' ? 'lançamentos' : request()->segment(count(request()->segments())) }}</h1>
            </div>
        </div>
    </div>
</div>
