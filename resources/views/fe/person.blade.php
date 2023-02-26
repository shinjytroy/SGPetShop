@extends('fe.layout')
@section('contents')
<div class="container">

<div class="wrap-breadcrumb">
  <ul>
    <li class="item-link"><a href="{{Route('home')}}" class="link">home</a></li>
    <li class="item-link"><span>Person</span></li>
  </ul>
</div>
<div class=" main-content-area">
@if (Session::get('user'))
<h2> Information : {{Session::get('user')->name}}</h2>
<h4> Name : {{Session::get('user')->name}} </h4>
<h4> Email : {{Session::get('user')->email}} </h4>
<h4> Phone : {{Session::get('user')->phone}} </h4>
<h4> Address : {{Session::get('user')->address}} </h4>

@else
<h3> Please Login To Continue

<h4><a href="{{Route('login')}}">Login</a></h4>
@endif

  <div class="wrap-show-advance-info-box style-1 box-in-site">
    <h3 class="title-box">Most Viewed Products</h3>
    <div class="wrap-products">
      <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

        <div class="product product-style-2 equal-elem ">
          <div class="product-thumnail">
            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
              <figure><img src="assets/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
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
            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
              <figure><img src="assets/images/products/digital_17.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
            </a>
            <div class="group-flash">
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
            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
              <figure><img src="assets/images/products/digital_15.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
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
            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
              <figure><img src="assets/images/products/digital_01.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
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
            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
              <figure><img src="assets/images/products/digital_21.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
            </a>
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
            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
              <figure><img src="assets/images/products/digital_03.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
            </a>
            <div class="group-flash">
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
            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
              <figure><img src="assets/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
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
            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
              <figure><img src="assets/images/products/digital_05.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
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
      </div>
    </div><!--End wrap-products-->
  </div>

</div><!--end main content area-->
</div><!--end container-->
@endsection

