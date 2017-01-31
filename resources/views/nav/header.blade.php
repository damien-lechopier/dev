    <header id="header">
        <div class="header-inner">
            <div class="container">
                @include('nav.nav')
                <a href="/" id="logo">
                    <img src="{{ asset('images/pictos/logo_galvatek.png') }}" alt="Galvatek">
                </a>
                <div class="tagline">
                    <h3>{{ trans('content.home.h1') }}</h3>
                    <p>{!! trans('content.home.h1_under') !!}</p>
                </div>
                <button class="btn btn-transparent hidden-xs" onClick="javascript:window.location.href = '{{ route('calcul.index') }}';">
                    <i class="icon-picto_puissance"></i>{{ trans('content.menu.menu.calcul') }}
                </button>
            </div>
        </div>
    </header>