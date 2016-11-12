@extends('layouts/simple')
@section('content')
<!-- registration-form -->
<div class="registration-form">
	<div class="container">
		<div class="dreamcrub">
			<ul class="breadcrumbs">
				<li class="home">
					<a href="/" title="Go to Home Page">Home</a>&nbsp;
					<span>&gt;</span>
				</li>
				<li class="women">
					Registration
				</li>
			</ul>
			<ul class="previous">
				<li><a href="/products">Browse all products</a></li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<h2>Registration</h2>
		<div class="registration-grids">
			<div class="reg-form">
				<div class="reg">
					<p>Welcome, please enter the following details to continue.</p>
					<p>If you have previously registered with us, <a href="/login">click here to login</a></p>
					<form action="/register" method="post" >
						{{ csrf_field() }}
						<ul>
							<li class="text-info">First Name: </li>
							<li><input type="text" value="" name="firstName"/></li>
						</ul>
						<ul>
							<li class="text-info">Last Name: </li>
							<li><input type="text" value="" name="lastName"/></li>
						</ul>
						<ul>
							<li class="text-info">Email: </li>
							<li><input type="text" value="" name="email"/></li>
						</ul>
						<ul>
							<li class="text-info">Username: </li>
							<li><input type="text" value="" name="username"/></li>
						</ul>
						<ul>
							<li class="text-info">Password: </li>
							<li><input type="password" value="" name="password"/></li>
						</ul>
						<ul>
							<li class="text-info">Re-enter Password:</li>
							<li><input type="password" value="" name="confirmPassword"/></li>
						</ul>

						<input type="submit" value="REGISTER NOW"/>
						<p class="click">By clicking this button, you are agree to my  <a href="#">Policy Terms and Conditions.</a></p>
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
