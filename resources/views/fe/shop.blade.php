@extends('fe.layout')
@section('contents')
	<!--main area-->
	<main id="main" class="main-site left-sidebar">
	@if(Session::has('messagereviewsucess'))
    <script>
      Swal.fire(
  'Thank you review ,Continue Shopping!!',
  'You clicked the button to continue!',
  'success'
    )
    </script>
   @endif
   @if(Session::has('messagereviewfalse'))
   <script>
     Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Invalid character wrong! Please Review again',
  
})
    </script>
   @endif
		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{Route('home')}}" class="link">Home</a></li>
					<li class="item-link"><span>Category Products</span></li>
				</ul>
			</div>
			<div class="row">

				<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

					<div class="banner-shop">
						<a href="#" class="banner-link">
							<figure><img src="images/panner-shop.webp" alt=""></figure>
						</a>
					</div>

					<div class="wrap-shop-control">

						<h1 class="shop-title">Product List</h1>

						<div class="wrap-right">

							<div class="sort-item orderby ">
								<form action="">
									@csrf
									<select name="sort1" id="sort1" class="use-chosen" >
										<option value="{{ Request::fullUrl() }}?sort_by=none" selected="selected">Default sorting</option>
										<option value="{{ Request::fullUrl() }}?sort_by=price-asc">Sort By Price: ASC</option>
										<option value="{{ Request::fullUrl() }}?sort_by=price-desc">Sort By Price: DESC</option>
										<option value="{{ Request::fullUrl() }}?sort_by=name-asc">Sort by Name: A to Z</option>
										<option value="{{ Request::fullUrl() }}?sort_by=name-desc">Sort by Name: Z to A</option>
									</select>
								</form>
								
							</div>

							<div class="sort-item product-per-page">
								<select name="post-per-page" class="use-chosen" >
									<option value="12" selected="selected">12 per page</option>
									<option value="16">16 per page</option>
									<option value="18">18 per page</option>
									<option value="21">21 per page</option>
									<option value="24">24 per page</option>
									<option value="30">30 per page</option>
									<option value="32">32 per page</option>
								</select>
							</div>

							<div class="change-display-mode">
								<a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
								<a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
							</div>

						</div>

					</div><!--end wrap shop control-->
					
					<div class="search-result">
						@yield('products')
					</div>

					<div class="wrap-pagination-info">
						<ul class="page-numbers">
							<li><span class="page-number-item current" >1</span></li>
							<li><a class="page-number-item" href="#" >2</a></li>
							<li><a class="page-number-item" href="#" >3</a></li>
							<li><a class="page-number-item next-link" href="#" >Next</a></li>
						</ul>
						<p class="result-count">Showing 1-8 of 12 result</p>
					</div>
				</div><!--end main products area-->

				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
					<div class="widget mercado-widget categories-widget">
						<h2 class="widget-title"><a href="{{ Route('shop') }}" class="cate-link">All Categories</a></h2>
						<div class="widget-content">
							<ul class="list-category">
								@foreach ($categories as $item)
								<li class="category-item has-child-cate">
									<a href="{{ Route('shop.category', $item->id) }}" class="cate-link">{{ $item->categorie_name }}</a>
									{{-- <span class="toggle-control">+</span>
									<ul class="sub-cate">
										<li class="category-item"><a href="#" class="cate-link">Batteries (22)</a></li>
										<li class="category-item"><a href="#" class="cate-link">Headsets (16)</a></li>
										<li class="category-item"><a href="#" class="cate-link">Screen (28)</a></li>
									</ul> --}}
								@endforeach
							</ul>
						</div>
					</div><!-- Categories widget-->

					<div class="widget mercado-widget filter-widget brand-widget">
						<h2 class="widget-title">Brand</h2>
						<div class="widget-content">
							<ul class="list-style vertical-list list-limited" data-show="6">
								@foreach ($brands as $item)
								<li class="list-item"><a class="filter-link active" href="#">{{$item->brand_name}}</a></li>
								@endforeach
								{{-- <li class="list-item default-hiden"><a class="filter-link " href="#">Shop Smartphone & Tablets</a></li> --}}
								<li class="list-item"><a data-label='Show less<i class="fa fa-angle-up" aria-hidden="true"></i>' class="btn-control control-show-more" href="#">Show more<i class="fa fa-angle-down" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div><!-- brand widget-->

					<div class="widget mercado-widget filter-widget price-filter">
						<h2 class="widget-title">Price</h2>
						<div class="widget-content">

							<form method="GET" action="{{ Route('search.products')}}">
								<div id="slider-range1"></div>
								<p>
									<label for="amount">Price:</label>
									<input type="text" id="amount" readonly>
									<input type="hidden" name="start_price" id="start_price">
									<input type="hidden" name="end_price" id="end_price">
									<button type="submit" class="filter-submit">Filter</button>
								</p>
						</div>
					</div><!-- Price-->

					{{-- <div class="widget mercado-widget filter-widget">
						<h2 class="widget-title">Color</h2>
						<div class="widget-content">
							<ul class="list-style vertical-list has-count-index">
								<li class="list-item"><a class="filter-link " href="#">Red <span>(217)</span></a></li>
								<li class="list-item"><a class="filter-link " href="#">Yellow <span>(179)</span></a></li>
								<li class="list-item"><a class="filter-link " href="#">Black <span>(79)</span></a></li>
								<li class="list-item"><a class="filter-link " href="#">Blue <span>(283)</span></a></li>
								<li class="list-item"><a class="filter-link " href="#">Grey <span>(116)</span></a></li>
								<li class="list-item"><a class="filter-link " href="#">Pink <span>(29)</span></a></li>
							</ul>
						</div>
					</div><!-- Color --> --}}

					{{-- <div class="widget mercado-widget filter-widget">
						<h2 class="widget-title">Size</h2>
						<div class="widget-content">
							<ul class="list-style inline-round ">
								<li class="list-item"><a class="filter-link active" href="#">s</a></li>
								<li class="list-item"><a class="filter-link " href="#">M</a></li>
								<li class="list-item"><a class="filter-link " href="#">l</a></li>
								<li class="list-item"><a class="filter-link " href="#">xl</a></li>
							</ul>
							<div class="widget-banner">
								<figure><img src="assets/images/size-banner-widget.jpg" width="270" height="331" alt=""></figure>
							</div>
						</div>
					</div><!-- Size --> --}}

					<div class="widget mercado-widget widget-product">
						<h2 class="widget-title">Featured Products</h2>
						<div class="widget-content">
							<ul class="products">
								@foreach ($featProds as $item)
								<li class="product-item">
									<div class="product product-widget-style">
										<div class="thumbnnail">
											<a href="{{ Route('featured.products')}}" title="{{$item->name}}">
												<figure><img src="{{ asset('/images/'. $item->image) }}" alt="{{ $item->name }}"></figure>
											</a>
										</div>
										<div class="product-info">
											<a href="{{ Route('product.details', $item->slug) }}" class="product-name"><span>{{$item->name}}</span></a>
											<div class="wrap-price"><span class="product-price">${{ $item->sale_price }}</span></div>
										</div>
										
									</div>
								</li>
								@endforeach
							</ul>
						</div>
					</div><!-- brand widget-->

				</div><!--end sitebar-->

			</div><!--end row-->

		</div><!--end container-->

	</main>
	<!--main area-->

@endsection

@section('myjs')
<script>
	$( function() {
	  $( "#slider-range1" ).slider({
		orientation: "horizontal",
		range: true,
		min: {{$min_price}},
		max: {{$max_price}},
		values: [ {{$min_price}}, {{$max_price}} ],
		slide: function( event, ui ) {
		  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		let start_price = $( "#start_price" ).val( ui.values[ 0 ] );
		let end_price =  $( "#end_price" ).val( ui.values[ 1 ] );
		}
		
	  });
	//   $.ajax({
	// 		url: "{{ Route('search.products') }}",
	// 		method: "GET",
	// 		data: {start_price:start_price, end_price:end_price},
	// 		success: function (response) {
	// 			$('.search-result').html(response);
	// 		}
	// 	});
	  $( "#amount" ).val( "$" + $( "#slider-range1" ).slider( "values", 0 ) +
		" - $" + $( "#slider-range1" ).slider( "values", 1 ) );
	
	} );
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#sort1').on('change', function(){
				var url = $(this).val();
				alert(url);
				if(url){
					window.location = url;
				}
				return false;
			})
		})
	</script>
@endsection
