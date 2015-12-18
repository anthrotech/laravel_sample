<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Best Bant {{ isset($title) ? ": ".$title : ''}}</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('js/datepicker/css/datepicker.css') }}">
	<script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
	@section('css')
	@show
	<!--[if gte IE 9]>
	<style type="text/css">
		.btn, .alert { filter: none; }
	</style>
	<![endif]-->
	
<script type="text/javascript">
$(document).ready(function () {
	$('#dp1').datepicker({
		format: 'yyyy-mm-dd'
	});
    //  Focus auto-focus fields
    $('.auto-focus:first').focus();

    //  Initialize auto-hint fields
    $('INPUT.auto-hint, TEXTAREA.auto-hint').focus(function(){
        if($(this).val() == $(this).attr('title')){
            $(this).val('');
            $(this).removeClass('auto-hint');
        }
    });

    $('INPUT.auto-hint, TEXTAREA.auto-hint').blur(function(){
        if($(this).val() == '' && $(this).attr('title') != ''){
            $(this).val($(this).attr('title'));
            $(this).addClass('auto-hint');
        }
    });

    $('INPUT.auto-hint, TEXTAREA.auto-hint').each(function(){
        if($(this).attr('title') == ''){ return; }
        if($(this).val() == ''){ $(this).val($(this).attr('title')); }
        else { $(this).removeClass('auto-hint'); }
    });	
});
</script>	
	
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
