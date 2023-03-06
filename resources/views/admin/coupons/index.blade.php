@@ -0,0 +1,99 @@
@extends('admin.layout.layout')

@section('contents')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Coupons List Manage</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-coupon"><a href="{{ Route('admin.homedb') }}">Home</a></li>
          <li class="breadcrumb-coupon active">Coupon List</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
        {{-- @php
        $countorder=count($order);      
        @endphp --}}
  <div class="card">
    <div class="card-header">
      {{-- <h3 class="card-title">Having : {{$countorder}} in  Order List</h3> --}}

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body p-0">
      <table class="table table-striped projects">
          <thead>
              <tr>
                  <th style="width: 5%">ID</th>
                  <th style="width: 15%">Coupon Code</th>
                  <th  style="width: 15%">Coupon Type</th>  
                  <th style="width: 15%">Coupon Value</th>
                  <th style="width: 20%">Cart Value</th>                 
                  <th>

                  </th>
              </tr>
          </thead>

          <tbody>
            @foreach($coupons as $coupon)
              <tr>
                  <td>{{ $coupon->id }}</td>   
                  <td>{{ $coupon->code }}</td>
                  <td>{{ $coupon->type}}</td>
                  @if($coupon->type == 'fixed')
                    <td>${{ $coupon->value}}</td>
                  @else
                    <td>{{ $coupon->value}}%</td>
                  @endif
                  <td>{{ $coupon->cart_value}}</td>   
                  <td class="project-actions text-right">
                    
                      <!-- <a class="btn btn-primary btn-sm" href="#">
                          <i class="fas fa-folder">
                          </i>
                          View
                      </a> -->
                      <a class="btn btn-info btn-sm" href="{{ Route('admin.coupons.edit', $coupon->id) }}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                      </a>
                      <form action="{{ Route('admin.coupons.destroy', $coupon->id) }}" method="post" style="display:inline-block">
                        @csrf
                        @method("delete")
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </button>
                      </form>
                  </td>
              </tr>
            @endforeach
          </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
@endsection