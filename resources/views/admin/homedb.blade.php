@extends('admin.layout.layout')

@section('contents')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
      @if(Session::has('messagelogin'))
    <script>
      Swal.fire(
  'Welcome to Dashboard !!',
  'You clicked the button to continue!',
  'success'
    )
    </script>
   @endif
      @if (Session::get('user'))

        <h1 style="color:green"> Welcome :: {{Session::get('user')->name }}</h1>
        @endif	
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ Route('admin.homedb') }}">Home</a></li>
          <li class="breadcrumb-item active"> Manage </li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
            @php
            $countprods=count($prods);
            $countorder=count($order);
            $countcate=count($category);
            $countuser=count($user);
            @endphp
</section>
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$countorder}}</h3>

                <p>Total Order</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{Route('admin.order.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$countprods}}<sup style="font-size: 20px"></sup></h3>

                <p>Total Product in Shope </p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <a href="{{Route('admin.product.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>9999</h3>

                <p>Total Money </p>
              </div>
              <div class="icon">
                <i class="fas fa-usd"></i>
              </div>
              <a href="{{Route('admin.orderdetail.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$countuser}}</h3>

                <p>Total Member</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="{{Route('admin.user.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        
       
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$countcate}}<sup style="font-size: 20px"></sup></h3>

                <p>Total Category in Shope </p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <a href="{{Route('admin.category.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
      
        <!-- ./col -->
      
      </div>
</div>
      <!-- /.container-fluid -->
</section>
    



@endsection