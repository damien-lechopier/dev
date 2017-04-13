<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('meta_title')</title>
	<meta name="description" content="@yield('meta_desc')" />
	<meta name="keywords" content="@yield('meta_keywords')" />

	{!! SEO::generate() !!}

	<!-- Bootstrap -->
	{!! Html::style('assets/css/bootstrap.css') !!}
	
	<!-- Custom style -->
	{!! Html::style('assets/css/all.css') !!}
	
	<!-- Fancybox -->
	{!! Html::style('assets/css/fancybox.css') !!}
		
	@yield('css')
	

	<!-- Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<!-- Scripts -->
	{{ Html::script('assets/js/all.js') }}
		
	<!-- Fancybox -->
	{{ Html::script('assets/js/fancybox.js') }}
	
	<!-- Email ofuscator -->
	{{ Html::script('https://cdn.rawgit.com/Propaganistas/Email-Obfuscator/master/assets/EmailObfuscator.js') }}
	
	
	<!-- Scripts custom  -->
	{{ Html::script('assets/js/custom.js') }}
		
	<script type="text/javascript">

		var divLoader = '<p style="font-style:italic;text-align:center;"><img src="{{ asset('images/ajax-loader.gif') }}" alt="" style="position:relative;margin:20px;width:50px;50px;" /><br/>Recherche ...</p>';

		function openmodal(doc_id, doc_name) {
			//$('#requested_file_id').val(doc_id);
			//$('#requested_file_name').val(doc_name);
			$('#auth_modal').modal('show');
		}
		
		
		$(document).ready(function() {

			$('.fancybox').fancybox();

			$(".fancybox_video").click(function() {
				$.fancybox({
					'type' : 'iframe',
			        // hide the related video suggestions and autoplay the video
			        'href' : this.href.replace(new RegExp('watch\\?v=', 'i'), 'embed/') + '?rel=0&autoplay=1',
			        'overlayShow' : true,
			        'centerOnScroll' : true,
			        'speedIn' : 100,
			        'speedOut' : 50,
			        'width' : '100%',
			        'height' : '100%',
			        'maxWidth'	: 800,
					'maxHeight'	: 600,
				});
				return false;
			});
			
		 });

		
	</script>
	
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-11637033-1', 'auto');
	  ga('send', 'pageview');
	
	</script>
	
</head>
<body>
	@if($errors->any())
		<div class="alert alert-danger alert-dismissible alert-errors" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  	<strong>{!!$errors->first()!!}</strong>
		</div>
	@endif
	@if(Session::has('message'))
		<div class="alert alert-success alert-dismissible alert-messages" role="success">
			<button type="button" class="close" data-dismiss="success" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>{!!Session::get('message')!!}</strong>
		</div>
	@endif
	@if (isset($message) )
		<div class="alert alert-success alert-dismissible alert-messages" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>{!!$message!!}</strong>
		</div>
	@endif

	<section id="wrapper">
		@yield('content')
	</section>
	
</body>

	@yield('scripts')

</html>
