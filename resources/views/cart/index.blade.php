@extends('layouts/default')
@section('content')
<!-- checkout -->
<div class="cart-items">
	<div class="container">
		<div class="dreamcrub">
			<ul class="breadcrumbs">
				<li class="home">
					<a href="/" title="Go to Home Page">Home</a>&nbsp;
					<span>&gt;</span>
				</li>
				<li class="women">
					Cart
				</li>
			</ul>
			<ul class="previous">
				<li><a href="/products">Continue Shopping</a></li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<h2>MY SHOPPING CART </h2>
		@if ( $cart->count <= 0)
		<h1>No Items in your cart yet</h1>
		@else
		<div class="cart-gd">


			<style>
				.cart-item-info span{
					float: inherit;
				}

			</style>

			<script>
				$(function(){
					var cart_total = $("#cart_total");
					var cart_items_count = $("#cart_items_count");

					$(".deleteItem").click(function(){
						var itemId = $(this).data("itemId");
						var url = "/cart/remove/"+itemId;
						$.ajax(url, {
							method: 'POST',
							success: function(result){
								console.log(result);
								cart_total.text(result.total);
								cart_items_count.text(result.count);
								$("#"+itemId).remove();
							}
						});
						return false;
					});
				});
			</script>
			@foreach($cart->items as $item)
			<div class="cart-header" id="{{$item->id}}" >

				<a href="#" class="close1 deleteItem" data-item-id="{{$item->id}}"> </a>
				<div class="cart-sec simpleCart_shelfItem">
					<div class="cart-item cyc">
						<img src="{{$item->product->mainPhoto->url}}" class="img-responsive" alt="" />
					</div>
					<div class="cart-item-info">
						<h3><a href="#"> {{$item->product->title}} </a></h3>
						<div class="delivery">
							<p><span>Unit Charges : $</span> <span>{{$item->unitPrice}}</span></p>
							<div class="clearfix"></div>
							<p><span>Quantity : </span> <span>{{$item->quantity}}</span></p>
							<div class="clearfix"></div>
							<p><span>Total price : $</span> <span>{{$item->total}}</span></p>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="clearfix"></div>

				</div>
			</div>
			@endforeach
			<div style="margin-top: 50px; text-align: right;">
				<a href="/orders/checkout" class="big_button">Checkout</a>
			</div>
		</div>
		@endif
	</div>
</div>

<!-- //checkout -->
@stop
