<style type="text/css">
    .carousel{
        position:relative;
        z-index:90;
    }

    .carousel .item{
        height:550px;
        transition-property: opacity;
        -webkit-transition: 2.0s ease-in-out opacity;
        -moz-transition: 2.0s ease-in-out opacity;
        -o-transition: 2.0s ease-in-out opacity;
        transition: 2.0s ease-in-out opacity;
    }

    .carousel .item img{
        max-width:100%;
    }

    .carousel .item,
    .carousel .active.left,
    .carousel .active.right {
        opacity: 0;
    }

    .carousel  .active,
    .carousel  .next.left,
    .carousel  .prev.right {
        opacity: 1;
    }

    .carousel  .next,
    .carousel  .prev,
    .carousel  .active.left,
    .carousel  .active.right {
        left: 0;
        transform: translate3d(0, 0, 0);
    }

    .carousel-caption{
        position:absolute;
        bottom:0;
        left:0;
        width:100%;
        padding:15px;
        text-align:left;
        background-color:rgba(0,0,0,0.5)
    }


</style>
<div id="carousel1" class="carousel slide carousel-fade" data-ride="carousel" rel="1">

<section class="carousel-inner" role="listbox">

    @foreach($slider->slides as $loop => $slide)

    <section class=" item {{ $loop == 0 ? 'active' : '' }}" style="background:url('{{ route('slides.pictures', ['id' => $slide->id, 'filename' => $slide->picture_url ? $slide->picture_url : $slide->picture]) }}') bottom center no-repeat;background-size:cover;">
        <div class="carousel-caption">
            {{ $slide->title }}
        </div>
    </section>
    @endforeach
    </section>

    <?php /*
					<!-- Controls -->
			        <a class="left carousel-control" href="#carousel2" data-slide="prev">
			          <span class="glyphicon glyphicon-chevron-left"></span>
			        </a>
			        <a class="right carousel-control" href="#carousel2" data-slide="next">
			          <span class="glyphicon glyphicon-chevron-right"></span>
			        </a>
			        */ ?>
    </div>