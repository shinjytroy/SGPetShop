@extends('fe.layout')
@section('contents')
@if(Session::has('messagelogin'))
    <script>
   const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Signed in successfully'
})
    </script>
   @endif
<div class="container">

  <!--MAIN SLIDE-->
  <div class="wrap-main-slide">
    <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
      <div class="item-slide">
        <img src="assets/images/cat.png" alt="" class="img-slide">
        <div class="slide-info slide-1">
          <!-- <h2 class="f-title">Kid Smart <b>Watches</b></h2> -->
          <!-- <span class="subtitle">Compra todos tus productos Smart por internet.</span>
          <p class="sale-info">Only price: <span class="price">$59.99</span></p> -->
          <a href="{{Route('shop')}}" class="btn-link">Shop Now</a>
        </div>
      </div>
      <div class="item-slide">
        <img src="assets/images/cat1.png" alt="" class="img-slide">
        <div class="slide-info slide-2">
          <h2 class="f-title">Extra 25% Off</h2>
          <span class="f-subtitle">On online payments</span>
          <p class="discount-code">Use Code: #FA6868</p>
          <h4 class="s-title">Get Free</h4>
          <p class="s-subtitle">TRansparent Bra Straps</p>
        </div>
      </div>
      <!-- <div class="item-slide">
        <img src="assets/images/main-slider-1-3.jpg" alt="" class="img-slide">
        <div class="slide-info slide-3">
          <h2 class="f-title">Great Range of <b>Exclusive Furniture Packages</b></h2>
          <span class="f-subtitle">Exclusive Furniture Packages to Suit every need.</span>
          <p class="sale-info">Stating at: <b class="price">$225.00</b></p>
          <a href="#" class="btn-link">Shop Now</a>
        </div>
      </div> -->
    </div>
  </div>

  <!--BANNER-->
  <div class="wrap-banner style-twin-default">
  
    <div class="banner-item" >
      <a href="#" class="link-banner banner-effect-1">
        <figure><img src="assets/images/brands/banner1.jpg" alt="royal_cain"  style="height:300px ; width:600px"></figure>
      </a>
    </div>

    <div class="banner-item">
      <a href="#" class="link-banner banner-effect-1">
        <figure><img src="assets/images/brands/banner3.jpg" alt="pro_pand"   style="height:300px;  width:600px"></figure>

      </a>
    </div>

  </div>

  <!--On Sale-->
  @php
  $datetime= "2023/3/10 12:00:00";
  @endphp
  <div class="xwrap-show-advance-info-box style-1 has-countdown">
    <h3 class="title-box">Top Saling</h3>
    <div class="wrap-countdown mercado-countdown" data-expire="{{$datetime}}"></div>
    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
      @foreach($prods as $item)
      <div class="product product-style-2 equal-elem ">
        <div class="product-thumnail">
          <a href="{{ Route('product.details', $item->slug) }}" title="{{ $item->name }}">
            <figure><img src="{{ asset('/images/'. $item->image) }}" width="800" height="800" alt="{{ $item->name }}"></figure>
          </a>
          <div class="group-flash">
            <span class="flash-item sale-label">sale -10%</span>
            
          </div>
          
          <div class="wrap-btn">
            <a href="#" class="function-link">quick view</a>
          </div>
        </div>
        @php
        $price=number_format("$item->price");
        @endphp
        <div class="product-info">
          <a href="{{ Route('product.details', $item->slug) }}" class="product-name"><span>{{ $item->name }}</span></a>
          <div class="wrap-price"><span class="product-price">{{ $price }} $</span></div>
          <!-- <div class="wrap-stock"><span class="product-stock">SL: {{ $item->stock }} </span></div> -->
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <!--2,000+ Brands - Shop All-->
  <div class="wrap-show-advance-info-box style-1">
    <h2 class="title-box">2,000+ Brands - Shop All</h2>
    <div class="wrap-top-banner">
      <a href="#" class="link-banner banner-effect-2">
        <figure><img src="assets/images/brands/banner2.jpg" width="580" height="240" alt=""></figure>
      </a>
      <a href="#" class="link-banner banner-effect-2">
        <figure><img src="assets/images/brands/banner2.jpg" width="580" height="240" alt=""></figure>
      </a>
    </div>
    <div class="wrap-products">
      <div class="wrap-product-tab tab-style-1">						
        <div class="tab-contents">
          <div class="tab-content-item active" id="digital_1a">
            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
              @foreach ($brands as $item)
              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="{{ $item->brand_name }}">
                    <figure><img src="{{asset('images/'.$item->brand_image_path)}}" alt="{{ $item->brand_name }}" width="800" height="800"></figure>
                  </a>
                  <div class="group-flash">
                    <span class="flash-item new-label">new</span>
                  </div>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quick view</a>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>							
        </div>
      </div>
    </div>
  </div>

  <!--Product Categories-->
  <div class="wrap-show-advance-info-box style-1">
    <h3 class="title-box">Product Categories</h3>
    <div class="wrap-top-banner">
      <a href="#" class="link-banner banner-effect-2">
        <figure><img src="images/0-panner-shop.webp" width="1170" height="240" alt=""></figure>
      </a>
    </div>
    <div class="wrap-products">
      <div class="wrap-product-tab tab-style-1">
        <div class="tab-control">
          @foreach ($categories as $item)
          <a href="#" class="tab-control-item">{{ $item->categorie_name }}</a>
          @endforeach
        </div>
        <div class="tab-contents">
          <div class="tab-content-item active" id="fashion_1a">
            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >

              {{-- <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_01.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="group-flash">
                    <span class="flash-item new-label">new</span>
                  </div>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quick view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Lois Caron LCS-4027 Analog Watch - For Men</span></a>
                  <div class="wrap-price"><span class="product-price">$250.00</span></div>
                </div>
              </div>

              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_02.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="group-flash">
                    <span class="flash-item sale-label">sale</span>
                  </div>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quick view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Business Men Leather Laptop Tote Bags Man Crossbody </span></a>
                  <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                </div>
              </div>

              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_09.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quick view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Alberto Torresi Borgo Yellow Shoes - Alberto Torresi</span></a>
                  <div class="wrap-price"><span class="product-price">$250.00</span></div>
                </div>
              </div> --}}
              
            @foreach ($prods as $item)
            <div class="product product-style-2 equal-elem ">
              <div class="product-thumnail">
                <a href="detail.html" title="{{ $item->name }}">
                  <figure><img src="{{asset('images/'.$item->image)}}" alt="{{$item->name}}" width="800" height="800"></figure>
                </a>
                <div class="group-flash">
                  <span class="flash-item new-label">new</span>
                  @if($item->sale_price > 0)
                    <span class="flash-item sale-label">sale {{$item->sale_price}} %</span>
                  @else
                    <span></span>
                  @endif
                  <span class="flash-item bestseller-label">Bestseller</span>
                </div>
                <div class="wrap-btn">
                  <a href="#" class="function-link">quick view</a>
                </div>
              </div>
              <div class="product-info">
                <a href="#" class="product-name"><span>{{ $item->name }}</span></a>
                <div class="wrap-price"><ins><p class="product-price">{{$item->price - ($item->price * $item->sale_price/100)}} $</p></ins>
                  @if ($item->sale_price > 0)
                    <del><p class="product-price">{{ $item->price }} $</p></del></div>
                  @else
                    </div>
                  @endif 
              </div>
            </div>
            @endforeach
          </div>
        </div>

          {{-- <div class="tab-content-item" id="fashion_1b">
            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_03.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="group-flash">
                    <span class="flash-item bestseller-label">Bestseller</span>
                  </div>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quick view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                  <div class="wrap-price"><span class="product-price">$250.00</span></div>
                </div>
              </div>

              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_07.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="group-flash">
                    <span class="flash-item bestseller-label">Bestseller</span>
                  </div>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quick view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                  <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                </div>
              </div>

              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_08.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="group-flash">
                    <span class="flash-item bestseller-label">Bestseller</span>
                  </div>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quick view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                  <div class="wrap-price"><span class="product-price">$250.00</span></div>
                </div>
              </div>

              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_09.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="group-flash">
                    <span class="flash-item bestseller-label">Bestseller</span>
                  </div>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quic view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                  <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                </div>
              </div>

              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_02.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="group-flash">
                    <span class="flash-item bestseller-label">Bestseller</span>
                  </div>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quick view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                  <div class="wrap-price"><span class="product-price">$250.00</span></div>
                </div>
              </div>

              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_05.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="group-flash">
                    <span class="flash-item bestseller-label">Bestseller</span>
                  </div>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quick view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                  <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                </div>
              </div>

              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_08.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="group-flash">
                    <span class="flash-item bestseller-label">Bestseller</span>
                  </div>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quick view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                  <div class="wrap-price"><span class="product-price">$250.00</span></div>
                </div>
              </div>

              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_04.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="group-flash">
                    <span class="flash-item bestseller-label">Bestseller</span>
                  </div>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quick view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                  <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                </div>
              </div>

            </div>
          </div>

          <div class="tab-content-item" id="fashion_1c">
            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_02.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="group-flash">
                    <span class="flash-item new-label">new</span>
                  </div>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quick view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                  <div class="wrap-price"><span class="product-price">$250.00</span></div>
                </div>
              </div>

              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_03.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="group-flash">
                    <span class="flash-item new-label">new</span>
                    <span class="flash-item sale-label">sale</span>
                  </div>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quick view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                  <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                </div>
              </div>

              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_04.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="group-flash">
                    <span class="flash-item new-label">new</span>
                  </div>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quick view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                  <div class="wrap-price"><span class="product-price">$250.00</span></div>
                </div>
              </div>

              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_05.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="group-flash">
                    <span class="flash-item new-label">new</span>
                    <span class="flash-item sale-label">sale</span>
                  </div>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quick view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                  <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                </div>
              </div>

              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_06.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="group-flash">
                    <span class="flash-item new-label">new</span>
                  </div>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quick view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                  <div class="wrap-price"><span class="product-price">$250.00</span></div>
                </div>
              </div>

              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_07.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="group-flash">
                    <span class="flash-item new-label">new</span>
                    <span class="flash-item sale-label">sale</span>
                  </div>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quick view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                  <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                </div>
              </div>

              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_08.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="group-flash">
                    <span class="flash-item new-label">new</span>
                  </div>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quic view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                  <div class="wrap-price"><span class="product-price">$250.00</span></div>
                </div>
              </div>

              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_09.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="group-flash">
                    <span class="flash-item new-label">new</span>
                    <span class="flash-item sale-label">sale</span>
                  </div>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quic view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                  <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                </div>
              </div>

            </div>
          </div>

          <div class="tab-content-item" id="fashion_1d">
            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_05.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quick view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                  <div class="product-rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                  <div class="wrap-price"><span class="product-price">$250.00</span></div>
                </div>
              </div>

              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_04.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="group-flash">
                    <span class="flash-item sale-label">sale</span>
                  </div>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quic view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                  <div class="product-rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                  <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                </div>
              </div>

              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_03.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="group-flash">
                    <span class="flash-item new-label">new</span>
                    <span class="flash-item sale-label">sale</span>
                  </div>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quic view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                  <div class="product-rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                  <div class="wrap-price"><span class="product-price">$250.00</span></div>
                </div>
              </div>

              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_02.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="group-flash">
                    <span class="flash-item bestseller-label">Bestseller</span>
                  </div>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quic view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                  <div class="product-rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                  <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                </div>
              </div>

              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_01.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quic view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                  <div class="product-rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                  <div class="wrap-price"><span class="product-price">$250.00</span></div>
                </div>
              </div>

              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_06.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="group-flash">
                    <span class="flash-item sale-label">sale</span>
                  </div>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quic view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                  <div class="product-rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                  <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                </div>
              </div>

              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_08.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="group-flash">
                    <span class="flash-item new-label">new</span>
                  </div>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quic view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                  <div class="product-rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                  <div class="wrap-price"><span class="product-price">$250.00</span></div>
                </div>
              </div>

              <div class="product product-style-2 equal-elem ">
                <div class="product-thumnail">
                  <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                    <figure><img src="assets/images/products/fashion_09.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                  </a>
                  <div class="group-flash">
                    <span class="flash-item bestseller-label">Bestseller</span>
                  </div>
                  <div class="wrap-btn">
                    <a href="#" class="function-link">quic view</a>
                  </div>
                </div>
                <div class="product-info">
                  <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                  <div class="product-rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                  <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                </div>
              </div>

            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>			

</div>
@endsection