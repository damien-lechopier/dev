<div class="navigation-holder">
    <div class="dropdown">
        <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            {{ trans('content.menu.menu') }} <span class="icon-select"></span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="drop-main">
            <li>
                <a href="{{ route('type', ['id' => 1, 'name' => trans('routes.type_1')]) }}" class="button-submenu">{{ trans('content.menu.menu.produits') }}</a>
                <ul class="submenu">
                    <li><a href="{{ route('type', ['id' => 1, 'name' => trans('routes.type_1')]) }}">{!! Config::get('ref_types.'.App::getLocale().'.1') !!}</a></li>
                    <li><a href="{{ route('type', ['id' => 2, 'name' => trans('routes.type_2')]) }}">{!! Config::get('ref_types.'.App::getLocale().'.2') !!}</a></li>
                    <li><a href="{{ route('type', ['id' => 3, 'name' => trans('routes.type_3')]) }}">{!! Config::get('ref_types.'.App::getLocale().'.3') !!}</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('entreprise') }}" class="button-submenu">{{ trans('content.menu.menu.entreprise') }}</a>
                <?php /*
                <ul class="submenu">
                    <li><a href="#">Sous menu 1</a></li>
                    <li><a href="#">Sous menu 2</a></li>
                    <li><a href="#">Sous menu 3</a></li>
                </ul>
                */ ?>
            </li>
            <li><a href="{{ route('reseau') }}">{{ trans('content.menu.menu.reseau') }}</a></li>
            <li><a href="{{ route('calcul.index') }}">{{ trans('content.menu.menu.calcul') }}</a></li>
            <li><a href="{{ route('contact.index') }}" class="visible-xs">{{ trans('content.menu.contact') }}</a></li>
            @if (!Auth::check())
            <li><a href="#" onclick="openmodal();" class="visible-xs">{{ trans('content.menu.client') }}</a></li>
            @endif
        </ul>
    </div>
    <a href="{{ route('contact.index')}}" class="hidden-xs menu-link">{{ trans('content.menu.contact') }}</a>
    <div class="dropdown drop-language">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="text-transform:uppercase;">
        FR <span class="icon-select"></span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="drop-language">
        	@foreach (Config::get('laravellocalization.supportedLocales') as $lang => $language)
                <li><a href="{!! Config::get('app.url').'/'.$lang !!}/" data-value="{{ $lang }}" style="text-transform:uppercase;">{{ $lang }}</a></li>
        	@endforeach
        </ul>
    </div>
    
 	@if (!Auth::check())
    <a href="#" onclick="openmodal();" class="hidden-xs menu-link">{{ trans('content.menu.client') }}</a>
    @endif
</div>

