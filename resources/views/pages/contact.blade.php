@extends('layout.home')

@section('meta_title', trans('metas.contact.titre'))
@section('meta_desc', trans('metas.contact.desc'))
@section('meta_keywords', trans('metas.contact.keywords'))

@section('breadcrumb')
	<li class="active">{{ trans('content.menu.contact') }}</li>
@endsection

@section('content')

	@include('nav.header')


    <section id="main">
        <div class="container">
             @include('nav.breadcrumb')
            <div class="title-page title-underlined">
            	<?php 
            		if(isset($mode)){ 
            			switch($mode){ 
            			
	            			default :
	            			case "contact" :
	            				echo '<h1>'.trans('content.menu.contact').'</h1>';
	            				echo '<p class="sub-title">'.trans('content.contact.h1_under').'</p>';
	            			break;
	            			
	            			case "register" :
	            				echo '<h1>'.trans('content.register.h1').'</h1>';
	            				echo '<p class="sub-title">'.trans('content.register.h1_under').'</p>';
	           				break;
	                
                		} 
            		} 
            	?>
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
            	
            	<?php 
            		if(isset($mode)){ 
            			switch($mode){ 
            			
	            			default :
	            			case "contact" :
	            				echo Form::open(array('route' => 'contact.store', 'class' => 'contact-form'));
                			break;
                			
	            			case "register" :
	            				echo '<p>'.trans('auth_modal.info_old_client').'</p><br style="clear:both;" />';
	            				echo Form::open(array('route' => 'register.store', 'class' => 'contact-form'));
	            			break;
	            			
            			}
            		}
            		?>
                				
                				
                    <fieldset>
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-column equal-heigt">
                                    <h4>{{ trans('content.contact.contact') }}</h4>
                                    <div class="input-group">
                                        {!! Form::label('id_civilite', trans('content.form.civilite'), array('class' => 'required')) !!} 
                                         <div class="select-outer">
                                            <select id="id_civilite" name="id_civilite">
                                                <option value="">{{ trans('content.global.selectionner')}}...</option>
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
                                        {!! Form::label('fonction', trans('content.form.fonction'), array('class' => 'required')) !!} 
                                        {{ Form::text('fonction', null, ['class' => 'form-control']) }}
                                    </div>
                                    <div class="input-group">
                                        {!! Form::label('telephone', trans('content.form.telephone'), array('class' => 'required')) !!} 
                                        {{ Form::text('telephone', null, ['class' => 'form-control']) }}
                                    </div>
                                    <div class="input-group">
                                        {!! Form::label('email', trans('content.form.email'), array('class' => 'required')) !!} 
                                        {{ Form::email('email', null, ['class' => 'form-control']) }}
                                    </div>
                                     <?php if(isset($mode) && $mode=="register"){ ?>
                                    <div class="input-group">
                                        {!! Form::label('password', trans('content.form.password'), array('class' => 'required')) !!} 
                                        {{ Form::password('password', null, ['class' => 'form-control']) }}
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-column equal-heigt">
                                    <h4>{{ trans('content.contact.societe') }}</h4>
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
                            <?php 
                            if(isset($mode)){
                            	switch($mode){
                            		 
                            		default :
                            		case "contact" :
                            
                            ?>
			                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			                                <div class="form-column equal-heigt">
			                                    <h4>{{ trans('content.contact.votremessage') }}</h4>
			                                    <div class="input-group">
			                                        {!! Form::label('id_sujet', trans('content.form.votredemandeconcerne'), array('class' => 'required')) !!} 
			                                         <div class="select-outer">
			                                            <select id="id_sujet" name="id_sujet">
			                                                <option value="">{{ trans('content.global.selectionner')}}...</option>
			                                                @foreach (Config::get('ref_list_sujets.'.App::getLocale()) as $key => $value)
												                <option value="{{ $key }}" {{ old('id_sujet')==$key ? 'selected' : '' }}>{{ $value }}</option>
												        	@endforeach
			                                            </select>
			                                            <i class="icon-select select-button"></i>
			                                        </div>
			                                    </div>
			                                    <div class="input-group">
			                                        {!! Form::label('message', trans('content.form.message'), array('class' => 'required')) !!} 
			                                        {{ Form::textarea('message', null, ['class' => 'textarea-big']) }}
			                                    </div>
			                                    <div class="input-group">
			                                        {!! Form::label('id_provenance', trans('content.form.commentavezvousconnu'), array('class' => '')) !!} 
			                                         <div class="select-outer">
			                                            <select id="id_provenance" name="id_provenance">
			                                                <option value="">{{ trans('content.global.selectionner')}}...</option>
			                                                @foreach (Config::get('ref_list_provenances.'.App::getLocale()) as $key => $value)
												                <option value="{{ $key }}" {{ old('id_provenance')==$key ? 'selected' : '' }}>{{ $value }}</option>
												        	@endforeach
			                                            </select>
			                                            <i class="icon-select select-button"></i>
			                                        </div>
			                                    </div>
			                                </div>
			                            </div>
                            <?php 
                            		break;
                            		
									case "register" :
                            ?>
                            			
                            			<button type="submit" class="btn btn-primary fancybox fancybox.iframe" style="width:auto;font-size:16px;" href="{{ url('/password/reset') }}"><i class="glyphicon glyphicon-exclamation-sign" style="margin:0 10px 0 0;"></i> {{ trans('auth_modal.forgot_password') }}</button>
                            
                            <?php 		
									break;
                            		
                            	} 
                            	
                            }
                            ?>
                            
                            
                            
                        </div>
                        {{ Form::button(trans('content.form.bouton.envoyer'),array('type' => 'submit', 'class' => 'btn btn-primary')) }}  
                       
                    </fieldset>
                {!! Form::close() !!}
                
                @endif	
                
            </div>
            <p class="additional-info">{!! trans('content.contact.mentions') !!}</p>
        </div>
        <div id="map"></div>
        <div class="contact-info">
            <ul class="contact-list">
                <li><h4>Galvatek</h4></li>
                <li>
                    <span class="icon-pin"></span>
                    <span>9, rue de la Tour Mesnil-Renard 78270 Bonnières-sur-Seine, France</span>
                </li>
                <li>
                    <span class="icon-phone"></span>
                    <a href="tel:+330130930757">+33 (0)1 30 93 07 57</a>
                </li>
                <li>
                    <span class="icon-fax"></span>
                    <a href="tel:+330130932504">+33 (0)1 30 93 25 04</a>
                </li>
                <li>
                    <span class="icon-envelope"></span>
                    <a href="mailto:info@galvatek.fr">info@galvatek.fr</a>
                </li>

            </ul>
        </div>
    </section>
    
   @endsection
   
@section('scripts')

	
	{{ Html::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyCT7M_sPXSxQ-osyZv5UFRev8WrmSastME&callback=initMap') }}
	
	
	<script type="text/javascript">



		$( document ).ready(function() {

			$("label.required").append(" <span>*</span>");

			@if (isset($contact_id_sujet) && $contact_id_sujet!='')
				$("#id_sujet").val({{ $contact_id_sujet }});
			@endif

			
			  
		});


	</script>
	
	
@endsection
   
  
   