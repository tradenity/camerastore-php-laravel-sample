@extends("layouts/simple")
@section('content')
<!-- checkout -->
<div class="cart-items">
	<div class="container">
		<div class="dreamcrub">
			<ul class="breadcrumbs">
				<li class="home">
					<a href="index.html" title="Go to Home Page">Home</a>&nbsp;
					<span>&gt;</span>
				</li>
				<li>
					Checkout
				</li>
			</ul>
			<ul class="previous">
				<li><a href="/cart">Back to shopping cart</a></li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<h2>ORDER INFORMATION </h2>
		<div class="registration-grids reg">
			<form id="payment-form" action="/orders/create" method="post">
				<input type="hidden" name="token" value="" />
				{{ csrf_field() }}
				<div class="reg-form">
					<div>
						<h3>Personal Information</h3>

						<ul>
							<li class="text-info">First Name: </li>
							<li><input type="text" name="customer_firstName" value="{{ $order->customer->firstName }}" /></li>
						</ul>
						<ul>
							<li class="text-info">Last Name: </li>
							<li><input type="text" name="customer_lastName" value="{{ $order->customer->lastName }}"/></li>
						</ul>
						<ul>
							<li class="text-info">Email: </li>
							<li><input type="text" name="customer_email" value="{{ $order->customer->email }}"/></li>
						</ul>
						<ul>
							<li class="text-info">Phone number: </li>
							<li><input type="text" name="" value=""/></li>
						</ul>
						<h3>Billing Address</h3>
						<ul>
							<li class="text-info">Address Line 1: </li>
							<li><input type="text" name="billingAddress_streetLine1" value="{{ $order->billingAddress->streetLine1 }}"/></li>
						</ul>
						<ul>
							<li class="text-info">Address Line 2:</li>
							<li><input type="text" name="billingAddress_streetLine2" value="{{ $order->billingAddress->streetLine2 }}"/></li>
						</ul>
						<ul>
							<li class="text-info">City:</li>
							<li><input type="text" name="billingAddress_city" value="{{ $order->billingAddress->city }}"/></li>
						</ul>
						<ul>
							<li class="text-info">State:</li>
							<li><input type="text" name="billingAddress_state" value="{{ $order->billingAddress->state }}"/></li>
						</ul>
						<ul>
							<li class="text-info">Zip code:</li>
							<li><input type="text"  name="billingAddress_zipCode" value="{{ $order->billingAddress->zipCode }}"/></li>
						</ul>
						<ul>
							<li class="text-info">Country:</li>
							<li><input type="text" name="billingAddress_country" value="{{ $order->billingAddress->country }}"/></li>
						</ul>
						<h3>Shipping Address</h3>
						<ul>
							<li><input type="checkbox" value="" /></li>
							<li class="text-info">Same as Billing address: </li>
						</ul>
						<div id="shipping_address_container">
							<ul>
								<li class="text-info">Address Line 1: </li>
								<li><input type="text" name="shippingAddress_streetLine1" value="{{ $order->shippingAddress->streetLine1 }}"/></li>
							</ul>
							<ul>
								<li class="text-info">Address Line 2:</li>
								<li><input type="text" name="shippingAddress_streetLine2" value="{{ $order->shippingAddress->streetLine2 }}"/></li>
							</ul>
							<ul>
								<li class="text-info">City:</li>
								<li><input type="text" name="shippingAddress_city" value="{{ $order->shippingAddress->city }}"/></li>
							</ul>
							<ul>
								<li class="text-info">State:</li>
								<li><input type="text" name="shippingAddress_state" value="{{ $order->shippingAddress->state }}"/></li>
							</ul>
							<ul>
								<li class="text-info">Zip code:</li>
								<li><input type="text" name="shippingAddress_zipCode" value="{{ $order->shippingAddress->zipCode }}"/></li>
							</ul>
							<ul>
								<li class="text-info">Country:</li>
								<li><input type="text" name="shippingAddress_country" value="{{ $order->shippingAddress->country }}"/></li>
							</ul>
						</div>

					</div>
				</div>
				<div class="reg-right">
					<h3>Credit Card Information</h3>
					<ul>
						<li class="text-info">Card Holder Name: </li>
						<li><input id="card_holder_name" type="text" value="" /></li>
					</ul>
					<ul>
						<li class="text-info">Card Number: </li>
						<li><input id="card_number" type="text" value="4242424242424242" data-stripe="number"/></li>
					</ul>
					<ul>
						<li class="text-info">CVC: </li>
						<li><input id="cvc" type="text" value="123" data-stripe="cvc"/></li>
					</ul>
					<ul>
						<li class="text-info">Expiration Date: </li>
						<li>
							Month: <input type="text" value="12" style="width: 100px;" data-stripe="exp-month"/>
							Year: <input type="text" value="2017" style="width: 100px;" data-stripe="exp-year"/>
						</li>
					</ul>
					<p style="display: none;" id="card_error_message"></p>
					<input type="submit" value="PLACE ORDER" />
					<p class="click">By clicking this button, you are agree to my  <a href="#">Policy Terms and Conditions.</a></p>
				</div>
				<div class="clearfix"></div>
			</form>
		</div>
	</div>
</div>

<!-- //checkout -->


@stop
@section('page_js')

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script>
	Stripe.setPublishableKey('{{ $stripeKey }}');
	var purchase = {
		tokenAvailable:false,
		paymentForm:$("#payment-form"),
		submitForm:function(token){
			purchase.paymentForm.find('input[name=token]').val(token);
			purchase.paymentForm[0].submit()
		},
		showInvalidCardMessage:function(error){
			$('#card_error_message').show().text(error.message);
		},
		stripeResponseHandler:function(status, response){
			console.log(response);
			if(status == 200){
				purchase.paymentForm.find('input[type=submit]').prop('disabled', false);
				purchase.submitForm(response.id);
			}else{
				purchase.paymentForm.find('input[type=submit]').prop('disabled', false);
				purchase.showInvalidCardMessage(response.error);
			}
		}
	};
	$(function(){
		$(purchase.paymentForm).submit(function(event) {
			if(!purchase.tokenAvailable) {
				// Disable the submit button to prevent repeated clicks
				purchase.paymentForm.find('input[type=submit]').prop('disabled', true);

				Stripe.card.createToken(purchase.paymentForm, purchase.stripeResponseHandler);

				// Prevent the form from submitting with the default action
				return false;
			}
		});

	});
</script>
@stop