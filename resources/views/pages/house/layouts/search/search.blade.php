<div class="site-section site-section-sm pb-0">
    <div class="container">
        <!-- social -->
        <div class="row">
            <div class="col-md-12">
                <div class="pos-absolute right-0 mr-1 mr-sm-0 mr-md-0 mr-lg-0">
                    @foreach (App\Models\About\Information\Social::getSocial() as $social)
                        <a href="{{ $social['link'] }}" target="_blank" class="btn text-white fe-social-search">
                            <i class="{{ $social->getIcon->icon }}"></i>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- seleção -->
        <div class="row">
            <form class="form-search form-search-top col-md-12">
                <div class="row align-items-end">
                    @if (request()->segment(count(request()->segments())) == 'home')
                        <!-- oferta -->
                        <div class="col-md-2 mb-4 mb-lg-0">
                            <label for="types-offer">Tipo de oferta</label>
                            <div class="select-wrap">
                                <select id="types-offer" name="types_offer" class="form-control d-block">
                                    <option value="1">Aluguel</option>
                                    <option value="2">Lançamentos</option>
                                    <option value="3">Usados</option>
                                </select>
                            </div>
                        </div>
                    @endif

                    <!-- imóvel -->
                    <div class="mb-4 mb-lg-0 {{ request()->segment(count(request()->segments())) == 'home' ? 'col-md-2' : 'col-md-3' }}">
                        <label for="types-house">Tipo de imóvel</label>
                        <div class="select-wrap">
                            <select id="types-house" name="types_house" class="form-control d-block">
                                <option value="1">Condomínio</option>
                                <option value="2">Casa</option>
                                <option value="3">Village</option>
                                <option value="4">Sala</option>
                            </select>
                        </div>
                    </div>

                    <!-- cidade -->
                    <div class="col-md-3 mb-4 mb-lg-0">
                        <label for="select-city">Selecione a cidade</label>
                        <div class="select-wrap">
                            <select name="select_city" id="select-city" class="form-control d-block">
                                <option value="1">Salvador</option>
                                <option value="2">Lauro de Freitas</option>
                                <option value="3">Camaçari</option>
                                <option value="4">Simões Filho</option>
                            </select>
                        </div>
                    </div>

                    <!-- bairro -->
                    <div class="mb-4 mb-lg-0 {{ request()->segment(count(request()->segments())) == 'home' ? 'col-md-3' : 'col-md-4' }}">
                        <label for="select-neighborhood">Selecione o bairro</label>
                        <div class="select-wrap">
                            <select name="select_neighborhood" id="select-neighborhood" class="form-control d-block">
                                <option value="1">Alpha Ville</option>
                                <option value="2">Pituba</option>
                                <option value="3">Barra</option>
                                <option value="4">Graça</option>
                            </select>
                        </div>
                    </div>

                    <!-- botão -->
                    <div class="col-md-2 mt-4">
                        <a type="submit" id="btn-search" class="btn btn-success text-white btn-block">Buscar</a>
                    </div>
                </div>
            </form>
        </div>

        <!-- filtro -->
        <div class="row">
            <div class="col-md-12">
                <div class="view-options bg-white py-3 px-3 d-md-flex align-items-center">
                    <!-- modo de visualização -->
                    <div class="ml-3 ml-md-2 fe-mobile-none">
                        <a href="javascript:void(0)" id="card-module" class="icon-view view-module active">
                            <span class="icon-view_module"></span>
                        </a>
                        <a href="javascript:void(0)" id="card-list" class="icon-view view-list">
                            <span class="icon-view_list"></span>
                        </a>
                    </div>

                    <!-- ordem -->
                    <div class="ml-auto d-flex align-items-center">
                        <div class="filter-search">
                            <a href="javascript:void(0)" class="view-list px-3 border-right active">Todos</a>
                            <a href="javascript:void(0)" class="view-list px-3 border-right">Recentes</a>
                        </div>

                        <div class="select-wrap ml-3 mt-2">
                            <label>
                                <select class="form-control form-control-sm d-block pr-5">
                                    <option value="">Sem ordem</option>
                                    <option value="asc">Menor preço</option>
                                    <option value="desc">Maior preço</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
