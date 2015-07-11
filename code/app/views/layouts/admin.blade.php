<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0"/>
	<title>@yield('title')</title>
	{{--<link rel="shortcut icon" href="http://www.umayor.cl/favicon.ico"/>--}}
	{{--<link rel="apple-touch-icon-precomposed" href="http://www.umayor.cl/favicon.ico">--}}

	{{ HTML::style('css/bootstrap.min.css') }}
	{{ HTML::style('css/frontend.min.css') }}
	{{ HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css') }}
	{{ HTML::style('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css') }}

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	{{ HTML::script('http://html5shim.googlecode.com/svn/trunk/html5.js') }}
	{{ HTML::script('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}
	<![endif]-->

	{{--EXTRAS--}}
	{{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js') }}
	{{ HTML::script('//css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js') }}

	@yield('style')
</head>
<body>
	<header class="container"></header>
	<main class="container">
		<section class="row">
			@yield('content')
		</section> @include('layouts.politicas_tmp')
	</main>
	<div class="clearfix"></div>
	<footer class="container">
		<span>Copyright {{ Carbon::now()->year }} Intelidata©</span>
	</footer>
	<a href="#" id="go-top" role="button" title="Click para ir al comienzo!" data-toggle="tooltip" data-placement="left"><i class="fa fa-chevron-circle-up fa-3x"></i></a> {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') }}
	{{ HTML::script('//code.jquery.com/jquery-1.11.0.min.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}
	{{ HTML::script('js/jquery.rut.min.js') }}
	{{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js') }}
	{{ HTML::script('js/admin.min.js') }}
	@yield('script')
</body>
</html>