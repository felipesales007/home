<div class="slide-one-item home-slider owl-carousel bg-light">
    @foreach($slides as $slide)
        <div class="site-blocks-cover overlay" data-aos="fade" data-stellar-background-ratio="0.5" style="background-image: url({{ $slide['image'] ? config('app.storage') . '/images/entities/' . config('app.id') . '/presentation/slide-one/' . $slide['image'] : url('images/default/others/house.png') }});">
            <div class="container">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col-md-10">
                        <h1 class="mb-2">{{ $slide['title'] }}</h1>
                        <p class="mb-5"><strong class="h2 text-success font-weight-bold">{{ $slide['description'] }}</strong></p>
                        @if($slide['link'])
                            <p><a href="{{ $slide['link'] }}" @if($slide['new_tab']) target="_blank" @endif class="btn btn-white btn-outline-white py-3 px-5 btn-2">{{ $slide['button'] ?? 'Mais detalhes' }}</a></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
