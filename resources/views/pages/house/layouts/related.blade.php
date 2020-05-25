<div class="site-section site-section-sm {{ basename(request()->path()) == 'detalhes' ? 'bg-light' : 'bg-white' }}">
    <div class="container mb--100 mb-lg-3">
        <!-- título -->
        <div class="row">
            <div class="col-12">
                <div class="site-section-title mb-5">
                    <h2>Últimos divulgados</h2>
                </div>
            </div>
        </div>

        <!-- sugestões -->
        <div class="row mb-5">
            @if(!isset($recents[0]))
                <div class="fe-center-x">não há imóveis</div>
            @endif
            @foreach($recents as $recent)
                <!-- card -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="property-entry h-100">
                        <a href="{{ route('house.detail', ['id' => $recent['id']]) }}">
                            <!-- informações -->
                            <div class="property-thumbnail property-thumbnail-module">
                                <!-- tag -->
                                <div class="offer-type-wrap">
                                    <span class="offer-type bg-success">{{ rtrim($recent->getTypeOffer->name, 's') }}</span>
                                    @if(now()->diffInDays($recent['created_at']) < 30)
                                        <span class="offer-type bg-danger">Recente</span>
                                    @endif
                                </div>

                                <!-- imagem -->
                                <img src="{{ $recent->storageFile($recent['image']) }}" class="img-fluid img-fluid-module" alt="">
                            </div>

                            <!-- detalhes -->
                            <div class="p-4 property-body">
                                <h2 class="property-title">{{ $recent['name'] }}</h2>
                                <span class="property-location fe-text-color d-block mb-3">
                                    <span class="property-icon icon-room"></span>
                                    {{ $recent['address'] }}, {{ $recent['neighborhood'] }}, {{ $recent['city'] }} - {{ $recent->getState->uf }}
                                </span>
                                <strong class="property-price text-primary mb-3 d-block text-success">R$ {{ App\Helpers\FormatHelpers::replace(',00', '', App\Helpers\FormatHelpers::to_real($recent['value'])) }}</strong>
                                <ul class="property-specs-wrap fe-text-color mb-3 mb-lg-0">
                                    <li class="text-center">
                                        <span class="property-specs">Quartos</span>
                                        <span class="property-specs-number">{{ $recent['bedroom'] ?? '-' }}</span>
                                    </li>
                                    <li class="text-center">
                                        <span class="property-specs">Banheiros</span>
                                        <span class="property-specs-number">{{ $recent['bathroom'] ?? '-' }}</span>
                                    </li>
                                    <li class="text-center">
                                        <span class="property-specs">Garagem</span>
                                        <span class="property-specs-number">{{ $recent['garage'] ?? '-' }}</span>
                                    </li>
                                    <li class="text-center">
                                        <span class="property-specs">Área</span>
                                        <span class="property-specs-number">{{ $recent['area'] ?? '-' }}m²</span>
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
