@extends('layout.home')

@section('meta_title', trans('metas.types.'.$idTypeCategory.'.titre'))
@section('meta_desc', trans('metas.types.'.$idTypeCategory.'.desc'))
@section('meta_keywords', trans('metas.types.'.$idTypeCategory.'.keywords'))

@section('breadcrumb')
	 <li>{{ trans('content.menu.menu.produits') }}</li>
     <li class="active">{{ trans('content.produit.h1_under') }} {{$typeName}}</li>
@endsection

@section('content')

	@include('nav.header')
	
	<section id="main">
    <div class="container">
    	 @include('nav.breadcrumb')
        <div class="title-page title-underlined">
            <h1 style="text-transform:lowercase;">{{ trans('content.produit.h1') }}</h1>
            <p class="sub-title" style="text-transform:lowercase;">{{ trans('content.produit.h1_under') }} {{$typeName}}</p>
        </div>
        <a href="javascript:history.back();" class="retour">{{ trans('content.global.retour') }}</a>
        <section class="product-list">
            <div class="row">
                @if(is_collection_with_elements(Catalog::families()))
                    @foreach(Catalog::families() as $index => $family)
                        @if(is_collection_with_element($family->types, 0))
                            @if($family->types[0]->id == $idTypeCategory)
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" onClick="javascript:window.location.href = '{{ route('families', ['id' => $family->id, 'name' => str_slug($family->title)]) }}';">
                                    <div class="thumb product">
                                        @if(is_collection_with_element($family->visuals, 0))
                                            <img src="{{ asset(route('catalog.image.size', ['id' => $family->visuals[0]->id, 'size' => 'S', 'filename' => $family->visuals[0]->filename])) }}" alt="{{$family->visuals[0]->tag_alt}}">
                                        @else
                                            <img src="{{ asset('images/default.jpg') }}" alt="" style="width:100%;margin:0 0 20px 0;" />
                                        @endif
                                        <p class="title">{{$family->title}}</p>
                                        <div class="p-hover">
                                            <?php /*
                                            <a href="{{ route('families', ['id' => $family->id, 'name' => urlencode($family->name)]) }}" class="details">{{ trans('content.global.details') }}</a>
                                            */ ?>
                                            <p>{{mb_strimwidth($family->description, 0, 153, "...")}}</p>
                                        </div>
                                        <a href="{{ route('families', ['id' => $family->id, 'name' => str_slug($family->title)]) }}" class="btn btn-primary">{{ trans('content.global.voir') }}</a>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                @else
                    <div class="col-xs-12">
                        <p>Aucune catégorie n'a été trouvé.</p>
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