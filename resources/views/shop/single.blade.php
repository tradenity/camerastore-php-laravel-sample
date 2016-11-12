@extends('layouts/products')
@section('products_content')

<div class="new-product">
	<div class="col-md-5 zoom-grid">
		<div class="flexslider">
			<ul class="slides">
				@foreach( $product->photos as $ph)
				<li data-thumb="{{ $ph->url}}">
					<div class="thumb-image"> <img src="{{ $ph->url }}" data-imagezoom="true" class="img-responsive" alt="" /> </div>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
	<div class="col-md-7 dress-info">
		<div class="dress-name">
			<h3>{{ $product->title }}</h3>
			<span>$ {{ $product->price }}</span>
			<div class="clearfix"></div>
			<p>{{ $product->description }}</p>

		</div>

		<div class="purchase">
			<a class="cbp-vm-icon cbp-vm-add item_add add_to_cart_button" href="#" data-product_id="{{ $product->id}}">Add To Cart</a>

			<div class="clearfix"></div>
		</div>
		<script src="/js/imagezoom.js"></script>
		<!-- FlexSlider -->
		<script defer="defer" src="/js/jquery.flexslider.js"></script>
		<script>
			// Can also be used with $(document).ready()
			$(window).load(function() {
				$('.flexslider').flexslider({
					animation: "slide",
					controlNav: "thumbnails"
				});
			});
		</script>
	</div>
	<div class="clearfix"></div>
	<div class="reviews-tabs">
		<!-- Main component for a primary marketing message or call to action -->
		<ul class="nav nav-tabs responsive hidden-xs hidden-sm" id="myTab">
			<li class="test-class active"><a class="deco-none misc-class" href="#how-to"> Product Description</a></li>
			<li class="test-class"><a href="#features">Specifications</a></li>
			<li class="test-class"><a class="deco-none" href="#source">Customer's comments</a></li>
		</ul>

		<div class="tab-content responsive hidden-xs hidden-sm">
			<div class="tab-pane active" id="how-to">
				<p class="tab-text">Maecenas mauris velit, consequat sit amet feugiat rit, elit vitaeert scelerisque elementum, turpis nisl accumsan ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. and scrambled it to make a type specimen book. It has survived Auction your website on Flippa and you'll get the best price from serious buyers, dedicated support and a much better deal than you'll find with any website broker. Sell your site today I need a twitter bootstrap 3.0 theme for the full-calendar plugin. it would be great if the theme includes the add event; remove event, show event details. this must be RESPONSIVE and works on mobile devices. Also, I've seen so many bootstrap themes that comes up with the fullcalendar plugin. However these . </p>
			</div>
			<div class="tab-pane" id="features">
				<p class="tab-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis.This tab has icon in consectetur adipiscing eliconse consectetur adipiscing elit. Vestibulum nibh urna, ctetur adipiscing elit. Vestibulum nibh urna, t.consectetur adipiscing elit. Vestibulum nibh urna,  Vestibulum nibh urna,it.</p>
				<p class="tab-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
					sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
			<div class="tab-pane" id="source">
				<p class="tab-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis.This tab has icon in consectetur adipiscing eliconse consectetur adipiscing elit. Vestibulum nibh urna, ctetur adipiscing elit. Vestibulum nibh urna, t.consectetur adipiscing elit. Vestibulum nibh urna,  Vestibulum nibh urna,it.</p>
				<p class="tab-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
					sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
		</div>
	</div>

</div>



<script src="/static/js/responsive-tabs.js"></script>
<script type="text/javascript">
	$( '#myTab a' ).click( function ( e ) {
		e.preventDefault();
		$( this ).tab( 'show' );
	} );

	$( '#moreTabs a' ).click( function ( e ) {
		e.preventDefault();
		$( this ).tab( 'show' );
	} );

	( function( $ ) {
		// Test for making sure event are maintained
		$( '.js-alert-test' ).click( function () {
			alert( 'Button Clicked: Event was maintained' );
		} );
		fakewaffle.responsiveTabs( [ 'xs', 'sm' ] );
	} )( jQuery );

</script>

@stop
