<div id="card-house-module" class="site-section site-section-sm bg-light">
    <div class="container">
        <div class="row">
            @if (!$houses[0])
                <div class="fe-center-x">não há imóveis</div>
            @endif
            @foreach ($houses as $house)
                <!-- card -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="property-entry h-100">
                        <a href="{{ route('house.detail', ['id' => $house['id']]) }}">
                            <!-- informações -->
                            <div class="property-thumbnail property-thumbnail-module">
                                <!-- tag -->
                                <div class="offer-type-wrap">
                                    <span class="offer-type bg-success">{{ $house['offer'] }}</span>
                                    @if (now()->diffInDays($house['created_at']) < 30)
                                        <span class="offer-type bg-danger">Recente</span>
                                    @endif
                                </div>

                                <!-- imagem -->
                                <img src="{{ $house['image'] ? config('app.storage') . '/images/entities/' . config('app.id') . '/publication/houses/houses/' . $house['image'] : url('images/default/others/image.png') }}" class="img-fluid img-fluid-module" alt="">
                            </div>

                            <!-- detalhes -->
                            <div class="p-4 property-body">
                                <h2 class="property-title">{{ $house['name'] }}</h2>
                                <span class="property-location fe-text-color d-block mb-3">
                                    <span class="property-icon icon-room"></span>
                                    {{ $house['address'] }}, {{ $house['neighborhood'] }}, {{ $house['city'] }} - {{ $house['uf'] }}
                                </span>
                                <strong class="property-price text-primary mb-3 d-block text-success">{{ App\Helpers\FormatHelpers::replace(',00', '', App\Helpers\FormatHelpers::to_real($house['value'])) }}</strong>
                                <ul class="property-specs-wrap fe-text-color mb-3 mb-lg-0">
                                    <li class="text-center">
                                        <span class="property-specs">Quartos</span>
                                        <span class="property-specs-number">{{ $house['bedroom'] }}</span>
                                    </li>
                                    <li class="text-center">
                                        <span class="property-specs">Banheiros</span>
                                        <span class="property-specs-number">{{ $house['bathroom'] }}</span>
                                    </li>
                                    <li class="text-center">
                                        <span class="property-specs">Garagem</span>
                                        <span class="property-specs-number">{{ $house['garage'] }}</span>
                                    </li>
                                    <li class="text-center">
                                        <span class="property-specs">Área</span>
                                        <span class="property-specs-number">{{ $house['area'] }}m²</span>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
