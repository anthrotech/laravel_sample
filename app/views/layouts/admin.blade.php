<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title></title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
      @section('css')
      @show
      <!--[if gte IE 9]>
		<style type="text/css">
			.btn, .alert { filter: none; }
		</style>
	<![endif]-->
</head>
<body>
	<!--[if lt IE 7]>
	    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/?locale=en">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

    @include('elements.header')

	<div class="page-content">
		<div class="container">

			<div class="logo text-center">
				<a href="{{ URL::to('/') }}"><img src="{{ asset('img/logo.png') }}" alt="BestBant - Be the News"></a>
			</div>

			@include('elements.alerts')

			@yield('content')

		</div>
	</div>

    @include('elements.footer')
	@include('elements.scripts')
</body>
</html>
