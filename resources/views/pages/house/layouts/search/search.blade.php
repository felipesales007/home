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
        <form method="get" action="{{ route('home.page') }}">
            <div class="row">
                <div class="form-search form-search-top col-md-12">
                    <div class="row align-items-end">
                        @if (request()->segment(count(request()->segments())) == 'home')
                            <!-- oferta -->
                            <div class="col-md-2 mb-4 mb-lg-0">
                                <label for="type-offer">Tipo de oferta</label>
                                <div class="select-wrap">
                                    {{ Form::select(
                                        "name",
                                        App\Models\Publication\House\Offer::getOffersOptions(),
                                        old("type_offer", $offer),
                                        ["id" => "type-offer", "name" => "type_offer", "class" => "form-control d-block", "placeholder" => "Selecione"]
                                    )}}
                                </div>
                            </div>
                        @endif

                        <!-- imóvel -->
                        <div class="mb-4 mb-lg-0 {{ request()->segment(count(request()->segments())) == 'home' ? 'col-md-2' : 'col-md-3' }}">
                            <label for="type-house">Tipo de imóvel</label>
                            <div class="select-wrap">
                                {{ Form::select(
                                    "name",
                                    App\Models\Publication\House\TypeHouse::getTypesHousesOptions(),
                                    old("type_house", $type_house),
                                    ["id" => "type-house", "name" => "type_house", "class" => "form-control d-block", "placeholder" => "Selecione"]
                                )}}
                            </div>
                        </div>

                        <!-- cidade -->
                        <div class="col-md-3 mb-4 mb-lg-0">
                            <label for="select-city">Selecione a cidade</label>
                            <div class="select-wrap">
                                {{ Form::select(
                                    "name",
                                    App\Models\Publication\House\House::getHousesCitiesOptions(),
                                    old("select_city", $city),
                                    ["id" => "select-city", "name" => "select_city", "class" => "form-control d-block", "placeholder" => "Selecione"]
                                )}}
                            </div>
                        </div>

                        <!-- bairro -->
                        <div class="mb-4 mb-lg-0 {{ request()->segment(count(request()->segments())) == 'home' ? 'col-md-3' : 'col-md-4' }}">
                            <label for="select-neighborhood">Selecione o bairro</label>
                            <div class="select-wrap">
                                {{ Form::select(
                                    "name",
                                    App\Models\Publication\House\House::getHousesNeighborhoodsOptions(),
                                    old("select_neighborhood", $neighborhood),
                                    ["id" => "select-neighborhood", "name" => "select_neighborhood", "class" => "form-control d-block", "placeholder" => "Selecione"]
                                )}}
                            </div>
                        </div>

                        <!-- botão -->
                        <div class="col-md-2 mt-4">
                            <button id="btn-search" class="btn btn-success text-white btn-block">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- filtro -->
            <div id="filter-houses" class="row">
                <div class="col-md-12">
                    <div class="view-options bg-white py-3 px-3 d-md-flex align-items-center">
                        <!-- modo de visualização -->
                        <div class="ml-3 ml-md-2 fe-mobile-none">
                            <a href="javascript:void(0)" id="card-module" class="icon-view active">
                                <span class="icon-view_module"></span>
                            </a>
                            <a href="javascript:void(0)" id="card-list" class="icon-view">
                                <span class="icon-view_list"></span>
                            </a>
                        </div>

                        <!-- ordem -->
                        <div class="ml-auto d-flex align-items-center">
                            <div class="select-wrap ml-3 mt-2">
                                <label>
                                    <select id="order" name="order" class="form-control form-control-sm d-block pr-5">
                                        <option value="created_at-desc" @if($order == 'created_at-desc') selected @endif>Recentes</option>
                                        <option value="name-asc" @if($order == 'name-asc') selected @endif>A-Z</option>
                                        <option value="name-desc" @if($order == 'name-desc') selected @endif>Z-A</option>
                                        <option value="value-asc" @if($order == 'value-asc') selected @endif>Menor preço</option>
                                        <option value="value-desc" @if($order == 'value-desc') selected @endif>Maior preço</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
