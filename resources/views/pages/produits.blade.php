@extends('layout.home')

@section('meta_title', trans('metas.produit.'.$id.'.titre'))
@section('meta_desc', trans('metas.produit.'.$id.'.desc'))
@section('meta_keywords', trans('metas.produit.'.$id.'.keywords'))

@section('breadcrumb')
    <li>{{ trans('content.menu.menu.produits') }}</li>
    <li class="active">{!! $product->reference !!}</li>
@endsection

@section('content')

    @include('nav.header')

    <section id="main">
        <div class="container">
            @include('nav.breadcrumb')
            <div class="title-page title-underlined">
                <h1>{!! $product->reference !!}</h1>
                <p class="sub-title"
                   style="text-transform:lowercase;"><?php /*{{ trans('content.produit.h1.par') }}*/ ?> {{$subTitle}}</p>
            </div>
            <a href="javascript:window.history.back();"
               class="retour">{{ trans('content.produit.retour_liste_produits') }}</a>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <section class="gallery slider-pro">
                        <div class="sp-slides">
                            @if(is_collection_with_elements($product->visibleVisuals))
                                @foreach($product->visibleVisuals as $index => $image)
                                    <div class="sp-slide">
                                        <a href="{{ asset(route('catalog.image.size', ['id' => $image->id, 'size' => 'M', 'filename' => $image->filename])) }}"
                                           class="fancybox" rel="gallery1" title="{{ $image->title }}"><img
                                                    class="sp-image"
                                                    src="{{ asset(route('catalog.image.size', ['id' => $image->id, 'size' => 'S', 'filename' => $image->filename])) }}"
                                                    alt="{{$image->tag_alt}}"></a>
                                        <img class="sp-thumbnail"
                                             src="{{ asset(route('catalog.image.size', ['id' => $image->id, 'size' => 'XS', 'filename' => $image->filename])) }}"
                                             alt="{{$image->tag_alt}}">
                                    </div>
                                @endforeach
                            @else
                                <div class="sp-slide">
                                    <a href="{{ asset('images/default.jpg') }}" class="fancybox" rel="gallery1">
                                        <img class="sp-image" src="{{ asset('images/default.jpg') }}"
                                             alt="Product Image">
                                    </a>
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
                            {!! $product->description !!}
                        </div>
                        <div class="buttons-operations">
                        	@if(is_collection_with_elements($product->documents))
                               <?php 
                               	$str_public="";
                               	$str_private="";
                               ?>
                                @foreach($product->documents as $index => $document)
                                    @if($document->status == config('constants.statuses.PUBLISHED')
                                        && (!is_null($document->tag_src) || !empty($document->filename))
                                        && ($document->title != "Titre manquant" && $document->title != "Missing title" && !empty($document->title)))
                                        
                                        <?php 
                                        if($document->filter == 'public' ){
                                            $str_public .= '<a href="'.asset(route('catalog.image', ['id' => $document->id, 'filename' => empty($document->tag_src) ? $document->filename : $document->tag_src])).'" class="btn btn-default">';
                                                $str_public .= '<i class="icon-download"></i><span><strong>'.$document->title.'</strong></span>';
                                            $str_public .= '</a>';
                                        }else{
                                            if (Auth::check()){
                                                $str_private .= '<a href="'.asset(route('catalog.image', ['id' => $document->id, 'filename' => empty($document->tag_src) ? $document->filename : $document->tag_src])).'" class="btn btn-default">';
                                                    $str_private .= '<i class="icon-download"></i><span><strong>'.$document->title.'</strong></span>';
                                                $str_private .= '</a>';
                                            }else{
                                                $str_private .= '<a href="#" onclick="openmodal()" class="btn btn-default">';
                                                    $str_private .= '<i class="icon-download"></i><span><strong>'.$document->title.'</strong></span>';
                                                $str_private .= '</a>';
                                             }
                                        }
                                        ?>
                                        
                                    @endif
                                @endforeach
                            @endif
                            <?php 
                            	echo $str_public;
                            	echo $str_private;
                            ?>
                            <div class="row">
                                <div class="col-xs-6 col-sm-12">
                                    @if(!empty($product->video))
                                        <a href="https://www.youtube.com/watch?v={{$product->video}}" target="_blank"
                                           class="btn btn-primary"><i class="icon-video"></i>
                                            {!! trans('content.produit.button.voir_video') !!}</a>
                                    @endif
                                    @if(is_collection_with_element($product->ranges, 0))
                                        <a href="{{ route('fiche', ['id' => $product->ranges[0]->id, 'name' => str_slug($product->ranges[0]->name)]) }}"
                                           class="btn btn-primary"><i class="icon-fiche"></i>
                                            {!! trans('content.produit.button.voir_fiche') !!}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <section class="bg-gradient no-padding">
            <div class="container">
                <h2 class="title-underlined">{{ trans('content.produit.optionsetaccessoires') }}</h2>
            </div>
            <div class="additional-product">
                <div class="container">
                    <div class="row">
                        @if(is_collection_with_elements($accessories))
                            @foreach($accessories as $index => $accessory)
                                <div class="col-xs-12 col-sm-3" style="margin:0 0 20px 0;">
                                    <div class="thumb product" style="cursor:initial;">
                                        <?php /*
                        <div class="thumb product" style="cursor:initial;background:#fff url('@if(is_collection_with_element($accessory->visuals, 0)) {{ asset(route('catalog.image.size', ['id' => $accessory->visuals[0]->id, 'size' => 'S', 'filename' => $accessory->visuals[0]->filename])) }}  @else {{ asset('images/default.jpg') }} @endif') center center no-repeat;">
                        */ ?>
                                        @if(is_collection_with_element($accessory->visuals, 0))
                                            <img src="{{ asset(route('catalog.image.size', ['id' => $accessory->visuals[0]->id, 'size' => 'S', 'filename' => $accessory->visuals[0]->filename])) }}"
                                                 alt="{{$accessory->visuals[0]->tag_alt}}">
                                        @else
                                            <img src="{{ asset('images/default.jpg') }}"
                                                 alt="{{$accessory->name}}"/>
                                        @endif

                                        <p class="title">{{$accessory->name}}</p>

                                        <div class="p-hover">
                                            {!! $accessory->description !!}
                                        </div>

                                        @if(is_collection_with_element($accessory->visuals, 0))
                                            <button class="btn btn-primary hidden-xs fancybox"
                                                    title="{!! strip_tags(str_replace(array('<br />', '<br/>' , '<br>'), ' ', $accessory->description)) !!}"
                                                    href="{{ asset(route('catalog.image', ['id' => $accessory->visuals[0]->id, 'size' => 'M', 'filename' => $accessory->visuals[0]->filename])) }}">
                                                {{ trans('content.global.voir') }}
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-xs-12">
                                <p>Aucun accessoire n'est disponible.</p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="additional-product-control">
                    <div class="container">
                        <a href="{{ route('produit', ['id' => $previous->id, 'name' => str_slug(strip_tags($previous->reference))]) }}"
                           class="left-control"><span
                                    class="hidden-xs">{{ trans('content.global.precedent') }}</span></a>
                        <h3>produits par {{$subTitle}}</h3>
                        <a href="{{ route('produit', ['id' => $next->id, 'name' => str_slug(strip_tags($next->reference))]) }}"
                           class="right-control">
                            <span class="hidden-xs">{{ trans('content.global.suivant') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
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
    @include('pages.auth_modal')

@endsection

@section('scripts')
    <script type="text/javascript">
        function openmodal(doc_id, doc_name) {
            $('#requested_file_id').val(doc_id);
            $('#requested_file_name').val(doc_name);
            $('#auth_modal').modal('show');
        }
    </script>
@endsection