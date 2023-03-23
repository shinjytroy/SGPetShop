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

					{{-- <div class="banner-shop">
						<a href="#" class="banner-link">
							<figure><img src="images/panner-shop.webp" alt=""></figure>
						</a>
					</div> --}}
					{{-- <div class="wrap-top-banner">
						<a href="{{ Route('shop') }}" class="link-banner banner-effect-2">
						  <figure><img src="images/0-panner-shop.webp" width="1170" height="240" alt=""></figure>
						</a>
					</div> --}}

					<div class="wrap-shop-control">

						<h1 class="shop-title">Product List</h1>

						<div class="wrap-right">

							<div class="sort-item orderby">
									<select name="sort_by" id="sort_by" class="use-chosen">
										<option value="">---Select---</option>
										<option value="lowest_price">Sort By Price: ASC</option>
										<option value="highest_price">Sort By Price: DESC</option>
									</select>
							</div>

							{{-- <div class="sort-item product-per-page">
								<select name="post-per-page" class="use-chosen" >
									<option value="12" selected="selected">12 per page</option>
									<option value="16">16 per page</option>
									<option value="18">18 per page</option>
									<option value="21">21 per page</option>
									<option value="24">24 per page</option>
									<option value="30">30 per page</option>
									<option value="32">32 per page</option>
								</select>
							</div> --}}

							{{-- <div class="change-display-mode">
								<a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
								<a href="#" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
							</div> --}}

						</div>

					</div><!--end wrap shop control-->
					
					<div>
						@include('fe.shop.search-result')
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
								@endforeach
							</ul>
						</div>
					</div><!-- Categories widget-->

					<div class="widget mercado-widget filter-widget brand-widget">
						<h2 class="widget-title">Brand</h2>
						<div class="widget-content">
							<ul class="list-style list-limited" data-show="6" name="brandProduct" id="brandProduct">
								
								@foreach ($brands as $item)
									<li class="list-item">
										<input class="brand_filter" type="checkbox" id="brandId" value="{{$item->id}}">
										<a class="filter-link" value={{ $item->id }}>{{$item->brand_name}}<span class="pull-right">({{App\Models\Product::where('brand_id',$item->id)->count()}})</span></a>	
									</li>
									
								@endforeach
								
								{{-- <li class="list-item"><a data-label='Show less<i class="fa fa-angle-up" aria-hidden="true"></i>' class="btn-control control-show-more" href="#">Show more<i class="fa fa-angle-down" aria-hidden="true"></i></a></li> --}}
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
	  $( "#amount" ).val( "$" + $( "#slider-range1" ).slider( "values", 0 ) +
		" - $" + $( "#slider-range1" ).slider( "values", 1 ) );
	});
	</script>

	<script>
	$(function() {
		$('.brand_filter').click(function(){
			//alert('abc');
			var brand = [];
			$('.brand_filter').each(function(){
				if($(this).is(":checked")){
					brand.push($(this).val());
				}
			});
			// alert(brand);
			finalBrand = brand.toString();
		$.ajax({
                type: 'GET',
				dataType: 'html',
                url: "{{ route('filterBrand') }}",
                data: "brand=" + finalBrand,
                success: function(data){
					$("#updateDiv").html(data);
                }
            });
	  	});
	});
	</script>
	<script>
		$(document).ready(function(e){
			
			$('#sort_by').change(function(){
				let sort_by = $('#sort_by').val();
				//alert(sort_by);
				//console.log(1);
				$.ajax({
					url:"{{route('sort.by')}}",
					method: 'GET',
					data: {sort_by:sort_by},
					success: function(data){
						//console.log(data);
						$("#updateDiv").html(data);
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#sortId').on('change', function(){
				var sort = ('#sort').val();
				var url = ('#url').val();
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: url,
					method:'POST',
					data: {url:url, sort:sort,_token:_token},
					success:function(data){
						$('.filter_products').html(data);
					}
				});
			});
		});
	</script>
@endsection
