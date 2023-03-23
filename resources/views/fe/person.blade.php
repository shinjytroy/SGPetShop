@extends('fe.layout')
@section('contents')
@if(Session::has('messageupdate'))
    <script>
      Swal.fire(
  'Edit Success !!',
  'You clicked the button to continue!',
  'success'
    )
    </script>
   @endif
<div class="container">

<div class="wrap-breadcrumb">
  <ul>
    <li class="item-link"><a href="{{Route('home')}}" class="link">home</a></li>
    <li class="item-link"><span>Person</span></li>
  </ul>
</div>
<div class=" main-content-area">
@if (Session::get('user'))
    @php
    $id =Session::get('user')->id;
          
    $user = DB::table('users')->where('id','=',$id)->first();   
@endphp
<div class="wrap-iten-in-cart">
  <h3 class="box-title"> Information Member</h3>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col"></th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Name</th>
      <td>{{$user->name}}</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
    <th scope="row">Email</th>
      <td>{{$user->email}}</td>
      <td></td>
      <td></td>
    </tr>
    <tr>
    @if($user->phone != null)
    <th scope="row">Phone</th>
      <td>{{$user->phone}}</td>
      <td></td>
      <td></td>
    </tr>
    @else
    <th scope="row">Phone</th>
      <td>No Information</td>
      <td></td>
      <td></td>
    </tr>
    @endif

    @if($user->address != null)
    <th scope="row">Address</th>
      <td>{{$user->address}}</td>
      <td></td>
      <td></td>
    </tr>
    @else
    <th scope="row">Address</th>
      <td>No Information</td>
      <td></td>
      <td></td>
    </tr>
    @endif
  </tbody>
</table>
<h3 class="box-title"> Edit Information </h3>
<button type="button" class="btn btn-info"><a href="{{Route('edituser',$user->id)}}">Edit</a></button>


</div>
<br>
<div class="wrap-iten-in-cart">
  <h3 class="box-title"> History Order</h3>
  <ul class="products-cart">  
 
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date Order</th>
      <th scope="col">Shipping Name</th>
      <th scope="col">Shipping Address</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Email</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
       @php 
           $id =Session::get('user')->id;
           $count = 0 ;
           $order = DB::table('orders')->where('user_id','=',$id)->get();   
        @endphp
            @foreach($order as $item )
              @php
              $count++;
             @endphp
             @if($item->id >0)      
    <tr>
    
      <th scope="row">{{$count}}</th>
      <td>{{ $item->order_date }}</td>
      <td>{{ $item->shipping_name }}</td>
      <td>{{$item->shipping_address}}</td>
      <td>{{$item->shipping_phone}}</td>
      <td>{{ $item->shipping_email }}</td>
      @if ($item->status == 1  ) 
                  <td><span class="badge badge-success" style="background: green">Processing</span></td>   
                  @elseif ($item->status == 2 )   
                  <td><span class="badge badge-danger" style="background: rgb(255, 0, 0)">Cancel</span></td>   
                  @else
                  <td><span class="badge badge-warning" style="background: rgb(226, 226, 12)">Finish</span></td>    
                  @endif
      <td><button type="button" class="btn btn-outline-success"  ><a href="{{Route('history', $item->id)}}" >View</a></button></td>
      
    </tr>
    @else
    <tr>
      <td>No history order </td>
    </tr>   
    @endif 
    @endforeach
  </tbody>
</table>
   
        
    
     
   
      
   
  
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

@endsection

