@extends('layout.home')

@section('meta_title', trans('metas.reseau.titre'))
@section('meta_desc', trans('metas.reseau.desc'))
@section('meta_keywords', trans('metas.reseau.keywords'))

@section('breadcrumb')
	<li class="active">{{ trans('content.menu.menu.reseau') }}</li>
@endsection


@section('content')

	@include('nav.header')

    <section id="main">
        <div class="container">
            @include('nav.breadcrumb')
            <div class="title-page title-underlined">
                <h1>{{ trans('content.reseau.h1') }}</h1>
                <p class="sub-title">{{ trans('content.reseau.h1_under') }}</p>
            </div>
            <a href="javascript:history.back();" class="retour">{{ trans('content.global.retour') }}</a>
        </div>
        <section class="search-block-holder border-brand">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                         <div class="title-underlined">
                            <h2>{{ trans('content.reseau.agents_commerciaux.h2') }}</h2>
                            <p class="sub-title">{{ trans('content.reseau.agents_commerciaux.h2_under') }}</p>
                        </div>
                        
                        <br style="clear:both;" />
                		<br style="clear:both;" />
                        
                        <div class="col-xs-12 col-sm-6">
							<h4>Dimeca</h4>
							<br/>
							<p>
							<a href="http://www.dimeca.fr" target="_blank" class="partner-link-dimeca">www.dimeca.fr</a>
							RHONE-ALPES<br/>
							BOURGOGNE (dépts 21 et 71)<br/>
							FRANCHE-COMTÉ
							</p>
						</div>                      	
                        <div class="col-xs-12 col-sm-6">
                        	<h4>Difatec</h4>
                        	<br/>
							<p>
							<a href="http://www.difatec.com" target="_blank" class="partner-link-difatec">www.difatec.com</a>
							ILE DE FRANCE<br/>
							PICARDIE<br/>
							CENTRE<br/>
							CHAMPAGNE-ARDENNES<br/>
							BOURGOGNE (dépt 89)
                        	</p>
                        </div>
                        
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                        @include('nav.distributeur')
                    </div>
                </div>
            </div>
        </section>
        <div class="technique-info">
            <div class="container">
                <div class="row">
                	
                	<div class="title-underlined">
                        <h2>{{ trans('content.reseau.reseau_commercial_export.h2') }}</h2>
                    	<p class="sub-title">{{ trans('content.reseau.reseau_commercial_export.h2_under') }}</p>
                    </div>
                	
                	<br style="clear:both;" />
                	<br style="clear:both;" />
                	
						<div class="col-xs-12 col-sm-2">
							<h4>AMERIQUES</h4>
							<h5>U.S.A.</h5>
							<?php /* 
							<p>Nom<br /><a href="http://www.nom.com" target="_blank">www.nom.com</a><br /> 
							<a href="mailto:contact@nom.com" target="_blank">contact@nom.com</a></p>*/ ?> 
							<br />
							<h5>MEXIQUE</h5>
							<br />
							<h5>CHILI</h5>
							<br />
							
						</div>
						<div class="col-xs-12 col-sm-2">
							<h4>EUROPE</h4>
							<h5>ALLEMAGNE</h5>
							<br />
							<h5>BELGIQUE</h5>
							<br />
							<h5>DANEMARK</h5>
							<br />
							<h5>ESPAGNE</h5>
							<br />
							
						</div>
						<div class="col-xs-12 col-sm-2">
							
							<h4>&nbsp;</h4>
							<h5>FINLANDE</h5>
							<br />
							<h5>GRECE</h5>
							<br />
							<h5>ITALIE</h5>
							<br />
							<h5>ROYAUME UNI</h5>
							<br />
							
						</div>
						<div class="col-xs-12 col-sm-2">
							
							<h4>&nbsp;</h4>
							<h5>PAYS BAS</h5>
							<br />
							<h5>POLOGNE</h5>
							<br />
							<h5>SUEDE</h5>
							<br />
							
							
						</div>
						<div class="col-xs-12 col-sm-2">
							
							<h4>&nbsp;</h4>
							<h5>SUISSE</h5>
							<br />
							<h5>TURQUIE</h5>
							<br />
							
						</div>
						<div class="col-xs-12 col-sm-2">
							<h4>ASIE - OCEANIE</h4>
							<h5>HONG-KONG</h5>
							<br />
							<h5>INDE</h5>
							<br />
							<h5>MALAISIE</h5>
							<br />
							<h4>MOYEN ORIENT</h4>
							<h5>ISRAEL</h5>
							<br />
						
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    
   @endsection