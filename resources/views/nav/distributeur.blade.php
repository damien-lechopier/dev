<div class="block-calcul equal-heigt" style="background: url('{{ asset('images/fonds/bg-block-distributeur.jpg') }}') center no-repeat; background-size: cover;">
	<div class="select-technique">
         <div class="title-underlined">
         	<h2>{{ trans('content.distributeur.h2') }}</h2>
            <p class="sub-title">{{ trans('content.distributeur.h2_under') }}</p>
         </div>
         <p>{!! trans('content.distributeur.desc') !!}</p>
   </div>
   <div class="button-holder">
   		<button class="btn btn-inverse" onClick="javascript:window.location.href='{{ route('contact_by_subject',['id_sujet'=>4]) }}';">
            {{ trans('content.menu.contact') }}
        </button>
   </div>
</div>