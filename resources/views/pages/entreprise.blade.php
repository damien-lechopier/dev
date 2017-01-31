@extends('layout.home')

@section('meta_title', trans('metas.entreprise.titre'))
@section('meta_desc', trans('metas.entreprise.desc'))
@section('meta_keywords', trans('metas.entreprise.keywords'))

@section('breadcrumb')
	<li class="active">{{ trans('content.menu.menu.entreprise') }}</li>
@endsection


@section('content')

	@include('nav.header')
	
	<section id="main">
        <div class="container">
             @include('nav.breadcrumb')
            <div class="title-page title-underlined">
                 <h1>{{ trans('content.entreprise.h1') }}</h1>
                <p class="sub-title">{{ trans('content.entreprise.h1_under') }}</p>
            </div>
            <a href="javascript:history.back();" class="retour">{{ trans('content.global.retour') }}</a>
            <p class="sub-title color-light">{{ trans('content.entreprise.intro') }}</p>
        </div>
        <section class="company-description">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <h4>{{ trans('content.entreprise.col.1.h4') }} </h4>
                        <div class="column-first">
                        	{!! trans('content.entreprise.col.1.desc') !!}
                        </div>
                    </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <h4>{{ trans('content.entreprise.col.2.h4') }}</h4>
                        {!! trans('content.entreprise.col.2.desc') !!}
                        <div class="download">
                            <img src="{{ asset('images/pictos/iso-9001.png') }}">
                            <button class="btn btn-default" onClick="javascript:window.open('{{ asset('upload/certif_iso_9001_2008_fr.pdf') }}');"><i class="icon-download"></i><span>{{ trans('content.entreprise.telecharger.certification') }} (PDF - 707 Ko)</span></button>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="thumb text labeled">
                            <p class="title">{!! trans('content.entreprise.encart.titre') !!}</p>
                            <p class="text">{{ trans('content.entreprise.encart.desc') }}</p>
                            <a class="fancybox_video btn btn-primary" href="https://www.youtube.com/watch?v=Cdom4Lfdx54">{{ trans('content.entreprise.encart.voirlavideo') }}</a>
                            <img src="{{ asset('images/pictos/made_france.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
       @include('nav.fiches')
       
    </section>


@endsection





