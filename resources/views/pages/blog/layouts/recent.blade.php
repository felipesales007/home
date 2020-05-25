<div class="site-section">
    <div class="container mb--50">
        <!-- título -->
        <div class="row justify-content-center blog-mt--50 mb-5">
            <div class="col-md-7 text-center">
                <div class="site-section-title">
                    <h2>Notícias recentes</h2>
                </div>
            </div>
        </div>

        <!-- três últimas -->
        <div class="row">
            @foreach($recents as $recent)
                <!-- card -->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="card-content-blog">
                        <a href="{{ route('blog.detail', ['id' => $recent['id']]) }}">
                            <img src="{{ $recent['background'] ? config('app.storage') . '/images/entities/' . config('app.id') . '/publication/news/' . $recent['background'] : url('images/default/others/image.png') }}" class="img-fluid img-fluid-module" alt="">
                            <div class="p-4 bg-white card-blog">
                                <span class="d-block text-secondary small font-weight-bold mb-10">
                                    <i class="fas fa-calendar-alt mr-2"></i>
                                    {{ App\Helpers\FormatHelpers::datetime_to_date_br($recent['date']) }}
                                </span>
                                <h2 class="h5 text-black mb-3">{{ App\Helpers\FormatHelpers::limiter($recent['title'], 40) }}</h2>
                                <div class="fe-text-color">{!! App\Helpers\FormatHelpers::limiter($recent['description'], 160) !!}</div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- botão -->
        <div class="col-md-2 mx-auto mb-5 mb-lg-0">
            <a href="{{ route('blog.page') }}" class="btn btn-success text-white btn-block">Mais notícias</a>
        </div>
    </div>
</div>
