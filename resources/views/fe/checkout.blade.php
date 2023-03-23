@extends('fe.layout')
@section('contents')
<div class="container">

<div class="wrap-breadcrumb">
  <ul>
    <li class="item-link"><a href="{{Route('home')}}" class="link">home</a></li>
    <li class="item-link"><span>Check Out</span></li>
  </ul>
</div>
<div class=" main-content-area">
  <form action="{{Route('processCheckout')}}" method="post"  name="frm-billing">
    @csrf
  <div class="wrap-address-billing">
    <h3 class="box-title">Billing Address</h3>
      <p class="row-in-form">
        <label for="fname">Name<span>*</span></label>
        <input id="fname" type="text" name="shipping_name" value="{{Session::get('user')->name}}" placeholder="Your name">
      </p>
      <p class="row-in-form">
        <label for="email">Email Addreess:</label>
        <input id="email" type="email" name="shipping_email" value="{{Session::get('user')->email}}" placeholder="Type your email">
      </p>
      <p class="row-in-form">
        <label for="phone">Phone number<span>*</span></label>
        <input id="phone" type="number" name="shipping_phone" value="{{Session::get('user')->phone}}" placeholder="10 digits format" required>
      </p>
      <p class="row-in-form">
        <label for="add">Address:</label>
        <input id="add" type="text" name="shipping_address" value="{{Session::get('user')->address}}" placeholder="Street at apartment number" required>
      </p>
  </div>
  <input id="status" type="hidden" name="status" value="1" placeholder="Street at apartment number" required>

  <div class="summary summary-checkout">
    <div class="summary-item payment-method">
      <h4 class="title-box">Payment Method</h4>
      @if (Session::has('cart'))
        @foreach(Session::get('cart') as $item)
        <table class="table table-borderless">
          <thead>
            {{-- <li class="pr-cart-item"> --}}
              <td>
                <div class="product-image">
                  <figure><img src="{{ asset('/images/' .$item->product->image) }}" style="width: 50px" alt="{{ $item->product->name }}"></figure>
                </div>
              </td>
              <th>
                <div class="product-name" style="padding-bottom: 15px">
                  <a class="link-to-product" href="{{ Route('product.details', $item->product->slug) }}">{{ $item->product->name }}</a>
                </div>
              </th>
              @php
                 $price=number_format($item->product->price);
              @endphp
              <th>
                <div style="padding-bottom:5px" class="price-field produtc-price"><p class="price">{{number_format($item->quantity * $item->product->price)}} $</p></div>
              </th>
            {{-- </li> --}}
          </thead>
        </table>
        @endforeach  
        @else
          <th> No Product </th>
        @endif
      <div class="choose-payment-methods">
        <label class="payment-method">
          <input name="payment" id="payment" value="COD" type="radio" checked>
          <span>Cash on Delivery</span>
          <span class="payment-desc"> </span>
        </label>
      </div>

      @php
      $total=number_format($total);
      @endphp
      <p class="summary-info grand-total"><span>Grand Total</span> <span id="totalpaypal" class="grand-total-price">{{$total}}</span></p>
      <button type="submit" class="btn btn-medium">Place order now</button>
    </div>
    <div class="summary-item shipping-method">
      <h4 class="title-box f-title">Shipping method</h4>
      <p class="summary-info"><span class="title">Flat Rate</span></p>
      <p class="summary-info"><span class="title">Fixed $50.00</span></p>
      <h4 class="title-box">Discount Codes</h4>
      <p class="row-in-form">
        <label for="coupon-code">Enter Your Coupon code:</label>
        <input id="coupon-code" type="text" name="coupon-code" value="" placeholder="">	
      </p>
      <a href="#" class="btn btn-small">Apply</a>
    </div>
  </div>
</form>
<div class="wrap-show-advance-info-box style-1 box-in-site">
  <h3 class="title-box">Most Viewed Products</h3>
      <div class="xwrap-show-advance-info-box style-1 has-countdown">
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
                <a href="{{ Route('product.details', $item->slug) }}" class="function-link">quick view</a>
              </div>
            </div>
            @php
            $price=$item->sale_price;
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
  </div><!--End wrap-products--> 
</div>

</div><!--end main content area-->
</div><!--end container-->
@endsection 

