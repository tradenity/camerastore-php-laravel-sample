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
			<h2>Complete Your Order </h2>
			<div class="registration-grids reg">

				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h3 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									ORDER SUMMERY
								</a>
							</h3>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<table class="table">
									<thead>
									<tr>
										<th>Product</th>
										<th>Quantity</th>
										<th>Unit Price</th>
										<th>Sub-Total</th>
										<th>Taxes</th>
									</tr>
									</thead>
									<tbody>
									@foreach($cart->getItems() as $i)
									<tr>
										<td>{{$i->getProduct()->getName() }}</td>
										<td>{{$i->getQuantity()}}</td>
										<td>{{$i->getUnitPrice() / 100.0}}</td>
										<td>{{$i->getSubtotal() / 100.0}}</td>
										<td>{{$i->getTaxAmount() / 100.0}}</td>
									</tr>
									@endforeach
									</tbody>
								</table>
								<hr>
								<button id="invoice-info-trigger-button">Continue</button>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingTwo">
							<h3 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#invoice-info-container" aria-expanded="false" aria-controls="invoice-info-container">
									INVOICE INFORMATION
								</a>
							</h3>
						</div>
						<div id="invoice-info-container" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
							<div class="panel-body">
								<div class="reg-form">
									<form id="customer-info-form" action="/orders/create" method="post">
										<div>
											<h3>Personal Information</h3>

											<ul>
												<li class="text-info">First Name: </li>
												<li><input type="text" name="customer_firstName" value="{{ $order->getCustomer()->getFirstName() }}" /></li>
											</ul>
											<ul>
												<li class="text-info">Last Name: </li>
												<li><input type="text" name="customer_lastName" value="{{ $order->getCustomer()->getLastName() }}"/></li>
											</ul>
											<ul>
												<li class="text-info">Email: </li>
												<li><input type="text" name="customer_email" value="{{ $order->getCustomer()->getEmail() }}"/></li>
											</ul>
											<ul>
												<li class="text-info">Phone number: </li>
												<li><input type="text" name="" value=""/></li>
											</ul>
											<h3>Billing Address</h3>
											<ul>
												<li class="text-info">Address Line 1: </li>
												<li><input type="text" name="billingAddress_streetLine1" value="{{ $order->getBillingAddress()->getStreetLine1() }}"/></li>
											</ul>
											<ul>
												<li class="text-info">Address Line 2:</li>
												<li><input type="text" name="billingAddress_streetLine2" value="{{ $order->getBillingAddress()->getStreetLine2() }}"/></li>
											</ul>
											<ul>
												<li class="text-info">City:</li>
												<li><input type="text" name="billingAddress_city" value="{{ $order->getBillingAddress()->getCity() }}"/></li>
											</ul>
											<ul>
												<li class="text-info">State:</li>
												<li>
													<select name="billingAddress_state">
														@foreach($states as $s)
														<option value="{{ $s->getId() }}" @if($order->getBillingAddress()->getState()->getId() === $s->getId() ) selected="selected" @endif>{{ $s->getName() }}</option>
														@endforeach
													</select>
												</li>
											</ul>
											<ul>
												<li class="text-info">Zip code:</li>
												<li><input type="text"  name="billingAddress_zipCode" value="{{ $order->getBillingAddress()->getZipCode() }}"/></li>
											</ul>
											<ul>
												<li class="text-info">Country:</li>
												<li>
													<select name="billingAddress_country">
														@foreach($countries as $c)
														<option value="{{ $c->getId() }}" @if($order->getBillingAddress()->getCountry()->getId() === $c->getId() ) selected="selected" @endif>{{ $c->getName() }}</option>
														@endforeach
													</select>
												</li>
											</ul>
											<h3>Shipping Address</h3>
											<ul>
												<li><input type="checkbox" value="" /></li>
												<li class="text-info">Same as Billing address: </li>
											</ul>
											<div id="shipping_address_container">
												<ul>
													<li class="text-info">Address Line 1: </li>
													<li><input type="text" name="shippingAddress_streetLine1" value="{{ $order->getShippingAddress()->getStreetLine1() }}"/></li>
												</ul>
												<ul>
													<li class="text-info">Address Line 2:</li>
													<li><input type="text" name="shippingAddress_streetLine2" value="{{ $order->getShippingAddress()->getStreetLine2() }}"/></li>
												</ul>
												<ul>
													<li class="text-info">City:</li>
													<li><input type="text" name="shippingAddress_city" value="{{ $order->getShippingAddress()->getCity() }}"/></li>
												</ul>
												<ul>
													<li class="text-info">State:</li>
													<li>
														<select name="shippingAddress_state">
															@foreach($states as $s)
															<option value="{{ $s->getId() }}" @if($order->getShippingAddress()->getState()->getId() === $s->getId() ) selected="selected" @endif>{{ $s->getName() }}</option>
															@endforeach
														</select>
													</li>
												</ul>
												<ul>
													<li class="text-info">Zip code:</li>
													<li><input type="text" name="shippingAddress_zipCode" value="{{ $order->getShippingAddress()->getZipCode() }}"/></li>
												</ul>
												<ul>
													<li class="text-info">Country:</li>
													<li>
														<select name="shippingAddress_country">
															@foreach($countries as $c)
															<option value="{{ $c->getId() }}" @if($order->getShippingAddress()->getCountry()->getId() === $c->getId() ) selected="selected" @endif >{{ $c->getName() }}</option>
															@endforeach
														</select>
													</li>
												</ul>
											</div>
											<input type="submit">

										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingThree">
							<h3 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#shipping-method-panel" aria-expanded="false" aria-controls="shipping-method-panel">
									SHIPPING METHOD
								</a>
							</h3>
						</div>
						<div id="shipping-method-panel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body">
								<div class="registration-grids reg">
									<div class="reg-form" id="shipping-form-container">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingFour">
							<h3 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#payment-panel" aria-expanded="false" aria-controls="payment-panel">
									PAYMENT DETAILS
								</a>
							</h3>
						</div>
						<div id="payment-panel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body">
								<div class="registration-grids reg">
									<div class="reg-form" id="payment-form-container">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>



				<div class="clearfix"></div>




			</div>
		</div>
	</div>
	<!-- //checkout -->


@stop
@section('page_js')

	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

	<script >

		function handle_submit_form(form_selector, success){
			$(document).on("submit", form_selector, function(e) {
				var form = $(this);
				var url = form.attr('action');
				$.ajax({
					type: "POST",
					url: url,
					data: form.serialize(), // serializes the form's elements.
					success: success,
					error: function (jqXHR, textStatus, errorMessage) {
						alert("Error submitting form.");
					}
				});
				e.preventDefault(); // avoid to execute the actual submit of the form.
			});
		}

		Stripe.setPublishableKey("{{$stripeKey}}");

		var PaymentFlow = function(form_selector){
			this.tokenAvailable = false;
			this.paymentForm = $(form_selector);
		};

		PaymentFlow.prototype.submitForm = function(token){
			this.paymentForm.find('input[name=payment_token]').val(token);
			this.paymentForm[0].submit();
		};
		PaymentFlow.prototype.showInvalidCardMessage= function(error){
			$('#card_error_message').show().text(error.message);
		};

		PaymentFlow.prototype.stripeResponseHandler = function(status, response) {
			if (status === 200) {
				this.paymentForm.find('input[type=submit]').prop('disabled', false);
				this.submitForm(response.id);
			} else {
				this.paymentForm.find('input[type=submit]').prop('disabled', false);
				this.showInvalidCardMessage(response.error);
			}
		};

		$(function(){
			$("#invoice-info-trigger-button").click(function(){
				$("#invoice-info-container").collapse('show');
			});
			handle_submit_form("#customer-info-form", function(data){
				$("#shipping-method-panel").collapse('show');
				$("#shipping-form-container").html(data);
			});
			handle_submit_form("#shipping-method-form", function(data){
				$("#payment-panel").collapse('show');
				$("#payment-form-container").html(data);
			});


			$(document).on("submit", "#payment-form",  function(e) {
				var paymentFlow = new PaymentFlow("#payment-form");

				if(!paymentFlow.tokenAvailable) {
					// Disable the submit button to prevent repeated clicks
					paymentFlow.paymentForm.find('input[type=submit]').prop('disabled', true);

					Stripe.card.createToken(paymentFlow.paymentForm, function(status, response){
						paymentFlow.stripeResponseHandler(status, response);
					});
					// Prevent the form from submitting with the default action
					e.preventDefault();
				}
			});
		});
	</script>

@stop