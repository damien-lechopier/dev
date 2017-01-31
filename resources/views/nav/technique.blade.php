<div class="block-technique equal-heigt">
    <div class="select-technique">
        <h2 class="title-underlined">{{ trans('content.technique.h2') }}</h2>
        <p>{{ trans('content.technique.desc') }} :</p>
        @if(is_collection_with_elements(Catalog::ranges()))
            <div class="select-outer">
                <select size="1" id="select_fiche">
                    <option>{{ trans('content.global.selectionner') }}...</option>
                    @foreach(Catalog::ranges() as $index => $fiche)
                        <option value="{{ route('fiche', ['id' => $fiche->id, 'name' => str_slug($fiche->title)])}}">{{$fiche->title}}</option>
                    @endforeach
                </select>
                <i class="icon-select select-button"></i>
            </div>
            <button type="submit"
                    class="btn btn-primary btn_access_by_fiche">{{ trans('content.global.voir') }}</button>
        @else
            <div class="col-xs-12">
                <p>Aucune fiche technique n'est disponible.</p>
            </div>
        @endif
    </div>
    <div class="button-holder">
        <button class="btn btn-inverse" id="technique_button_compatibilite"
                onClick="javascript:window.location.href = '{{ route('technique') }}';"><i
                    class="icon-chimie"></i><span>{{ trans('content.technique.compatibilite') }}</span></button>
        <button class="btn btn-inverse" id="technique_button_infos"
                onClick="javascript:window.location.href = '{{ route('technique') }}';"><i
                    class="icon-book"></i><span>{{ trans('content.technique.infos') }}</span></button>
        <button class="btn btn-inverse" id="technique_button_calcul"
                onClick="javascript:window.location.href='{{ route('calcul.index') }}';"><i
                    class="icon-picto_puissance"></i><span>{{ trans('content.technique.calcul') }}</span></button>
    </div>
</div>

@section('scripts')
    @parent
    <script type="text/javascript">
        $(document).ready(function () {
            $(".btn_access_by_fiche").click(function () {
                var url = $('select#select_fiche').val();
                if (url != '' && url != 'undefined') {
                    window.location.href = url;
                }
            });
        });
    </script>
@endsection