<div class="search-block equal-heigt">
    <div class="title-underlined title-search">
        <h2>{{ trans('content.trouvez_produit.h2') }}</h2>
        <p class="sub-title">{{ trans('content.trouvez_produit.h2_under') }}</p>
    </div>
    <ul>
        @if(is_collection_with_elements(Catalog::families()))
            <li class="thumb-search">
                <a href="{{ route('type', ['id' => 1, 'name' => trans('routes.type_1')]) }}">
                    <div class="image-holder">
                        <img src="{{ asset('images/pictos/img_1.png') }}" alt="">
                        <img src="{{ asset('images/pictos/img_1_hover.png') }}" alt="" class="image-hover">
                    </div>
                    <p>{!! Config::get('ref_types.'.App::getLocale().'.1') !!}</p>
                </a>
                <fieldset>
                    <div class="select-outer">
                        <select size="1" id="select_by_gamme_1">
                            <?php /* 2016.10.20 désactivation du "Sélectionner"
                            <option value="">{{ trans('content.global.selectionner') }}...</option>
                            */ ?>
                            <option value="{{ route('type', ['id' => 1, 'name' => trans('routes.type_1')]) }}">{{ ucfirst(trans('content.global.toutes')) }}</option>
                            @foreach(Catalog::families() as $index => $family)
                                @if(is_collection_with_element($family->types, 0))
                                    @if($family->types[0]->id == 1)
                                        <option value="{{ route('families', ['id' => $family->id, 'name' => str_slug($family->title)]) }}">{{$family->title}}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                        <i class="icon-select select-button"></i>
                    </div>
                    <button type="submit" class="btn btn-primary btn_access_by_gamme"
                            rel="1">{{ trans('content.global.voir') }}</button>
                </fieldset>
            </li>
        @endif
        <li class="thumb-search">
            <a href="{{ route('type', ['id' => 2, 'name' => trans('routes.type_2')]) }}">
                <div class="image-holder">
                    <img src="{{ asset('images/pictos/img_2.png') }}" alt="">
                    <img src="{{ asset('images/pictos/img_2_hover.png') }}" alt="" class="image-hover">
                </div>
                <p>{!! Config::get('ref_types.'.App::getLocale().'.2') !!}</p>
            </a>
            <fieldset>
                <div class="select-outer">
                    <select size="1" id="select_by_gamme_2">
                        <?php /* 2016.10.20 désactivation du "Sélectionner"
                        <option value="">{{ trans('content.global.selectionner') }}...</option>
                        */ ?>
                        <option value="{{ route('type', ['id' => 2, 'name' => trans('routes.type_2')]) }}">{{ ucfirst(trans('content.global.toutes')) }}</option>
                        @foreach(Catalog::families() as $index => $family)
                            @if(is_collection_with_element($family->types, 0))
                                @if($family->types[0]->id == 2)
                                    <option value="{{ route('families', ['id' => $family->id, 'name' => str_slug($family->title)]) }}">{{$family->title}}</option>
                                @endif
                            @endif
                        @endforeach
                    </select>
                    <i class="icon-select select-button"></i>
                </div>
                <button type="submit" class="btn btn-primary btn_access_by_gamme"
                        rel="2">{{ trans('content.global.voir') }}</button>
            </fieldset>
        </li>
        <li class="thumb-search">
            <a href="{{ route('type', ['id' => 3, 'name' => trans('routes.type_3')]) }}">
                <div class="image-holder">
                    <img src="{{ asset('images/pictos/img_3.png') }}" alt="">
                    <img src="{{ asset('images/pictos/img_3_hover.png') }}" alt="" class="image-hover">
                </div>
                <p>{!! Config::get('ref_types.'.App::getLocale().'.3') !!}</p>
            </a>
            <fieldset>
                <div class="select-outer">
                    <select size="1" id="select_by_gamme_3">
                    	<?php /* 2016.10.20 désactivation du "Sélectionner"
                        <option value="">{{ trans('content.global.selectionner') }}...</option>
                        */ ?>
                        <option value="{{ route('type', ['id' => 3, 'name' => trans('routes.type_3')]) }}">{{ ucfirst(trans('content.global.toutes')) }}</option>
                        @foreach(Catalog::families() as $index => $family)
                            @if(is_collection_with_element($family->types, 0))
                                @if($family->types[0]->id == 3)
                                    <option value="{{ route('families', ['id' => $family->id, 'name' => str_slug($family->title)]) }}">{{$family->title}}</option>
                                @endif
                            @endif
                        @endforeach
                    </select>
                    <i class="icon-select select-button"></i>
                </div>
                <button type="submit" class="btn btn-primary btn_access_by_gamme"
                        rel="3">{{ trans('content.global.voir') }}</button>
            </fieldset>
        </li>
    </ul>
</div>
<?php /*
                    <form action="" class="visible-xs">
                        <fieldset>
                            <div class="select-outer">
                                <select size="1" >
                                    <option>{{ trans('content.global.selectionner') }}...</option>
                                    <option value="">1</option>
                                    <option value="">2</option>
                                </select>
                                <i class="icon-select select-button"></i>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ trans('content.global.voir') }}</button>
                        </fieldset>
                    </form>
                    */ ?>

@section('scripts')
    @parent
    <script type="text/javascript">
        $(document).ready(function () {
            $(".btn_access_by_gamme").click(function () {
                var url = $('select#select_by_gamme_' + $(this).attr("rel")).val();
                if (url != '') {
                    window.location.href = url;
                }
            });
        });
    </script>

@endsection