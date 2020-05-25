<div class="site-blocks-cover inner-page-cover overlay fe-img-center" style="background-image: url({{ $background }});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <h1 class="mb-2">Notícias</h1>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb--70">
            @if(!isset($news[0]))
                <div class="fe-center-x">não há notícias</div>
            @endif
            @foreach($news as $new)
                <!-- card -->
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="card-content-blog">
                        <a href="{{ route('blog.detail', ['id' => $new['id']]) }}">
                            <img src="{{ $new->storageFile($new['background']) }}" class="img-fluid img-fluid-module" alt="">
                            <div class="p-4 bg-white card-blog">
                                <span class="d-block text-secondary small font-weight-bold mb-10">
                                    <i class="fas fa-calendar-alt mr-2"></i>
                                    {{ App\Helpers\FormatHelpers::datetime_to_date_br($new['date']) }}
                                </span>
                                <h2 class="h5 text-black mb-3">{{ App\Helpers\FormatHelpers::limiter($new['title'], 40) }}</h2>
                                <div class="fe-text-color">{{ App\Helpers\FormatHelpers::replaceQuill(App\Helpers\FormatHelpers::limiter($new['description'], 150)) }}</div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- paginação -->
<div class="col-md-12 text-center">
    @include('layouts.components.pagination', ['paginator' => $news])
</div>
