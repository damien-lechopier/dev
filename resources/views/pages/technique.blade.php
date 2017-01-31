@extends('layout.home')

@section('meta_title', trans('metas.technique.titre'))
@section('meta_desc', trans('metas.technique.desc'))
@section('meta_keywords', trans('metas.technique.keywords'))

@section('css')
	
	<style type="text/css">
		
		#technique_button_compatibilite,
		#technique_button_infos{
			display:none;
		}
		
	</style>
	
@endsection


@section('breadcrumb')
	<li class="active">{{ trans('content.menu.menu.technique') }}</li>
@endsection

@section('content')

	@include('nav.header')

    <section id="main">
        <div class="container">
            @include('nav.breadcrumb')
            <div class="title-page title-underlined">
                <h1>{{ trans('content.page_technique.h1') }}</h1>
                <p class="sub-title">{{ trans('content.page_technique.h1_under') }}</p>
            </div>
            <a href="javascript:history.back();" class="retour">{{ trans('content.global.retour') }}</a>
        </div>
        <div class="technique-info border-brand">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <h4>{{ trans('content.page_technique.col.1.h4') }}</h4>
                        {!! trans('content.page_technique.col.1.desc') !!}
                        <button class="btn btn-primary" onClick="javascript:window.open('{{ asset('upload/tableau_recapitulatif_'.Config::get('app.locale').'.pdf') }}');"><i class="icon-squares"></i>{!! trans('content.page_technique.button.consulter_tableau') !!}</button>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <h4>{{ trans('content.page_technique.col.2.h4') }}</h4>
                        {!! trans('content.page_technique.col.2.desc') !!}
                        <button class="btn btn-primary"onClick="javascript:window.open('{{ asset('upload/galvatek_table_de_tenue_'.Config::get('app.locale').'.pdf') }}');"><i class="icon-download"></i>{!! trans('content.page_technique.button.consulter_tableau') !!}</button>
                    </div>
                </div>
            </div>
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