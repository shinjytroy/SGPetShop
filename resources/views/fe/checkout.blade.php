@extends('fe.layout')
@section('contents')
<div class="container">

<div class="wrap-breadcrumb">
  <ul>
    <li class="item-link"><a href="{{Route('home')}}" class="link">home</a></li>
    <li class="item-link"><span>login</span></li>
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
          <input name="payment" id="payment" value="COD" type="radio" >
          <span>Cash on Delivery</span>
          <span class="payment-desc"> </span>
        </label>
        <label class="payment-method">
          <input name="payment" id="payment" value="PAYPAL"type="radio"  >
          <span>Paypal</span>
          <span class="payment-desc"><div id="paypal-button" class="total"></div></span>
        <div id="paypal-button" class="total"></div>
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
 

</div><!--end main content area-->
</div><!--end container-->
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
	paypal.Button.render({
	  // Configure environment
	  env: 'sandbox',
	  client: {
		sandbox: 'AfQkAK-Vb1re9ccSjUXorxkpBmr259PurmV3SoonN5timhx2Nhk43WDqSadA-mSNfiKPce7q-lN0C5vs',
		production: 'demo_production_client_id'
	  },
	  // Customize button (optional)
	  locale: 'en_US',
	  style: {
		size: 'medium',
		color: 'gold',
		shape: 'pill',
	  },
  
	  // Enable Pay Now checkout flow (optional)
	  commit: true,
  
	  // Set up a payment
	  payment: function(data, actions) {
		return actions.payment.create({
		  transactions: [{
			amount: {
			  total: '{{$total}}',
			  currency: 'USD'
			}
		  }]
		});
	  },
	  // Execute the payment
	  onAuthorize: function(data, actions) {
		return actions.payment.execute().then(function() {
		  // Show a confirmation message to the buyer
		  window.alert('Thank you for your purchase!');
		});
	  }

    // return view('thanksyou');
	}, '#paypal-button');
  
	
	</script>
@endsection

