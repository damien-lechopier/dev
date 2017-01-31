@extends('layout.home')

@section('meta_title', trans('metas.calcul.titre'))
@section('meta_desc', trans('metas.calcul.desc'))
@section('meta_keywords', trans('metas.calcul.keywords'))

@section('breadcrumb')
	<li class="active">{{ trans('content.menu.menu.calcul') }}</li>
@endsection

@section('css')
	
	<style type="text/css">
		
		.title-page{
			width:100%;
		}
		
		.tab_controller{
			font-weight:700;
		}
		
		.tab-pane{
			background-color:#fff;
		}
		
		fieldset h3{
			text-align:center;
			border-bottom:1px solid #8D9DA6;
			color:#8D9DA6;
			margin:30px 0 20px 0;
			padding:0 0 20px 0;
		}
		
		
		
		
	</style>
	
@endsection


@section('content')

	@include('nav.header')


    <section id="main">
    	
    	 <div class="container">
            @include('nav.breadcrumb')
           
            <div class="title-page title-underlined">
                <button class="btn btn-primary pull-right hidden-xs" style="width:250px;" onClick="javascript:window.open('{{ asset('upload/galvatek_formulaire_calcul_puissance.pdf') }}');">
                	<i class="icon-download"></i>
                	<span><span>{{ trans('content.global.telecharger') }}</span>{!! trans('content.calcul.pdf') !!}</span>
                </button>
                <h1>{{ trans('content.calcul.h1') }}</h1>
                <p class="sub-title">{{ trans('content.calcul.h1_under') }}</p>
            </div>
        </div>
        
        <div class="border-brand form-holder">
            <div class="container">
            
            	@if (isset($message_validation) )
				
					<div class="col-xs-12">
						<p style="text-align:center;font-weight:600;font-size:16px;color:#0061A1;margin:0 0 20px 0;">
						{!! $message_validation !!}
						</p>
					</div>
					
				@else
            	
            	
            	{!! Form::open(array('route' => 'calcul.store', 'id' => 'contact-form', 'class' => 'contact-form', 'files' => true)) !!}
            	
            	
            	<div>
				
				  <!-- Nav tabs -->
				  <ul class="nav nav-pills" role="tablist">
				 	 @for ($i = 1; $i < 5; $i++)
				    	<li role="presentation" id="tab_controller_{{$i}}" class="col-xs-12 col-sm-{{ $i<4 ? 3 : 2 }}  tab_controller {{ $i==1 ? 'active' : '' }}"><a href="#tab_{{ $i }}" aria-controls="tab_{{ $i }}" role="tab" data-toggle="tab">{!! trans('content.calcul.tab.'.$i.'.title') !!}</a></li>
				   	@endfor
				   </ul>
					
				  <!-- Tab panes -->
				  <div class="tab-content" style="background:none;border-top:1px solid #000;padding:0;margin:40px 0 0 0;">
				    <div role="tabpanel" class="tab-pane active" id="tab_1" > 

						<fieldset>
				    	 <h3>{!! strip_tags(trans('content.calcul.1.1.h3')) !!}</h3>
				    	
                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-3">
                                <div class="form-column equal-heigt">
                                   
                                    <div class="input-group">
                                        {!! Form::label('vref', trans('content.calcul.1.1.1.label')) !!} 
                                        {{ Form::text('vref', null, ['class' => 'form-control']) }}
									</div>
                                   
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-3">
                                <div class="form-column equal-heigt">
                                   
                                    <div class="input-group">
                                        {!! Form::label('produit_chauffe', trans('content.calcul.1.1.2.label')) !!} 
                                        {{ Form::text('produit_chauffe', null, ['class' => 'form-control']) }}
									</div>
                                   
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-3">
                                <div class="form-column equal-heigt">
                                   
                                    <div class="input-group">
                                        {!! Form::label('composition_chimique', trans('content.calcul.1.1.3.label')) !!} 
                                        {{ Form::text('composition_chimique', null, ['class' => 'form-control']) }}
									</div>
                                   
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-3">
                                <div class="form-column equal-heigt">
                                    <div class="input-group">
                                   		 {!! Form::label('ph', trans('content.calcul.1.1.4.label')) !!} <br/>
                                        {{ Form::text('ph', null, ['class' => 'form-control']) }}
                                    </div>
                                   
                                </div>
                            </div>
                         </div>
						</fieldset>
						
						
						<fieldset>
				    	 <h3>{!! strip_tags(trans('content.calcul.1.2.h3')) !!}</h3>
				    	
                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-3">
                                <h4>{!! strip_tags(trans('content.calcul.1.2.1.h4')) !!}</h4>
                                <div class="form-column">
                                	
                                	{!! Form::label('cuve_stockage', trans('content.calcul.1.2.1.0.label')) !!} 
                                	
                                    <div class="input-group">
                                        {{ Form::radio('cuve_stockage', 'oui') }}
                                        {!! Form::label('cuve_stockage', trans('content.calcul.1.2.1.1.radio.1'), array('class' => 'label_radio')) !!} 
                                        {{ Form::radio('cuve_stockage', 'non') }}
                                        {!! Form::label('cuve_stockage', trans('content.calcul.1.2.1.1.radio.2'), array('class' => 'label_radio')) !!}
                                    </div>
									
									<div class="input-group">
                                        {{ Form::radio('horizontalite', 'couchée') }}
                                        {!! Form::label('horizontalite_couchee', trans('content.calcul.1.2.1.2.radio.1'), array('class' => 'label_radio')) !!} 
                                        {{ Form::radio('horizontalite', 'debout') }}
                                        {!! Form::label('horizontalite_debout', trans('content.calcul.1.2.1.2.radio.2'), array('class' => 'label_radio')) !!} 
									</div>
                                   
                                   <div class="input-group">
                                        {!! Form::label('type_cuve', trans('content.calcul.1.2.1.3.label')) !!} 
                                         <div class="select-outer">
                                            <select id="type_cuve" name="type_cuve">
                                                <option>{{ trans('content.global.selectionner')}}...</option>
                                                @foreach (Config::get('ref_form_calcul.'.App::getLocale().'.type_cuve') as $value)
									            	<option value="{{ $value}}" {{ old('type_cuve')==$value? 'selected' : '' }}>{{ $value }}</option>
									        	@endforeach
                                            </select>
                                            <i class="icon-select select-button"></i>
                                        </div>
                                    </div>
                                   
                                   <div class="input-group">
                                   		<div id="type_cuve_div_rectangulaire" style="display:none;">
                                   		
                                   			 <div class="input-group">
		                                        {!! Form::label('type_cuve_rectangulaire_longueur', trans('content.form.longueur')) !!} 
		                                         <div style="display:table;">
		                                        	{{ Form::text('type_cuve_rectangulaire_longueur', null, ['class' => 'form-control']) }}
													<span class="input-group-addon">mm</span>
												</div>
											</div>
											
											 <div class="input-group">
		                                        {!! Form::label('type_cuve_rectangulaire_largeur', trans('content.form.largeur')) !!} 
		                                         <div style="display:table;">
		                                         	{{ Form::text('type_cuve_rectangulaire_largeur', null, ['class' => 'form-control']) }}
													<span class="input-group-addon">mm</span>
												</div>
											</div>
											
											 <div class="input-group">
		                                        {!! Form::label('type_cuve_rectangulaire_hauteur', trans('content.form.hauteur')) !!} 
		                                         <div style="display:table;">
		                                         	{{ Form::text('type_cuve_rectangulaire_hauteur', null, ['class' => 'form-control']) }}
													<span class="input-group-addon">mm</span>
												</div>
											</div>
											
                                   		</div>
                                   		<div id="type_cuve_div_cylindrique" style="display:none;">
                                   			
                                   			<div class="input-group">
		                                        {!! Form::label('type_cuve_cylindrique_hauteur', trans('content.form.hauteur')) !!} 
		                                         <div style="display:table;">
		                                         	{{ Form::text('type_cuve_cylindrique_hauteur', null, ['class' => 'form-control']) }}
													<span class="input-group-addon">mm</span>
												</div>
											</div>
											
											<div class="input-group">
		                                        {!! Form::label('type_cuve_cylindrique_diametre', trans('content.form.diametre')) !!} 
		                                         <div style="display:table;">
		                                         	{{ Form::text('type_cuve_cylindrique_diametre', null, ['class' => 'form-control']) }}
													<span class="input-group-addon">mm</span>
												</div>
											</div>
                                   		
                                   		</div>
                                   </div>
                                   
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-3">
                                 <h4>{!! strip_tags(trans('content.calcul.1.2.2.h4')) !!}</h4>
                                  <div class="form-column">
	                                  
	                                  <div class="input-group">
	                                  		{!! Form::label('matiere', trans('content.calcul.1.2.2.1.label')) !!} 
	                                  		<br/>
	                                        {{ Form::radio('couvercle', 'oui') }}
	                                        {!! Form::label('couvercle', trans('content.calcul.1.2.2.1.radio.1'), array('class' => 'label_radio')) !!} 
	                                        {{ Form::radio('couvercle', 'non') }}
	                                        {!! Form::label('couvercle', trans('content.calcul.1.2.2.1.radio.2'), array('class' => 'label_radio')) !!}
	                                 </div>
	                                 
                               
                                    <div class="input-group">
                                        {!! Form::label('matiere', trans('content.calcul.1.2.2.2.label')) !!} 
                                        {{ Form::text('matiere', null, ['class' => 'form-control']) }}
									</div>
                               
                                    <div class="input-group">
                                    	{!! Form::label('epaisseur', trans('content.calcul.1.2.2.3.label')) !!} 
                                        <div style="display:table;">
	                                        {{ Form::text('epaisseur', null, ['class' => 'form-control']) }}
	                                        <span class="input-group-addon">mm</span>
                                        </div>
									</div>
                                
                                 	<div class="input-group">
                                        {!! Form::label('isolation', trans('content.calcul.1.2.2.4.label')) !!} 
                                         <div class="select-outer">
                                            <select id="isolation" name="isolation">
                                                <option>{{ trans('content.global.selectionner')}}...</option>
                                                @foreach (Config::get('ref_form_calcul.'.App::getLocale().'.isolation') as $value)
									            	<option value="{{ $value}}" {{ old('isolation')==$value? 'selected' : '' }}>{{ $value }}</option>
									        	@endforeach
                                            </select>
                                            <i class="icon-select select-button"></i>
                                        </div>
                                	</div>
                                	
                                	<div class="input-group">
                                   		<div id="isolation_div" style="display:none;">
                                   		
                                   			 <div class="input-group">
		                                        {!! Form::label('isolation_matiere', trans('content.form.matiere')) !!} 
		                                        {{ Form::text('isolation_matiere', null, ['class' => 'form-control']) }}
											</div>
											
											 <div class="input-group">
		                                        {!! Form::label('isolation_epaisseur', trans('content.form.epaisseur')) !!} 
		                                         <div style="display:table;">
		                                         	{{ Form::text('isolation_epaisseur', null, ['class' => 'form-control']) }}
													<span class="input-group-addon">mm</span>
												</div>
											</div>
											
                                   		</div>
                                   </div>
                                	
                               </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-3">
                                <h4>{!! strip_tags(trans('content.calcul.1.2.3.h4')) !!}</h4>
                                <div class="form-column">
                                  
									 <div class="input-group">
                                        {!! Form::label('type_cuve', trans('content.calcul.1.2.3.1.label')) !!} 
                                         <div class="select-outer">
                                            <select id="implantation" name="implantation">
                                                <option>{{ trans('content.global.selectionner')}}...</option>
                                                @foreach (Config::get('ref_form_calcul.'.App::getLocale().'.implantation') as $value)
									            	<option value="{{ $value}}" {{ old('implantation')==$value? 'selected' : '' }}>{{ $value }}</option>
									        	@endforeach
                                            </select>
                                            <i class="icon-select select-button"></i>
                                        </div>
                                    </div>
                                    
                                    <div class="input-group">
                                        {!! Form::label('type_cuve', trans('content.calcul.1.2.3.2.label')) !!} 
                                         <div class="select-outer">
                                            <select id="exposition" name="exposition">
                                                <option>{{ trans('content.global.selectionner')}}...</option>
                                                @foreach (Config::get('ref_form_calcul.'.App::getLocale().'.exposition') as $value)
									            	<option value="{{ $value}}" {{ old('exposition')==$value? 'selected' : '' }}>{{ $value }}</option>
									        	@endforeach
                                            </select>
                                            <i class="icon-select select-button"></i>
                                        </div>
                                    </div>
									
									
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-3">
                            	<h4>{!! strip_tags(trans('content.calcul.1.2.4.h4')) !!}</h4>
                                <div class="form-column">
                                   
                                    <div class="input-group">
                                        {!! Form::label('niveau_liquide_minimum', trans('content.calcul.1.2.4.1.label')) !!} 
                                        <div style="display:table">
	                                        {{ Form::text('niveau_liquide_minimum', null, ['class' => 'form-control']) }}
	                                        <span class="input-group-addon">mm</span>
	                                    </div>
									</div>
									
									<div class="input-group">
                                        {!! Form::label('niveau_liquide_maximum', trans('content.calcul.1.2.4.2.label')) !!} 
                                        <div style="display:table">
	                                        {{ Form::text('niveau_liquide_maximum', null, ['class' => 'form-control']) }}
	                                        <span class="input-group-addon">mm</span>
	                                    </div>
									</div>
                                   
                                </div>
                            </div>
                         </div>
						</fieldset>
                		
                		<fieldset>
				    	 <h3>{!! strip_tags(trans('content.calcul.1.3.h3')) !!}</h3>
				    	
                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-3">
                                <div class="form-column">
                                   
                                    <div class="input-group">
                                        {!! Form::label('temperature_ambiante_mini', trans('content.calcul.1.3.1.label')) !!} 
                                        <div style="display:table">
	                                        {{ Form::text('temperature_ambiante_mini', null, ['class' => 'form-control']) }}
	                                        <span class="input-group-addon">°C</span>
	                                    </div>
									</div>
                                   
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-3">
                                <div class="form-column">
                                   
                                    <div class="input-group">
                                        {!! Form::label('type_calcul', trans('content.calcul.1.3.2.label')) !!} 
                                         <div class="select-outer">
                                            <select id="type_calcul" name="type_calcul">
                                                <option>{{ trans('content.global.selectionner')}}...</option>
                                                @foreach (Config::get('ref_form_calcul.'.App::getLocale().'.type_calcul') as $value)
									            	<option value="{{ $value}}" {{ old('type_calcul')==$value? 'selected' : '' }}>{{ $value }}</option>
									        	@endforeach
                                            </select>
                                            <i class="icon-select select-button"></i>
                                        </div>
									</div>
									
									<div class="input-group">
                                   		<div id="type_calcul_div_montee" style="display:none;">
                                   		
                                   			 <div class="input-group">
		                                        {!! Form::label('type_calcul_montee_temperature_initiale', trans('content.calcul.form.temperatureliquideinitiale')) !!} 
		                                         <div style="display:table;">
		                                        	{{ Form::text('type_calcul_montee_temperature_initiale', null, ['class' => 'form-control']) }}
													<span class="input-group-addon">°C</span>
												</div>
											</div>
											
											 <div class="input-group">
		                                        {!! Form::label('type_calcul_montee_temperature_travail', trans('content.calcul.form.temperaturedetravail')) !!} 
		                                         <div style="display:table;">
		                                         	{{ Form::text('type_calcul_montee_temperature_travail', null, ['class' => 'form-control']) }}
													<span class="input-group-addon">°C</span>
												</div>
											</div>
											
											 <div class="input-group">
		                                        {!! Form::label('type_calcul_montee_temps_montee', trans('content.calcul.form.tempsdemonteedesire')) !!} 
		                                         <div style="display:table;">
		                                         	{{ Form::text('type_calcul_montee_temps_montee', null, ['class' => 'form-control']) }}
													<span class="input-group-addon">hrs</span>
												</div>
											</div>
											
                                   		</div>
                                   		<div id="type_calcul_div_maintien" style="display:none;">
                                   			
                                   			<div class="input-group">
		                                        {!! Form::label('type_calcul_maintien_temperature', trans('content.calcul.form.temperatureamaintenir')) !!} 
		                                         <div style="display:table;">
		                                         	{{ Form::text('type_calcul_maintien_temperature', null, ['class' => 'form-control']) }}
													<span class="input-group-addon">°C</span>
												</div>
											</div>
											
                                   		</div>
                                   </div>
                                   
                                </div>
                            </div>
                         </div>
						</fieldset>
						
	                    {{ Form::button(trans('content.form.bouton.valideretcontinuer'),array('rel' => '2', 'class' => 'btn btn-primary btn_to_tab')) }}  
	                    
                    
                 	</div>
				    <div role="tabpanel" class="tab-pane" id="tab_2">
				    
				    	<fieldset>
					    	 <h3>{!! strip_tags(trans('content.calcul.2.1.h3')) !!}</h3>
					    	
	                        <div class="row">
	                            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
	                                <div class="form-column equal-heigt">
	                                   
	                                    <div class="input-group">
	                                        {!! Form::label('tension_electrique', trans('content.calcul.2.1.1.label')) !!} 
	                                        <div style="display:table">
		                                        {{ Form::text('tension_electrique', null, ['class' => 'form-control']) }}
		                                        <span class="input-group-addon">V</span>
		                                    </div>
										</div>
	                                   
	                                     <div class="input-group">
	                                        {{ Form::radio('type_alimentation', trans('content.calcul.2.1.1.radio.1')) }}
	                                        {!! Form::label('type_alimentation', trans('content.calcul.2.1.1.radio.1'), array('class' => 'label_radio')) !!} 
	                                        {{ Form::radio('type_alimentation', trans('content.calcul.2.1.1.radio.2')) }}
	                                        {!! Form::label('type_alimentation', trans('content.calcul.2.1.1.radio.2'), array('class' => 'label_radio')) !!}
	                                         {{ Form::radio('type_alimentation', trans('content.calcul.2.1.1.radio.3')) }}
	                                        {!! Form::label('type_alimentation', trans('content.calcul.2.1.1.radio.3'), array('class' => 'label_radio')) !!}
	                                    </div>
	                                   
	                                </div>
	                            </div>
	                         </div>
						</fieldset>
						
						<fieldset>
					    	 <h3>{!! strip_tags(trans('content.calcul.2.2.h3')) !!}</h3>
					    	
	                        <div class="row">
	                            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
	                                <div class="form-column equal-heigt">
	                                   
	                                     <div class="input-group">
	                                        {{ Form::radio('disposition_chauffage', trans('content.calcul.2.2.1.radio.1')) }}
	                                        {!! Form::label('disposition_chauffage', trans('content.calcul.2.2.1.radio.1'), array('class' => 'label_radio')) !!} 
	                                        {{ Form::radio('disposition_chauffage', trans('content.calcul.2.2.1.radio.2')) }}
	                                        {!! Form::label('disposition_chauffage', trans('content.calcul.2.2.1.radio.2'), array('class' => 'label_radio')) !!}
	                                    </div>
	                                   
	                                </div>
	                            </div>
	                         </div>
						</fieldset>
                		
                		
                		<fieldset>
				    	 <h3>{!! strip_tags(trans('content.calcul.2.3.h3')) !!}</h3>
				    	
                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-3">
                                <h4>{!! strip_tags(trans('content.calcul.2.3.1.h4')) !!}</h4>
                                <div class="form-column">
                                										
									<div class="input-group">
                                        {{ Form::checkbox('regulation_temperature', 'oui') }}
                                        {!! Form::label('regulation_temperature', trans('content.calcul.2.3.1.1.chekbox.1'), array('class' => 'label_radio')) !!} 
                                         
									</div>
                                   
                                   <div class="input-group">
                                        {!! Form::label('points_consigne', trans('content.calcul.2.3.1.2.label')) !!} 
                                         <div class="select-outer">
                                            <select id="points_consigne" name="points_consigne">
                                                <option>{{ trans('content.global.selectionner')}}...</option>
                                                @foreach (Config::get('ref_form_calcul.'.App::getLocale().'.points_consigne') as $value)
									            	<option value="{{ $value}}" {{ old('points_consigne')==$value? 'selected' : '' }}>{{ $value }}</option>
									        	@endforeach
                                            </select>
                                            <i class="icon-select select-button"></i>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-3">
                                
                                <h4>&nbsp;</h4>
                                
                                  <div class="form-column">
	                                  
	                                  <div class="input-group">
                                        {{ Form::checkbox('regulation_niveau', 'oui') }}
                                        {!! Form::label('regulation_niveau', trans('content.calcul.2.3.2.1.chekbox.1'), array('class' => 'label_radio')) !!} 
                                      </div>
	                                 
	                                  <div class="input-group">
                                        {!! Form::label('points_commutation', trans('content.calcul.2.3.2.2.label')) !!} 
                                         <div class="select-outer">
                                            <select id="points_commutation" name="points_commutation">
                                                <option>{{ trans('content.global.selectionner')}}...</option>
                                                @foreach (Config::get('ref_form_calcul.'.App::getLocale().'.points_commutation') as $value)
									            	<option value="{{ $value}}" {{ old('points_commutation')==$value? 'selected' : '' }}>{{ $value }}</option>
									        	@endforeach
                                            </select>
                                            <i class="icon-select select-button"></i>
                                        </div>
                                    </div>
                               
                               </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <h4>{!! strip_tags(trans('content.calcul.2.3.3.h4')) !!}</h4>
                                <p style="color:#8D9DA6;">Conformément à EN60519-1/2, VGB*</p>
                                
                                <div class="form-column">
                                  
									<div class="input-group">
                                        {{ Form::checkbox('limitation_temperature', 'oui') }}
                                        {!! Form::label('limitation_temperature', trans('content.calcul.2.3.3.1.chekbox.1'), array('class' => 'label_radio')) !!} 
                                     </div>
                                      
                                   <div class="input-group">
                                        {{ Form::checkbox('surveillance_niveau', 'oui') }}
                                        {!! Form::label('surveillance_niveau', trans('content.calcul.2.3.3.2.chekbox.1'), array('class' => 'label_radio')) !!} 
                                      </div>   
                                     
                                     <p style="color:#8D9DA6;"> {{ trans('content.calcul.2.3.3.mentions') }}</p> 
									
                                </div>
                            </div>
                         </div>
						</fieldset>
				    		
				    	{{ Form::button(trans('content.form.bouton.valideretcontinuer'),array('rel' => '3', 'class' => 'btn btn-primary btn_to_tab')) }}	
				    		
				    </div>
				    <div role="tabpanel" class="tab-pane" id="tab_3">
				    	
				    	<fieldset>
					    	
	                        <div class="row">
	                            <div class="col-xs-12 col-sm-6">
	                            	<h4>{!! strip_tags(trans('content.calcul.3.1.1.h4')) !!}</h4>
	                                <div class="form-column">
	                                   
	                                    <div class="input-group">
	                                        {!! Form::label('materiau', trans('content.calcul.3.1.1.1.label')) !!} 
	                                        {{ Form::text('materiau', null, ['class' => 'form-control']) }}
		                                </div>
										
										<div class="input-group">
	                                        {!! Form::label('debit_matiere', trans('content.calcul.3.1.1.2.label')) !!} 
	                                        <div style="display:table">
		                                        {{ Form::text('debit_matiere', null, ['class' => 'form-control']) }}
		                                        <span class="input-group-addon">Kg/h</span>
		                                    </div>
										</div>
										
										<div class="input-group">
	                                        {!! Form::label('temperature_entree_prod_continu', trans('content.calcul.3.1.1.3.label')) !!} 
	                                        <div style="display:table">
		                                        {{ Form::text('temperature_entree_prod_continu', null, ['class' => 'form-control']) }}
		                                        <span class="input-group-addon">°C</span>
		                                    </div>
										</div>
	                                    
	                                   
	                                </div>
	                            </div>
	                            <div class="col-xs-12 col-sm-6">
	                            	<h4>{!! strip_tags(trans('content.calcul.3.1.2.h4')) !!}</h4>
	                                <div class="form-column">
	                                   
	                                    <div class="input-group">
	                                        {!! Form::label('debit_renouvellement', trans('content.calcul.3.1.2.1.label')) !!} 
	                                        {{ Form::text('debit_renouvellement', null, ['class' => 'form-control']) }}
		                                </div>
										
										<div class="input-group">
	                                        {!! Form::label('temperature_entree_renouvellement', trans('content.calcul.3.1.2.2.label')) !!} 
	                                        <div style="display:table">
		                                        {{ Form::text('temperature_entree_renouvellement', null, ['class' => 'form-control']) }}
		                                        <span class="input-group-addon">°C</span>
		                                    </div>
										</div>
										
	                                </div>
	                            </div>
	                         </div>
						</fieldset>
				    	
				    	
				    	{{ Form::button(trans('content.form.bouton.valideretcontinuer'),array('rel' => '4', 'class' => 'btn btn-primary btn_to_tab')) }}
				    
				    </div>
				    <div role="tabpanel" class="tab-pane" id="tab_4">
				    	
				    	<fieldset>
				    		
	                        <div class="row">
	                            <div class="col-xs-12 col-sm-4">
	                                 <h4>{!! strip_tags(trans('content.calcul.4.1.1.h4')) !!}</h4>
	                                <div class="form-column">
	                                    <div class="input-group">
	                                        {!! Form::label('id_civilite', trans('content.form.civilite'), array('class' => 'required')) !!} 
	                                         <div class="select-outer">
	                                            <select id="id_civilite" name="id_civilite">
	                                                <option>{{ trans('content.global.selectionner')}}...</option>
	                                                @foreach (Config::get('ref_list_civilites.'.App::getLocale()) as $key => $value)
										            	<option value="{{ $key }}" {{ old('id_civilite')==$key ? 'selected' : '' }}>{{ $value }}</option>
										        	@endforeach
	                                            </select>
	                                            <i class="icon-select select-button"></i>
	                                        </div>
	                                    </div>
	                                    <div class="input-group">
	                                        {!! Form::label('nom', trans('content.form.nom'), array('class' => 'required')) !!} 
	                                        {{ Form::text('nom', null, ['class' => 'form-control']) }}
										</div>
	                                    <div class="input-group">
	                                       {!! Form::label('prenom', trans('content.form.prenom'), array('class' => 'required')) !!} 
	                                       {{ Form::text('prenom', null, ['class' => 'form-control']) }}
	                                    </div>
	                                     
	                                    <div class="input-group">
	                                        {!! Form::label('fonction', trans('content.form.fonction'), array('class' => '')) !!} 
	                                        {{ Form::text('fonction', null, ['class' => 'form-control']) }}
	                                    </div>
	                                    <div class="input-group">
	                                        {!! Form::label('email', trans('content.form.email'), array('class' => 'required')) !!} 
	                                        {{ Form::email('email', null, ['class' => 'form-control']) }}
	                                    </div>
	                                    <div class="input-group">
	                                        {!! Form::label('telephone', trans('content.form.telephone'), array('class' => 'required')) !!} 
	                                        {{ Form::text('telephone', null, ['class' => 'form-control']) }}
	                                    </div>
	                                    <div class="input-group">
	                                        {!! Form::label('fax', trans('content.form.fax')) !!} 
	                                        {{ Form::text('fax', null, ['class' => 'form-control']) }}
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-xs-12 col-sm-4">
	                            	<h4>{!! strip_tags(trans('content.calcul.4.1.2.h4')) !!}</h4>
	                                <div class="form-column">
	                                   
	                                   <div class="input-group">
	                                         {!! Form::label('entreprise', trans('content.form.entreprise'), array('class' => 'required')) !!} 
	                                        {{ Form::text('entreprise', null, ['class' => 'form-control']) }}
	                                    </div>
	                                   
	                                    <div class="input-group">
	                                    	 {!! Form::label('adresse', trans('content.form.adresse'), array('class' => 'required')) !!} 
	                                        {{ Form::textarea('adresse', null, ['class' => 'form-control textarea-medium']) }}
	                                    </div>
	                                    <div class="input-group">
	                                   		 {!! Form::label('cp', trans('content.form.cp'), array('class' => 'required')) !!} <br/>
	                                        {{ Form::text('cp', null, ['class' => 'form-control input-small']) }}
	                                    </div>
	                                    <div class="input-group">
	                                     	{!! Form::label('ville', trans('content.form.ville'), array('class' => 'required')) !!} 
	                                        {{ Form::text('ville', null, ['class' => 'form-control']) }}
	                                    </div>
	                                    <div class="input-group">
	                                    	 {!! Form::label('id_pays', trans('content.form.pays'), array('class' => 'required')) !!} 
	                                        {{ Form::text('id_pays', null, ['class' => 'form-control']) }}
	                                    </div>
	                                    
	                                   
	                                </div>
	                            </div>
	                           <div class="col-xs-12 col-sm-4">
	                           		<h4>{!! strip_tags(trans('content.calcul.4.1.3.h4')) !!}</h4>
	                                <div class="form-column">  
	                            
	                            		
	                                     <div class="input-group">
	                                        {!! Form::label('message', trans('content.form.message'), array('class' => 'required')) !!} 
	                                        {{ Form::textarea('message', null, ['class' => 'textarea-big']) }}
	                                    </div>
	                                    
	                                    <div class="input-group">
		                                    {!! Form::label('message', trans('content.calcul.piecejointe'), array('class' => 'required')) !!} 
		                                    {{ Form::file('fichier') }}
	                            		</div>
	                            			
	                            	</div>
	                            </div>
	                            
	                         </div>
                        
                        </fieldset> 
                         
                        {{ Form::button(trans('content.form.bouton.envoyer'),array('type' => 'submit', 'class' => 'btn btn-primary')) }}  
                       
				    
				    </div>
				  </div>
				
				</div>   
                    
                {!! Form::close() !!}
                
                @endif	
                
            </div>
            
             <button class="btn btn-primary visible-xs" style="width:250px;margin:auto;" onClick="javascript:window.open('{{ asset('upload/galvatek_formulaire_calcul_puissance.pdf') }}');">
                	<i class="icon-download"></i>
                	<span><span>{{ trans('content.global.telecharger') }}</span>{!! trans('content.calcul.pdf') !!}</span>
                </button>
            
            <p class="additional-info">{!! trans('content.contact.mentions') !!}</p>
        </div>
    </section>
    
@endsection
   
@section('scripts')

	
	<script type="text/javascript">

		function changeTypeCuve(){

			switch($("#type_cuve").val()){

				default : 
					$("#type_cuve_div_rectangulaire").hide();
					$("#type_cuve_div_cylindrique").hide();
				break;
			
				case 'Rectangulaire' :
				case 'Rectangular' :
					$("#type_cuve_div_rectangulaire").show();
					$("#type_cuve_div_cylindrique").hide();
				break;
	
				case 'Cylindrique' :
				case 'Cylinder-Shaped' :
					$("#type_cuve_div_rectangulaire").hide();
					$("#type_cuve_div_cylindrique").show();
				break;
	
			}
		}

		function changeIsolation(){
			switch($("#isolation").val()){

				default : 
					$("#isolation_div").hide();
				break;
			
				case 'Oui' :
				case 'Yes' :
					$("#isolation_div").show();
				break;
	
			}
		}

		function changeTypeCalcul(){
			switch($("#type_calcul").val()){

				default : 
					$("#type_calcul_div_montee").hide();
					$("#type_calcul_div_maintien").hide();
				break;
			
				case 'Montée en température' :
				case 'Heat-up' :
					$("#type_calcul_div_montee").show();
					$("#type_calcul_div_maintien").hide();
				break;

				case 'Maintien en température' :
				case 'Temperature to maintain' :
					$("#type_calcul_div_montee").hide();
					$("#type_calcul_div_maintien").show();
				break;
	
			}
		}
		
		
		

		$( document ).ready(function() {

			$("label.required").append(" <span>*</span>");
			//$("#tab-content").tab("show");

			$('.btn_to_tab').click(function() {
				
				$(".tab_controller").removeClass("active");
				$("#tab_controller_" + $(this).attr("rel")).addClass("active");
				
				$(".tab-pane").removeClass("active");
				$("#tab_" + $(this).attr("rel")).addClass("active");

				$('html,body').animate({scrollTop: $("#contact-form").offset().top}, 'slow'      );
			});

			
			$("#type_cuve").change(function() {
				changeTypeCuve();
			});
			
			changeTypeCuve();

			$("#isolation").change(function() {
				changeIsolation();
			});
			
			changeIsolation();

			$("#type_calcul").change(function() {
				changeTypeCalcul();
			});
			
			changeTypeCalcul();
			  
		});


	</script>
	
	
@endsection
   
  
   