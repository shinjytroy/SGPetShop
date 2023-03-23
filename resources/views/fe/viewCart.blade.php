@extends('fe.layout')
@section('contents')
<div class="container">

  <div class="wrap-breadcrumb">
    <ul>
      <li class="item-link"><a href="{{ Route('home') }}" class="link">Home</a></li>
      <li class="item-link"><span>View Cart</span></li>
    </ul>
  </div>
  <div class="main-content-area">
    @php
    $total = 0;
    $count=0;
    @endphp
    <div class="wrap-iten-in-cart">
      <h3 class="box-title">View Cart</h3>
      <ul class="products-cart">
        @if (Session::has('cart'))
          @foreach(Session::get('cart') as $item)
            <li class="pr-cart-item">
              <div class="product-image">
                <figure><img src="{{ asset('/images/' .$item->product->image) }}" alt="{{ $item->product->name }}"></figure>
              </div>
              <div class="product-name">
                <a class="link-to-product" href="{{ Route('product.details', $item->product->slug) }}">{{ $item->product->name }}</a>
              </div>
              @php
              
              $price=number_format($item->product->price);
              @endphp
              <div class="price-field produtc-price"><p class="price">{{ $price }} $</p></div>
              <div class="quantity">
                <div class="quantity-input">
                  <input type="text" name="product-quantity" value="{{ $item->quantity }}" data-max="120" pattern="[0-9]*"  data-id="{{$item->product ->id}}">									
                  <a class="btn btn-increase" href="#"></a>
                  <a class="btn btn-reduce" href="#"></a>
                </div>
              </div>
              <div class="price-field sub-total"><p class="price">{{number_format($item->quantity * $item->product->price)}} $</p></div>
              @php

              $total += $item->quantity * $item->product->price;                    
             @endphp
              <div class="delete">
                <a href="#" class="btn btn-delete" title="" data-id="{{$item->product ->id}}">
                  <span>Delete from your cart</span>
                  <i class="fa fa-times-circle" aria-hidden="true"></i>
                </a>
              </div>
            </li>
          @endforeach
        @else
          <li class="pr-cart-item" colspan="5">No Product</li>
          
        @endif
      </ul>
    </div>

    <div class="summary">
      <div class="order-summary">
        <h4 class="title-box">Order Summary</h4>
        <p class="summary-info"><span class="title">Subtotal</span><b class="index">{{ number_format($total) }} $</b></p>
        <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
        <p class="summary-info total-info "><span class="title">Total</span><b class="index">{{ number_format($total)}} $</b></p>
      </div>
      <div class="checkout-info">
       

        
        <a class="btn btn-checkout" href="{{Route('checkout')}}">Check out</a>
        <a class="link-to-shop" href="{{Route('home')}}">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
      </div>
      <div class="update-clear">
        <a class="btn btn-clear" href="{{Route('clearCart')}}">Clear Shopping Cart</a>
        <a class="btn btn-update" href="#">Update Shopping Cart</a>
      </div>
    </div>

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
                $price=number_format("$item->sale_price");
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
@section("myjs")
<script>
  $(".quantity-input").on('click', '.btn', function(event) {
					event.preventDefault();
					var _this = $(this),
						_input = _this.siblings('input[name=product-quantity]'),
						_current_value = _this.siblings('input[name=product-quantity]').val(),
						_max_value = _this.siblings('input[name=product-quantity]').attr('data-max');
					if(_this.hasClass('btn-reduce')){
						if (parseInt(_current_value, 10) > 1) _input.val(parseInt(_current_value, 10) - 1);
					}else {
						if (parseInt(_current_value, 10) < parseInt(_max_value, 10)) _input.val(parseInt(_current_value, 10) + 1);
					}
          let pid=_input.data("id");
          let quantity= _this.siblings('input[name=product-quantity]').val();
          // alert(pid)
          $.ajax({
          type: 'post',
          url: "{{Route('changeCart')}}",   
          data: {
              pid: pid, 
              quantity: quantity, 
              _token: '{{ csrf_token() }}',
          }, success: function(data) {
            alert('Update Successfully!')
            location.reload();
          }
          });
	});
$('.btn-delete').click(function(e) {
    e.preventDefault();
    let pid = $(this).data("id"); // lấy id từ data-id
    $.ajax({
          type: 'post',
          url: "{{Route('removeCart')}}",   
          data: {
              pid: pid, 
             
              _token: '{{ csrf_token() }}',
          }, success: function(data) {
            alert('Update Successfully!')
            location.reload();
          }
          });
        });
</script>
@endsection