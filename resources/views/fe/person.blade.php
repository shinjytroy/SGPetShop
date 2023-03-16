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
<div class="wrap-iten-in-cart">
  <h3 class="box-title"> Information Member</h3>
<h4> Name : {{Session::get('user')->name}} </h4>
<h4> Email : {{Session::get('user')->email}} </h4>
<h4> Phone : {{Session::get('user')->phone}} </h4>
<h4> Address : {{Session::get('user')->address}} </h4>
</div>
<div class="wrap-iten-in-cart">
  <h3 class="box-title"> History Order</h3>
  <ul class="products-cart">  
 
    <table>
        <tr>
        <td> <div class="price-field produtc-price"><p class="price">STT</p></div> </td>
          <td> <div class="price-field produtc-price"><p class="price">Date Order </p></div> </td>
          <td> <div class="price-field produtc-price"><p class="price">Shipping Name </p></div></td>
          <td> <div class="price-field produtc-price"><p class="price">Shipping Address </p></div></td>
          <td> <div class="price-field produtc-price"><p class="price">Phone Number  </p></div></td>
          <td> <div class="price-field produtc-price"><p class="price">Email  </p></div></td>
          <td></td>
        </tr>
        @php 
           $id =Session::get('user')->id;
           $count = 0 ;
           $order = DB::table('orders')->where('user_id','=',$id)->get();   
        @endphp
            @foreach($order as $item )
              @php
              $count++;
                        
            
            @endphp
        <tr>
          <td> <div class="price-field produtc-price"><p class="price">{{$count}}</p></div></td>
          <td> <div class="price-field produtc-price"><p class="price">{{ $item->order_date }} </p></div></td>
          <td> <div class="price-field produtc-price"><p class="price">{{ $item->shipping_name }} </p></div></td>
          <td><div class="price-field produtc-price"><p class="price">{{ $item->shipping_address }} </p></div></td>
          <td> <div class="price-field produtc-price"><p class="price">{{ $item->shipping_phone }} </p></div></td>
          <td><div class="price-field produtc-price"><p class="price">{{ $item->shipping_email }} </p></div></td>
          <td> <div class="price-field produtc-price"><p class="price"><a href="{{Route('history', $item->id)}}">View</a></p></div></td>
        
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
    <h3 class="title-box">Featured Products</h3>
    <div class="wrap-products">
      <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >
        @foreach($featProds as $item)
        <div class="product product-style-2 equal-elem ">
          <div class="product-thumnail">
            <a href="{{ Route('product.details', $item->slug, $item->categorie_id) }}" title="{{ $item->name }}">
              <figure><img src="{{ asset('/images/'. $item->image) }}" width="214" height="214" alt="{{ $item->name }}"></figure>
            </a>
            <div class="group-flash">
              <span class="flash-item new-label">new</span>
            </div>
            <div class="wrap-btn">
              <a href="{{ Route('product.details', $item->slug, $item->categorie_id) }}" class="function-link">quick view</a>
            </div>
          </div>
          <div class="product-info">
            <a href="{{ Route('product.details', $item->slug, $item->categorie_id) }}" class="product-name"><span>{{ $item->name }}</span></a>
            <div class="wrap-price"><span class="product-price">$ {{ $item->sale_price }}</span></div>
          </div>
        </div>
        @endforeach
        
      </div>
    </div><!--End wrap-products-->
  </div>

</div><!--end main content area-->
</div><!--end container-->
@endsection

