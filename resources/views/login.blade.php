
@extends('layouts/simple')
@section('content')
	<!-- registration-form -->
	<div class="registration-form">
		<div class="container">
			<div class="dreamcrub">
				<ul class="breadcrumbs">
					<li class="home">
						<a href="index.html" title="Go to Home Page">Home</a>&nbsp;
						<span>&gt;</span>
					</li>
					<li class="women">
						Login
					</li>
				</ul>
				<ul class="previous">
					<li><a href="/products">Browse all products</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
			@if (isset($loginError))
			<div>
				<div class="app-msg alert alert-danger alert-dismissable">
					<h4><i class="icon fa fa-ban"></i> {{loginError}}</h4>
				</div>
			</div>
			@endif
			<h2>Login</h2>
			<div class="registration-grids">
				<div class="reg-form">
					<div class="reg">
						<p>Welcome, please enter your credentials to continue.</p>
						<p>If you do not have previously registered with us, <a href="/register">click here to create an account.</a></p>
						<form action="/login" method="post">
							{{ csrf_field() }}
							<ul>
								<li class="text-info">Username: </li>
								<li><input type="text" name="username" value=""/></li>
							</ul>
							<ul>
								<li class="text-info">Password: </li>
								<li><input type="password" name="password" value=""/></li>
							</ul>

							<input type="submit" value="LOGIN"/>

						</form>
					</div>
				</div>
				<div class="reg-right">

				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
@stop
