<div id="card-house-list" class="site-section site-section-sm bg-light d-none">
    <div class="container">
        @if(!isset($houses[0]))
            <div class="text-center">não há imóveis</div>
        @endif
        @foreach($houses as $house)
            <!-- card -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <a href="{{ route('house.detail', ['id' => $house['id']]) }}">
                        <div class="property-entry horizontal d-lg-flex h-100">
                            <!-- informações -->
                            <div class="property-thumbnail property-thumbnail-list">
                                <!-- tag -->
                                <div class="offer-type-wrap">
                                    <span class="offer-type bg-success">{{ $house->getOffer->name }}</span>
                                    @if(now()->diffInDays($house['created_at']) < 30)
                                        <span class="offer-type bg-danger">Recente</span>
                                    @endif
                                </div>

                                <!-- imagem -->
                                <img src="{{ $house->storageFile($house['image']) }}" class="img-fluid img-fluid-list" alt="">
                            </div>

                            <!-- detalhes -->
                            <div class="p-4 property-body">
                                <h2 class="property-title">{{ $house['name'] }}</h2>
                                <span class="property-location fe-text-color d-block mb-3">
                                    <span class="property-icon icon-room"></span>
                                    {{ $house['address'] }}, {{ $house['neighborhood'] }}, {{ $house['city'] }} - {{ $house->getState->uf }}
                                </span>
                                <strong class="property-price text-primary mb-3 d-block text-success">R$ {{ App\Helpers\FormatHelpers::replace(',00', '', App\Helpers\FormatHelpers::to_real($house['value'])) }}</strong>
                                <p class="fe-text-color fe-mobile-none">{{ App\Helpers\FormatHelpers::replaceQuill(App\Helpers\FormatHelpers::limiter($house['description'], 175)) }}</p>
                                <ul class="property-specs-wrap fe-text-color mb-3 mb-lg-0">
                                    <li class="text-center">
                                        <span class="property-specs">Quartos</span>
                                        <span class="property-specs-number">{{ $house['bedroom'] ?? '-' }}</span>
                                    </li>
                                    <li class="text-center">
                                        <span class="property-specs">Banheiros</span>
                                        <span class="property-specs-number">{{ $house['bathroom'] ?? '-' }}</span>
                                    </li>
                                    <li class="text-center">
                                        <span class="property-specs">Garagem</span>
                                        <span class="property-specs-number">{{ $house['garage'] ?? '-' }}</span>
                                    </li>
                                    <li class="text-center">
                                        <span class="property-specs">Área</span>
                                        <span class="property-specs-number">{{ $house['area'] ?? '-' }}m²</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- paginação -->
<div class="bg-light">
    <div class="col-md-12 text-center">
        @include('layouts.components.pagination', ['paginator' => $houses->appends(Illuminate\Support\Facades\Request::except('page'))])
    </div>
</div>
