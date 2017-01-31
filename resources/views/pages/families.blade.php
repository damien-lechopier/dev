@extends('layout.home')

@section('meta_title', trans('metas.gammes.'.$id.'.titre'))
@section('meta_desc', trans('metas.gammes.'.$id.'.desc'))
@section('meta_keywords', trans('metas.gammes.'.$id.'.keywords'))

@section('breadcrumb')
	 <li>{{ trans('content.menu.menu.produits') }}</li>
     <li class="active">{{ $family->title }}</li>
@endsection

@section('content')

    @include('nav.header')

    <section id="main">
        <div class="container">
            @include('nav.breadcrumb')
            <div class="title-page title-underlined">
                <h1 style="text-transform:lowercase;">{{$family->title}}</h1>
                <p class="sub-title"
                   style="text-transform:lowercase;">{{ trans('content.produit.h1.produit_par') }} @if(is_collection_with_element($family->types, 0)){{ $family->types[0]->name }}@endif</p>
            </div>
            <a href="javascript:history.back();" class="retour">{{ trans('content.global.retour') }}</a>
            <section class="product-list">
                <div class="row">
                    @if(count($products) > 0)
                        @foreach($products as $index => $product)
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3"
                                 onClick="javascript:window.location.href = '{{ route('produit', ['id' => $product->id, 'name' => str_slug(strip_tags($product->reference))]) }}';">
                                <div class="thumb product">
                                    @if(is_collection_with_element($product->visibleVisuals, 0))
                                        <img src="{{ asset(route('catalog.image.size', ['id' => $product->visibleVisuals[0]->id, 'size' => 'S', 'filename' => $product->visibleVisuals[0]->filename])) }}"
                                             alt="{{$product->visibleVisuals[0]->tag_alt}}"
                                             style="width: 120px; margin-top: 100px; margin-bottom: 100px;">
                                    @else
                                        <img src="{{ asset('images/default.jpg') }}" alt=""
                                             style="width:100%;margin:0 0 20px 0;"/>
                                    @endif
                                    <p class="title">{!! $product->reference !!}</p>
                                    <div class="p-hover">
                                        {{--<a href="{{ route('produit', ['id' => $product->id, 'name' => str_slug($product->reference)]) }}"--}}
                                           {{--class="details">{{ trans('content.global.details') }}</a>--}}
                                        <p>{{mb_strimwidth($product->designation, 0, 153, "...")}}</p>
                                    </div>
                                    <a href="{{ route('produit', ['id' => $product->id, 'name' => str_slug(strip_tags($product->reference))]) }}"
                                       class="btn btn-primary">{{ trans('content.global.voir') }}</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-xs-12">
                            <p>Aucun produit n'a été trouvé.</p>
                        </div>
                    @endif
                </div>
            </section>
        </div>
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