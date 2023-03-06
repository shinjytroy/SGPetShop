
@extends('admin.layout.layout')

@section('contents')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Coupon</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ Route('admin.homedb') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ Route('admin.coupons.index') }}">Coupons</a></li>
          <li class="breadcrumb-item active">Create new Coupons</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Coupon</h3>

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
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Create new Coupon</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <form action="{{ Route('admin.coupons.store') }}" method="post" class="card-body" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="coupon_name">Coupon Name</label>
              <input type="text" id="code" name="code" class="form-control" value="">
            </div>
            <div class="form-group" >
                <label for="coupon_type" >Coupon Type</label>
                <select class="form-control" name="type" id="type" >
                    <option value="">Select</option>
                    <option >Fixed</option>
                    <option >Percent</option>
                </select>
            </div>
            <div class="form-group">
                <label for="coupon_value">Coupon Value</label>
                <input type="text" id="value" name="value" class="form-control">
            </div>
            <div class="form-group">
                <label for="cart_name">Cart Name</label>
                <input type="text" id="cart_value" name="cart_value" class="form-control" >
            </div>
            <input type="submit" value="Create" class="btn btn-success">
          </form>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
@endsection