<div class="site-blocks-cover inner-page-cover overlay fe-img-center" style="background-image: url({{ $news->storageFile($news['background']) }});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <h1 class="mb-2">Notícia</h1>
            </div>
        </div>
        <div class="mt-20">
            @include('layouts.components.return')
        </div>
    </div>
</div>

<!-- informativo -->
<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ml-auto">
                <!-- título -->
                <div class="site-section-title">
                    <h2>{{ $news['title'] }}</h2>
                </div>
                <!-- data -->
                <span class="d-block text-secondary small font-weight-bold mb-10">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    {{ App\Helpers\FormatHelpers::datetime_to_date_br($news['date']) }}
                </span>
                <!-- descrição -->
                <span>{!! $news['description'] !!}</span>
            </div>
            <div class="col-md-6">
                <img src="{{ $news->storageFile($news['image']) }}" class="img-fluid fe-radius" alt="">
            </div>
        </div>
    </div>
</div>
