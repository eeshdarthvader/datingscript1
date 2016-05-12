<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CZAR Control Panel</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

<link href="{{ URL::to('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::to('assets/admin/css/bootstrap-responsive.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ URL::to('assets/admin/css/font-awesome.css') }}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">

<link href="{{ URL::to('assets/admin/css/style.css')}}" rel="stylesheet" type="text/css">
<link href="{{ URL::to('assets/admin/css/pages/signin.css') }}" rel="stylesheet" type="text/css">

</head>

<body>

	<div class="navbar navbar-fixed-top">

	<div class="navbar-inner">

		<div class="container">

			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>

			<a class="brand" href="index.html">
				CZAR Control Panel
			</a>

			<div class="nav-collapse">
				<ul class="nav pull-right">

					<li class="">
						<a href="#" class="">

						</a>

					</li>

					<li class="">
						<a href="#" class="">
						</a>

					</li>
				</ul>

			</div><!--/.nav-collapse -->

		</div> <!-- /container -->

	</div> <!-- /navbar-inner -->

</div> <!-- /navbar -->



<div class="account-container">

	<div class="content clearfix">

		<form action="{{ URL::to('loginPost') }}" method="post" >

			<h1>CZAR Login</h1>

			<div class="login-fields">

				<p>Please provide your details</p>

				<div class="field">
					<label for="email">Email :</label>
					<input type="text" id="username" name="email" value="" placeholder="Email" class="login username-field" />
				</div> <!-- /field -->

				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field"/>
				</div> <!-- /password -->

			</div> <!-- /login-fields -->

			<div class="login-actions">

				<button class="button btn btn-success btn-large">Sign In</button>

			</div> <!-- .actions -->

		</form>

         @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
         @endif


	</div> <!-- /content -->

	 @if(Session::has('error'))
        <p class="alert alert-danger">{{Session::get('error')}}</p>
     @endif

</div> <!-- /account-container -->



<div class="login-extra">
	<a href="#">  </a>
</div> <!-- /login-extra -->


<script src="{{ URL::to('assets/admin/js/jquery-1.7.2.min.js') }}"></script>
<script src="{{ URL::to('assets/admin/js/bootstrap.js') }}"></script>

<script src="{{ URL::to('assets/admin/js/signin.js') }}"></script>

</body>

</html>

