<div class="site-section site-section-sm {{ request()->segment(count(request()->segments())) == 'detalhes' ? 'bg-light' : 'bg-white' }}">
    <div class="container mb--100 mb-lg-3">
        <!-- título -->
        <div class="row">
            <div class="col-12">
                <div class="site-section-title mb-5">
                    <h2>Relacionados</h2>
                </div>
            </div>
        </div>

        <!-- sugestões -->
        <div class="row mb-5">
            <!-- card -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="property-entry h-100">
                    <a href="{{ route('house.detail') }}">
                        <!-- informações -->
                        <div class="property-thumbnail property-thumbnail-module">
                            <!-- tag -->
                            <div class="offer-type-wrap">
                                <span class="offer-type bg-success">Lançamento</span>
                                <span class="offer-type bg-danger">Recente</span>
                            </div>

                            <!-- imagem -->
                            <img src="{{ url('template/images/casa-1.png') }}" class="img-fluid img-fluid-module" alt="">
                        </div>

                        <!-- detalhes -->
                        <div class="p-4 property-body">
                            <h2 class="property-title">Condomínio Varandas do Vale</h2>
                            <span class="property-location fe-text-color d-block mb-3">
                                <span class="property-icon icon-room"></span>
                                Rua Varandas da Serra, Novo Horizonte, Salvador - BA
                            </span>
                            <strong class="property-price text-primary mb-3 d-block text-success">R$ 250.000</strong>
                            <ul class="property-specs-wrap fe-text-color mb-3 mb-lg-0">
                                <li class="text-center">
                                    <span class="property-specs">Quartos</span>
                                    <span class="property-specs-number">2</span>
                                </li>
                                <li class="text-center">
                                    <span class="property-specs">Banheiros</span>
                                    <span class="property-specs-number">2</span>
                                </li>
                                <li class="text-center">
                                    <span class="property-specs">Garagem</span>
                                    <span class="property-specs-number">1</span>
                                </li>
                                <li class="text-center">
                                    <span class="property-specs">Área</span>
                                    <span class="property-specs-number">165m²</span>
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>
            </div>

            <!-- card -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="property-entry h-100">
                    <a href="{{ route('house.detail') }}">
                        <!-- informações -->
                        <div class="property-thumbnail property-thumbnail-module">
                            <!-- tag -->
                            <div class="offer-type-wrap">
                                <span class="offer-type bg-warning">Aluguel</span>
                            </div>

                            <!-- imagem -->
                            <img src="{{ url('template/images/casa-3.png') }}" class="img-fluid img-fluid-module" alt="">
                        </div>

                        <!-- detalhes -->
                        <div class="p-4 property-body">
                            <h2 class="property-title">Condomínio Flores do Campo</h2>
                            <span class="property-location fe-text-color d-block mb-3">
                                <span class="property-icon icon-room"></span>
                                Rua 2 de Julho, Pituba, Salvador - BA
                            </span>
                            <strong class="property-price text-primary mb-3 d-block text-success">R$ 1.200</strong>
                            <ul class="property-specs-wrap fe-text-color mb-3 mb-lg-0">
                                <li class="text-center">
                                    <span class="property-specs">Quartos</span>
                                    <span class="property-specs-number">1</span>
                                </li>
                                <li class="text-center">
                                    <span class="property-specs">Banheiros</span>
                                    <span class="property-specs-number">1</span>
                                </li>
                                <li class="text-center">
                                    <span class="property-specs">Garagem</span>
                                    <span class="property-specs-number">1</span>
                                </li>
                                <li class="text-center">
                                    <span class="property-specs">Área</span>
                                    <span class="property-specs-number">54m²</span>
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>
            </div>

            <!-- card -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="property-entry h-100">
                    <a href="{{ route('house.detail') }}">
                        <!-- informações -->
                        <div class="property-thumbnail property-thumbnail-module">
                            <!-- tag -->
                            <div class="offer-type-wrap">
                                <span class="offer-type bg-info">Usado</span>
                                <span class="offer-type bg-danger">Recente</span>
                            </div>

                            <!-- imagem -->
                            <img src="{{ url('template/images/casa-4.png') }}" class="img-fluid img-fluid-module" alt="">
                        </div>

                        <!-- detalhes -->
                        <div class="p-4 property-body">
                            <h2 class="property-title">Condomínio Cores de Piatã</h2>
                            <span class="property-location fe-text-color d-block mb-3">
                                <span class="property-icon icon-room"></span>
                                Rua Dom João, Piatã, Salvador - BA
                            </span>
                            <strong class="property-price text-primary mb-3 d-block text-success">R$ 220.000</strong>
                            <ul class="property-specs-wrap fe-text-color mb-3 mb-lg-0">
                                <li class="text-center">
                                    <span class="property-specs">Quartos</span>
                                    <span class="property-specs-number">2</span>
                                </li>
                                <li class="text-center">
                                    <span class="property-specs">Banheiros</span>
                                    <span class="property-specs-number">2</span>
                                </li>
                                <li class="text-center">
                                    <span class="property-specs">Garagem</span>
                                    <span class="property-specs-number">2</span>
                                </li>
                                <li class="text-center">
                                    <span class="property-specs">Área</span>
                                    <span class="property-specs-number">72m²</span>
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
