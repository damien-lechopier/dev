<style type="text/css">
    .carousel {
        position:relative;
        z-index:90;
        background-color:#000;
    }
    .carousel .item {
        height:900px;
        transition-property: opacity;
        -webkit-transition: 1.0s ease-in-out opacity;
        -moz-transition: 1.0s ease-in-out opacity;
        -o-transition: 1.0s ease-in-out opacity;
        transition: 1.0s ease-in-out opacity;

    }
    .carousel .item,
    .carousel .active.left,
    .carousel .active.right {
        opacity: 0;
    }
    .carousel .active,
    .carousel .next.left,
    .carousel .prev.right {
        opacity: 1;
    }
    .carousel .next,
    .carousel .prev,
    .carousel .active.left,
    .carousel .active.right {
        left: 0;
        transform: translate3d(0, 0, 0);
    }
    @media screen and (max-width: 1200px){
        .carousel .item{
            height:450px;
        }
    }
</style>


<div id="carousel-{{ $slider->name }}" class="carousel slide carousel-fade" data-ride="carousel" rel="1">
    <p class="legend">{!! trans('content.global.header.legend')  !!}</p>
    <section class="carousel-inner" role="listbox">
        @foreach($slider->slides as $loop => $slide)
            <section class="item {{ $loop == 0 ? 'active' : '' }}" style="background:url('{{ route('slides.pictures', ['id' => $slide->id, 'filename' => $slide->picture_url ? $slide->picture_url : $slide->picture]) }}') top center no-repeat;background-size:100% auto;">
                <section class="col-xs-12">
                    <section class="col-sm-5 col-md-3 col-md-offset-2 col-lg-3 col-lg-offset-2 band" style="background-color:rgba(46,79,96,0.7);">
                        <p class="titre">{{ $slide->title }}</p>
                        <p class="desc">{{ $slide->description }}</p>
                        <a href="{{route('references')}}" class="special_link" style="text-transform:uppercase;">
                            {!! trans('content.global.lesreferences')  !!}
                            <img src="{{ asset('images/pictos/white_arrow_transparent_bck.png') }}" alt="" style="background-color:#23521E;" />
                        </a>
                        <a href="{{route('gammes')}}" class="special_link" style="text-transform:uppercase;">
                            {!! trans('content.global.lagamme')  !!}
                            <img src="{{ asset('images/pictos/white_arrow_transparent_bck.png') }}" alt="" style="background-color:#23521E;" />
                        </a>
                    </section>
                </section>
            </section>
        @endforeach
    </section>
    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-{{ $slider->name }}" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-{{ $slider->name }}" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>