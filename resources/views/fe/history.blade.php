@extends('fe.layout')
@section('contents')
<div class="container">

<div class="wrap-breadcrumb">
  <ul>
    <li class="item-link"><a href="{{Route('home')}}" class="link">home</a></li>
    <li class="item-link"><span>Order Detail</span></li>
  </ul>
</div>
<div class=" main-content-area">
@if (Session::get('user'))

<div class="wrap-iten-in-cart">
  <h3 class="box-title"> Order Detail</h3>
  <ul class="products-cart">  
 
    <table>
       
        <thead>
              <tr>
              <th> <div class="price-field produtc-price"><p class="price">STT</p></div> </th>

                  <th ><div class="price-field produtc-price"><p class="price">Product Name </p></div></th>
                  <th><div class="price-field produtc-price"><p class="price">Image </p></div></th>
                 
                  <th > <div class="price-field produtc-price"><p class="price">Price </p></div></th>  
                  <th ><div class="price-field produtc-price"><p class="price">Quantity </p></div></th>
                  <th><div class="price-field produtc-price"><p class="price">
                  Total Money </p></div>
                  </th>
                  <th ><div class="price-field produtc-price"><p class="price">Create Date</th>
                  <th>
                  </th>
              </tr>
          </thead>
          @php
    $count = 0;
    @endphp
          @foreach($order as $item)
            @php
            $count ++ ;
            $productName = DB::table('products')->where('id',"=",$item->product_id)->value('name');  
            $productImage = DB::table  ('products')->where('id',"=",$item->product_id)->value('image');

            @endphp
        <tr>       
        <td> <div class="price-field produtc-price"><p class="price">{{$count}}</p></div></td>

          <td> <div class="price-field produtc-price"><p class="price">{{ $productName }} </p></div></td>
          <td><img src="{{ asset('/images/' .$productImage) }}" alt="" width="100px" height="100px"> </td>
          <td><div class="price-field produtc-price"><p class="price">{{ number_format($item->price) }}</p></div></td>
          <td><div class="price-field produtc-price"><p class="price">{{ $item->quantity}}</p></div></td>

          <td> <div class="price-field produtc-price"><p class="price">{{ number_format($item->price * $item->quantity) }}</p></div></td>
          <td><div class="price-field produtc-price"><p class="price">{{ $item->created_at }} </p></div></td>
        
        </tr>
        
     @endforeach
    </table>

    
      
   
  </ul>
</div>

@else
<h3> Please Log in To Continue

<h4><a href="{{Route('login')}}">Log in</a></h4>
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

