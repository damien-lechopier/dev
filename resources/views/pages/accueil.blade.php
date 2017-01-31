@extends('layout.home')

@section('meta_title', trans('metas.home.titre'))
@section('meta_desc', trans('metas.home.desc'))
@section('meta_keywords', trans('metas.home.keywords'))


@section('content')

@include('nav.header_main')

<section id="main">
    <section class="search-block-holder">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    @include('nav.trouvez_produit')
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                    <div class="block-calcul equal-heigt">
                         <div class="select-technique">
                            <div class="title-underlined">
                                <h2>{{ trans('content.home.brochure.h2') }}</h2>
                            </div>
                            <button class="btn btn-inverse" onClick="javascript:window.open('{{ asset('upload/brochure_generale_'.Config::get('app.locale').'.pdf') }}');">{{ trans('content.global.telecharger') }}</button>
                        </div>
                  
                        <div class="select-technique" >
                            <div class="title-underlined" >
                                <h2>{{ trans('content.home.calcul.h2') }}</h2>
                                <p class="sub-title">{{ trans('content.home.calcul.h2_under') }}</p>
                            </div>
                            <p>{{ trans('content.home.calcul.desc') }}</p>
                        </div>
                        <div class="button-holder">
                            <button class="btn btn-inverse" onClick="javascript:window.location.href = '{{ route('calcul.index') }}'">{{ trans('content.home.calcul.button') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    @include('nav.fiches')
    
    <div class="main-page-info border-brand">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                    <div class="title-underlined">
                        <h2>{{ trans('content.home.savoir.h2') }}</h2>
                        <p class="sub-title">Galvatek</p>
                    </div>
                    {!! trans('content.home.savoir.desc') !!}
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 col-lg-offset-1">
                    <h2>{{ trans('content.home.technique.h2') }}</h2>
                    <p class="sub-title title-underlined">{{ trans('content.home.technique.h2_under') }}</p>

                        <div class="pull-right">
                            <h4>{{ trans('content.home.technique.caracteristiques.h4') }}</h4>
                            <button class="btn btn-default" onClick="javascript:window.location.href = '{{ route('technique') }}';"><i class="icon-squares"></i><span>{{ trans('content.home.technique.caracteristiques.button') }}</span></button>
                            <h4>{{ trans('content.home.technique.compatibilite.h4') }}</h4>
                            {!! trans('content.home.technique.compatibilite.desc') !!}
                            <button class="btn btn-default" onClick="javascript:window.location.href = '{{ route('technique') }}';"><i class="icon-download"></i><span>{{ trans('content.home.technique.compatibilite.button') }}</span></button>
                        </div>
                        <div class="pull-left">
                            <img src="{{ asset('images/pictos/iso-9001.png') }}" alt="">
                            <ul class="picture-title">
                               	{!! trans('content.home.iso') !!}
                            </ul>
                        </div>

                </div>
            </div>
        </div>
    </div>
    <section class="main-page-thumb-holder">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="thumb text">
                        <p class="title">GALVATEK<span class="subtitle">{{ trans('content.home.bottom.bloc.1.h_under') }}</span></p>
                        <p class="text">{{ trans('content.home.bottom.bloc.1.desc') }}</p>
                        <button class="btn btn-primary" onClick="javascript:window.location.href='{{ route('entreprise') }}'">{{ trans('content.global.decouvrir') }}</button>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="thumb text">
                        <p class="title">GALVATEK<span class="subtitle">{{ trans('content.home.bottom.bloc.2.h_under') }}</span></p>
                        <p class="text">{{ trans('content.home.bottom.bloc.2.desc') }}</p>
                        <button class="btn btn-primary" onClick="javascript:window.location.href='{{ route('reseau') }}'">{{ trans('content.global.decouvrir') }}</button>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="thumb text labeled">
                        <p class="title">{{ trans('content.home.bottom.bloc.3.h') }}<span class="subtitle">{{ trans('content.home.bottom.bloc.3.h_under') }}</span></p>
                        <p class="text">{{ trans('content.home.bottom.bloc.3.desc') }}</p>
                        <button class="btn btn-primary" onClick="javascript:window.location.href='{{ route('entreprise') }}'">{{ trans('content.global.decouvrir') }}</button>
                        <img src="{{ asset('images/pictos/made_france.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>


@endsection


@section('scripts')

	<script type="text/javascript">
		$( document ).ready(function() {

		});
	</script>

@endsection