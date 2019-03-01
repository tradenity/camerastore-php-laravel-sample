@extends('layouts/default')
@section('content')


	<!-- content-section-starts -->
	<div class="container">
		<div class="products-page">

			<div class="products">
				<div class="product-listy">
					<h2>Browse By Brand</h2>
					<ul class="product-list">
                        @foreach($brands as $brand)
						<li><a href="/brands/{{ $brand->getId() }}">{{ $brand->getName() }}</a></li>
                        @endforeach
					</ul>
				</div>
			</div>

			@yield('products_content')
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
	<!-- content-section-ends -->
	<div class="other-products">
		<div class="container">
			<h3 class="like text-center">{{ $featured->getName() }}</h3>
			<ul id="flexiselDemo3">
                @foreach( $featured->getProducts() as $p)
				<li>
					<a href="/products/{{ $p->getId() }}">
						<img src="{{ $p->getMainPhoto()->getUrl() }}" style="width: 220px;" class="img-responsive"/>
					</a>
					<div class="product liked-product simpleCart_shelfItem">
						<a class="like_name" href="/products/{{ $p->getId() }}">{{ $p->getName() }}</a>
						<p><a class="item_add add_to_cart_button" href="#" data-product_id="{{ $p->getId() }}"><i></i> <span class=" item_price">$ {{ $p->getPrice() }}</span></a></p>
					</div>
				</li>
                @endforeach
			</ul>

            <script type="text/javascript" src="/js/jquery.flexisel.js"></script>
			<script type="text/javascript">
				$(window).load(function() {
					$("#flexiselDemo3").flexisel({
						visibleItems: 4,
						animationSpeed: 1000,
						autoPlay: true,
						autoPlaySpeed: 3000,
						pauseOnHover: true,
						enableResponsiveBreakpoints: true,
						responsiveBreakpoints: {
							portrait: {
								changePoint:480,
								visibleItems: 1
							},
							landscape: {
								changePoint:640,
								visibleItems: 2
							},
							tablet: {
								changePoint:768,
								visibleItems: 3
							}
						}
					});

				});
			</script>
            <script type="text/javascript" src="/js/cart.js"></script>
		</div>
	</div>
	<!-- content-section-ends-here -->
@stop

