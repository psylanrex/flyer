<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Project Flyer</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link rel="stylesheet" type="text/css" href="/css/libs.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.css">

</head>
<body>
	<div class="container">


		<nav class="navbar navbar-inverse navbar-fixed-top">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Project Flyer</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li class="active"><a href="/">Home <span class="sr-only">(current)</span></a></li>
		        <li><a href="#">About</a></li>
		        <li><a href="#">Contact</a></li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li id="username-show">
                            {{ Auth::user()->name }}
                        </li>
                        <li>
                            <a href="{{ url('/logout') }}">
                                <i class="fa fa-btn fa-sign-out"></i>Logout
                            </a>
                        </li>
                    @endif
                </ul>
		      

		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		@yield('content')
	</div>

	<script src="/js/libs.js"></script>

	@yield('script.footer')
	
	@include('flash')


	
</body>
</html>