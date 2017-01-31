@extends('layout.home')

@section('meta_title', $fiche->title)
@section('meta_desc', trans('metas.fiche.'.$id.'.desc'))
@section('meta_keywords', trans('metas.fiche.'.$id.'.keywords'))

@section('breadcrumb')
    <li>{{ trans('content.menu.menu.fiches') }}</li>
    <li class="active">{{$fiche->title}}</li>
@endsection

@section('content')

    @include('nav.header')

    <section id="main">
        <div class="container">
            @include('nav.breadcrumb')
            <div class="title-page title-underlined">
                <h1>{{$fiche->title}}</h1>
                <p class="sub-title">{{ trans('content.menu.menu.fiches') }}
                    > @if(is_collection_with_element($fiche->types, 0)){{$fiche->types[0]->name}}@endif</p>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <section class="gallery slider-pro">
                        <div class="sp-slides">
                            @if(is_collection_with_elements($fiche->visuals))
                                @foreach($fiche->visuals as $index => $image)
                                    <div class="sp-slide">
                                        <a href="{{ asset(route('catalog.image', ['id' => $image->id, 'fileable' => $image->id, 'filename' => $image->filename])) }}"
                                           class="fancybox" rel="gallery1" title="{{ $image->name }}"><img
                                                    class="sp-image"
                                                    src="{{ asset(route('catalog.image', ['id' => $image->id, 'fileable' => $image->id, 'filename' => $image->filename])) }}"
                                                    alt="{{$image->tag_alt}}"></a>
                                        <img class="sp-thumbnail"
                                             src="{{ asset(route('catalog.image', ['id' => $image->id, 'fileable' => $image->id, 'filename' => $image->filename])) }}"
                                             alt="{{$image->tag_alt}}">
                                    </div>
                                @endforeach
                            @else
                                <div class="sp-slide">
                                    <a href="{{ asset('images/default.jpg') }}" class="fancybox" rel="gallery1"
                                       title="{{ $image->name }}"><img class="sp-image"
                                                                       src="{{ asset('images/default.jpg') }}"
                                                                       alt="Fiche Image"></a>
                                    <img class="sp-thumbnail" src="{{ asset('images/default.jpg') }}"
                                         alt="Product Image"/>
                                </div>
                            @endif
                        </div>
                    </section>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <section class="product-description">
                        <div class="text-description">
                            <p class="sub-title"><strong>{{$fiche->title}}</strong></p>
                            {!! $fiche->description !!}
                        </div>
                    </section>
                    <div class="row">
                        @if(is_collection_with_elements($modules))
                            @foreach($modules as $index => $module)
                                <div class="col-xs-12">
                                    <div class="text-description">
                                        <p class="sub-title"
                                           style="font-family:arial;font-size:14px;font-weight:bold;">{{ $module->name }}</p>
                                        {!! $module->description  !!}
                                    </div>
                                    @foreach($module->visuals as $visual)
                                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                            <div class="text-center">
                                                <img class="sp-thumbnail img-responsive"
                                                     src="{{ asset(route('catalog.image', ['id' => $visual->id, 'fileable' => $visual->id, 'filename' => $visual->thumbnail])) }}"
                                                     alt="{{$visual->tag_alt}}" style="width: 250px">
                                                <p>{{$visual->title}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        @endif
                    </div>

                </div>
            </div>
            <br>
            <div class="title-page title-underlined">
                <h1>{{ strtoupper(trans('content.fiches.produits')) }} - {{$fiche->title}}</h1>
            </div>
            <div class="row">
                @if(is_collection_with_elements($fiche->products))
                    <ul>
                        @foreach($fiche->products as $index => $product)
                            <li class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                @if (is_collection_with_elements($product->visuals))
                                    <a href="{{ route('produit', ['id' => $product->id, 'name' => str_slug(strip_tags($product->reference))]) }}">
                                        <img class="sp-thumbnail"
                                             src="{{ asset(route('catalog.image', ['id' => $product->visuals[0]->id, 'fileable' => $product->visuals[0]->id, 'filename' => $product->visuals[0]->filename])) }}"
                                             alt="{{$product->visuals[0]->tag_alt}}"
                                             style="height: 200px; margin: auto;"><br>
                                        @endif
                                        <strong>{!! $product->reference !!}</strong></a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="col-xs-12">
                        <p>Aucun produit n'a été trouvé.</p>
                    </div>
                @endif

            </div>
        </div>
        <br>
        <br>
        @include('nav.fiches')

        <section class="search-block-holder">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                        @include('nav.trouvez_produit')
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                        @include('nav.technique')
                    </div>
                </div>
            </div>
        </section>
    </section>

@endsection