<div class="bg-gradient">
    <div class="container">
        <h2>{{ trans('content.fiches.h2') }}</h2>
        <p class="sub-title title-underlined">{{ trans('content.fiches.h2_under') }}</p>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="thumb option">
                    <img src="{{ asset('images/pictos/prod_8.png') }}" alt="Product Image">
                    <img src="{{ asset('images/pictos/prod_4.png') }}" alt="Product Image">
                    <p class="title"><span class="subtitle">{{ trans('content.fiches.thermoplongeurs') }}</span>{{
                        trans('content.fiches.thermoplongeurs.type.1') }}</p>
                    @if(is_collection($fiches))
                        <div class="button-holder-2">
                            @foreach($fiches as $index => $fiche)
                                @if(is_collection_with_element($fiche->types, 0))
                                    @if(($fiche->types[0]->name == "Thermoplongeurs Galvatherm" || $fiche->types[0]->name == "Galvatherm immersion heaters") && $fiche->status == config("constants.statuses.PUBLISHED"))
                                        <a href="{{ route('fiche', ['id' => $fiche->id, 'name' => str_slug($fiche->title)]) }}"
                                           class="btn btn-primary">{{$fiche->title}}</a>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="thumb option">
                    <img src="{{ asset('images/pictos/prod_10.png') }}" alt="Product Image">
                    <img src="{{ asset('images/pictos/prod_9.png') }}" alt="Product Image">
                    <p class="title"><span class="subtitle">{{ trans('content.fiches.thermoplongeurs') }}</span>{{
                        trans('content.fiches.thermoplongeurs.type.2') }}</p>
                    @if(is_collection($fiches))
                        <div class="button-holder-2">
                            @foreach($fiches as $index => $fiche)
                                @if(is_collection_with_element($fiche->types, 0))
                                    @if(($fiche->types[0]->name == "Thermoplongeurs à gaine" || $fiche->types[0]->name == "Tube immersion heaters") && $fiche->status == config("constants.statuses.PUBLISHED"))
                                        <a href="{{ route('fiche', ['id' => $fiche->id, 'name' => str_slug($fiche->title)]) }}"
                                           class="btn btn-primary">{{$fiche->title}}</a>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="thumb option">
                    <img src="{{ asset('images/pictos/prod_11.png') }}" alt="Product Image">
                    <img src="{{ asset('images/pictos/prod_12.png') }}" alt="Product Image">
                    <img src="{{ asset('images/pictos/prod_13.png') }}" alt="Product Image">
                    <p class="title"><span class="subtitle">{{ trans('content.fiches.thermoplongeurs') }}</span>{{
                        trans('content.fiches.thermoplongeurs.type.3') }}</p>
                    @if(is_collection($fiches))
                        <div class="button-holder-2">
                            @foreach($fiches as $index => $fiche)
                                @if(is_collection_with_element($fiche->types, 0))
                                    @if(($fiche->types[0]->name == "Thermoplongeurs blindés" || $fiche->types[0]->name == "Sheated tubular immersion heaters") && $fiche->status == config("constants.statuses.PUBLISHED"))
                                        <a href="{{ route('fiche', ['id' => $fiche->id, 'name' => str_slug($fiche->title)]) }}"
                                           class="btn btn-primary">{{$fiche->title}}</a>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<?php /*
 <section class="bg-gradient">
            <div class="container">
                <div class="title-underlined">
                    <h2>fiches techniques générales</h2>
                    <p class="sub-title">des gammes thermoplongeurs Galvatek</p>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="thumb option">
                            <img src="{{ asset('images/pictos/prod_8.png') }}" alt="Product Image">
                            <img src="{{ asset('images/pictos/prod_4.png') }}" alt="Product Image">
                            <p class="title"><span class="subtitle">thermoplongeurs</span>Galvatherm</p>
                            <div class="button-holder">
                                <button class="btn btn-primary"><span>thermoplongeurs</span>Galvatherm</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="thumb option">
                            <img src="{{ asset('images/pictos/prod_9.png') }}" alt="Product Image">
                            <img src="{{ asset('images/pictos/prod_10.png') }}" alt="Product Image">
                            <p class="title"><span class="subtitle">thermoplongeurs</span>à gaine</p>
                            <div class="button-holder">
                                <button class="btn btn-primary"><span>thermoplongeurs à gaine</span>Rotkappe</button>
                                <button class="btn btn-primary"><span>cartouches de chauffage</span>Calor</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="thumb option">
                            <img src="{{ asset('images/pictos/prod_11.png') }}" alt="Product Image">
                            <img src="{{ asset('images/pictos/prod_12.png') }}" alt="Product Image">
                            <p class="title"><span class="subtitle">thermoplongeurs</span>blindés</p>
                            <div class="button-holder">
                                <button class="btn btn-primary"><span>thermoplongeurs blindés</span>Galmaform</button>
                                <button class="btn btn-primary"><span>thermoplongeurs blindés</span>Galvaflon</button>
                                <button class="btn btn-primary"><span>corps de chauffe à visser</span>Etto</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

*/ ?>