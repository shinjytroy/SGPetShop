<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Home</title>	
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="{{ asset('/assets/css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('/assets/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/assets/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/assets/css/chosen.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('/assets/css/color-01.css') }}">
	<script src="https://www.paypalobjects.com/api/checkout.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.3/sweetalert2.min.js" integrity="sha512-eN8dd/MGUx/RgM4HS5vCfebsBxvQB2yI0OS5rfmqfTo8NIseU+FenpNoa64REdgFftTY4tm0w8VMj5oJ8t+ncQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>


<body class="home-page home-01 ">
@if(Session::has('messagelogin'))
<script>
   Swal.fire(
  'The Internet?',
  'That thing is still around?',
  'question'
)
    </script>
   @endif
	<?php 
	if (!function_exists('currency_format')) {
		function currency_format($price, $suffix = 'đ') {
			if (!empty($price)) {
				return number_format($price, 0, ',', '.') . "{$suffix}";
			}
		}
	}
	?>

	<!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

	<!--header-->
	<header id="header" class="header header-style-1">
		<div class="container-fluid" >
			<div class="row">
				<div class="topbar-menu-area" style="padding-top:9px ; padding-bottom:9px ;background-color:#dc3545 ; font-size:15px ;">
					<div class="container"  >
						<div class="topbar-menu left-menu">
							@foreach($footer as $item)
							<ul>
								<li class="menu-item" >
									<a style="color:white" title="{{$item->address}}" href="{{ Route("contact")}}" ><span class="icon label-before fa fa-home"></span>Address : {{$item->address}}</a>
								</li>
							</ul>
							
						</div>
						 <div class="topbar-menu right-menu">
							<ul>
							<li class="menu-item" >
							<a style="color:white" title="{{$item->hotline}}" href="{{ Route("contact")}}" ><span  class="icon  fa fa-mobile"></span> Hotline: {{$item->hotline}}</a>
							
							@endforeach
							@if (Session::get('user'))
								<li class="menu-item" ><a style="color:white" title="Register or Login" href="{{Route('logout')}}">Log Out</a></li>
							@else
								<li class="menu-item" ><a style="color:white"  title="Register or Login" href="{{Route('login')}}">Log In</a></li>
							@endif	
							<li class="menu-item" ><a style="color:white"  title="Register or Login" href="{{Route('register')}}">Register</a></li>

							</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="container">
					<div class="mid-section main-info-area">

						<div class="wrap-logo-top left-section">
							<a href="{{Route('home')}}" class="link-to-home"><img src="{{asset('/assets/images/logo-pets.png')}}" alt="mercado"></a>
						</div>

						<div class="wrap-search center-section">
							<div class="wrap-search-form">
								<form action="{{ Route('search') }}" method="POST" id="form-search-top" name="form-search-top" style="width:0;">
									@csrf
									<input type="text" id="search-box" name="search" value="" placeholder="Search here...">
									<div id="suggestion-box"></div>
									<button form="form-search-top" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
									{{-- <div class="wrap-list-cate">
										<input type="hidden" name="product-cate" value="0" id="product-cate">
										<a href="#" class="link-control">All Category</a>
										<ul class="list-cate">
											<li class="level-0">All Category</li>
											@foreach ($categories as $item)
											<li class="level-1" value="{{ $item->id}}">- {{ $item->categorie_name }}</li>
											@endforeach
										</ul>
									</div> --}}
								</form>
							</div>
						</div>

						<div class="wrap-icon right-section">
							
							@php
							$count = 0 ;
							@endphp
							@if (Session::has('cart'))
          					@foreach(Session::get('cart') as $item)
							@php
							$count += $item->quantity;
							@endphp  
							@endforeach
							@endif
							
							<div class="wrap-icon-section minicart">
								<a href="{{asset('view-cart')}}" class="link-direction">
									<i class="fa fa-shopping-basket" aria-hidden="true"></i>
									<div class="left-info">
										<span class="index">{{$count}}</span>
										<span class="title">CART</span>
									</div>
								</a>
							</div>

							<div class="wrap-icon-section wishlist">
								<a href="{{asset('person')}}" class="link-direction">
									<i class="fa fa-user" aria-hidden="true"></i>
									
									<div class="left-info">
																
									</div>
									
								</a>
								
							</div>	
							<div class="wrap-icon-section wishlist">
							@if (Session::get('user'))
								<div class="title"><i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>{{Session::get('user')->name}} </div>
								@endif	
							</div>

						</div>

					</div>
				</div>

				<div class="nav-section header-sticky">
					<div class="header-nav-section">
						<div class="container">
							<ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info" >
								<li class="menu-item"><a href="{{ Route("shop")}}" class="link-term">Weekly Featured</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="{{ Route("shop")}}" class="link-term">Hot Sale items</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="{{ Route("shop")}}" class="link-term">Top new items</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="{{ Route("shop")}}" class="link-term">Top Selling</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="{{ Route("shop")}}" class="link-term">Top rated items</a><span class="nav-label hot-label">hot</span></li>
							</ul>
						</div>
					</div>

					<div class="primary-nav-section" style="padding-top:13px ; padding-bottom:13px ;font-family:Quicksand ; font-size:17px  ">
						<div class="container">
							<ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
								<li class="menu-item" >
									<a href="{{Route('home')}}"class="link-term mercado-item-title" alt="home">Home</a>
								</li>
								<li class="menu-item" >
									<a href="{{Route('about')}}" class="link-term mercado-item-title">About Us </a>
								</li>
								<li class="menu-item">
									<a href="{{Route('shop')}}" class="link-term mercado-item-title">Products</a>
								</li>
								<li class="menu-item">
									<a href="{{Route ('viewCart')}}" class="link-term mercado-item-title">Cart</a>
								</li>
								<li class="menu-item">
									<a href="{{Route('checkout')}}" class="link-term mercado-item-title">Checkout</a>
								</li>
								<li class="menu-item">
									<a href="{{Route('contact')}}" class="link-term mercado-item-title">Contact Us</a>
								</li>																	
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<main id="main">
	
    @yield('contents')

	</main>

	<footer id="footer">
		<div class="wrap-footer-content footer-style-1">

			<div class="wrap-function-info">
				<div class="container" >
					<ul>
						<li class="fc-info-item">
							<i class="fa fa-truck" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Free Shipping</h4>
								<p class="fc-desc">Free On Oder Over $99</p>
							</div>
						</li>
						<li class="fc-info-item">
							<i class="fa fa-recycle" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Guarantee</h4>
								<p class="fc-desc">30 Days Money Back</p>
							</div>
						</li>
						<li class="fc-info-item">
							<i class="fa fa-credit-card-alt" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Safe Payment</h4>
								<p class="fc-desc">Safe your online payment</p>
							</div>

						</li>
						<li class="fc-info-item">
							<i class="fa fa-life-ring" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Online Suport</h4>
								<p class="fc-desc">We Have Support 24/7</p>
							</div>

						</li>
					</ul>
				</div>
			</div>
			<!--End function info-->

			<div class="main-footer-content">

				<div class="container">

					<div class="row">

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<div class="wrap-footer-item">
								<h3 class="item-header">Contact Details</h3>
								<div class="item-content">	
									<div class="wrap-contact-detail"
									@foreach ($footer as $item)				
										<ul>
											<li>
												<i class="fa fa-map-marker" aria-hidden="true"></i>
												<p class="contact-txt">{{$item->address}}</p>
											</li>
											<li>
												<i class="fa fa-phone" aria-hidden="true"></i>
												<p class="contact-txt">{{$item->phone}}</p>
											</li>
											<li>
												<i class="fa fa-envelope" aria-hidden="true"></i>
												<p class="contact-txt">{{$item->email}}</p>
											</li>											
										</ul>
									@endforeach
									</div>
									
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

							<div class="wrap-footer-item">
								<h3 class="item-header">Hot Line</h3>
								<div class="item-content">
									@foreach ($footer as $item)	
									<div class="wrap-hotline-footer">
										<span class="desc">Call Us toll Free</span>
										<b class="phone-number">{{$item->hotline}}</b>
									</div>
									@endforeach
								</div>
								
							</div>

							<div class="wrap-footer-item footer-item-second">
								<h3 class="item-header">Sign up for newsletter</h3>
								<div class="item-content">
									<div class="wrap-newletter-footer">
										<form action="" class="frm-newletter" id="frm-newletter">
											<input type="email" class="input-email" name="email" value="" placeholder="Enter your email address">
											<button class="btn-submit">Subscribe</button>
										</form>
									</div>
								</div>
							</div>

						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 box-twin-content ">
							<div class="row">
								<div class="wrap-footer-item twin-item">
									<h3 class="item-header">My Account</h3>
									<div class="item-content">
										<div class="wrap-vertical-nav">
											<ul>
												<li class="menu-item"><a href="#" class="link-term">My Account</a></li>
												<li class="menu-item"><a href="#" class="link-term">Brands</a></li>
												<li class="menu-item"><a href="#" class="link-term">Gift Certificates</a></li>
												<li class="menu-item"><a href="#" class="link-term">Affiliates</a></li>
												<li class="menu-item"><a href="#" class="link-term">Wish list</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="wrap-footer-item twin-item">
									<h3 class="item-header">Infomation</h3>
									<div class="item-content">
										<div class="wrap-vertical-nav">
											<ul>
												<li class="menu-item"><a href="#" class="link-term">Contact Us</a></li>
												<li class="menu-item"><a href="#" class="link-term">Returns</a></li>
												<li class="menu-item"><a href="#" class="link-term">Site Map</a></li>
												<li class="menu-item"><a href="#" class="link-term">Specials</a></li>
												<li class="menu-item"><a href="#" class="link-term">Order History</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>

					<div class="row">

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<div class="wrap-footer-item">
								<h3 class="item-header">We Using Safe Payments:</h3>
								<div class="item-content">
									<div class="wrap-list-item wrap-gallery">
										<img src="assets/images/payment.png" style="max-width: 260px;">
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<div class="wrap-footer-item">
								<h3 class="item-header">Social network</h3>
								<div class="item-content">
									<div class="wrap-list-item social-network">
										<ul>
											<li><a href="https://twitter.com/?lang=vi" class="link-to-item" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
											<li><a href="https://www.facebook.com/" class="link-to-item" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											<li><a href="https://www.pinterest.com/" class="link-to-item" title="pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
											<li><a href="https://www.instagram.com/" class="link-to-item" title="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<div class="wrap-footer-item">
								<h3 class="item-header">Dowload App</h3>
								<div class="item-content">
									<div class="wrap-list-item apps-list">
										<ul>
											<li><a href="https://www.apple.com/store" class="link-to-item" title="our application on apple store"><figure><img src="assets/images/brands/apple-store.png" alt="apple store" width="128" height="36"></figure></a></li>
											<li><a href="https://play.google.com/" class="link-to-item" title="our application on google play store"><figure><img src="assets/images/brands/google-play-store.png" alt="google play store" width="128" height="36"></figure></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="coppy-right-box">
				<div class="container">
					<div class="coppy-right-item item-left">
						<p class="coppy-right-text">Copyright © 2020 Surfside Media. All rights reserved</p>
					</div>
					<div class="coppy-right-item item-right">
						<div class="wrap-nav horizontal-nav">
							<ul>
								<li class="menu-item"><a href="about-us.html" class="link-term">About us</a></li>								
								<li class="menu-item"><a href="privacy-policy.html" class="link-term">Privacy Policy</a></li>
								<li class="menu-item"><a href="terms-conditions.html" class="link-term">Terms & Conditions</a></li>
								<li class="menu-item"><a href="return-policy.html" class="link-term">Return Policy</a></li>								
							</ul>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</footer>
	
	<script src="{{ asset('/assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('/assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/assets/js/jquery.flexslider.js') }}"></script>
	<script src="{{ asset('/assets/js/chosen.jquery.min.js') }}"></script>
	<script src="{{ asset('/assets/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('/assets/js/jquery.countdown.min.js') }}"></script>
	<script src="{{ asset('/assets/js/jquery.sticky.js') }}"></script>
	<script src="{{ asset('/assets/js/functions.js') }}"></script>
	{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(document).ready(function(){
            $("#search-box").keyup(function(){
                $.ajax({
                    type: "GET",
                    url: "{{ route('search') }}",
                    data: { query: $(this).val() },
                    beforeSend: function(){
                        $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
                    },
                    success: function(data){
                        $("#suggestion-box").show();
                        $("#suggestion-box").html("");
                        $.each(data, function(index, product){
                            $("#suggestion-box").append("<div class='suggestionList' onClick='selectProduct(\""+product.name+"\")'>"+product.name+"</div>");
                        });
                        $("#search-box").css("background","#FFF");
                    }
                });
            });
        });
        function selectProduct(val) {
            $("#search-box").val(val);
            $("#suggestion-box").hide();
        }
    </script>
	<style>
        #search-box{width:500px;border:solid 1px #000;padding:10px;}
        #suggestion-box{position:relative;width: 500px; margin: 0 auto;}
        .suggestionList{margin: 0;padding: 10px 0;border-bottom:1px solid #000;font-size:14px;}
        .suggestionList:hover{background:#f2f2f2;cursor:pointer;}
    </style>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
	var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
	s1.async=true;
	s1.src='https://embed.tawk.to/64114bdd4247f20fefe5f474/1grhp0mbi';
	s1.charset='UTF-8';
	s1.setAttribute('crossorigin','*');
	s0.parentNode.insertBefore(s1,s0);
	})();
	</script>
	<!--End of Tawk.to Script-->

	@yield('myjs')
	
</body>
</html>