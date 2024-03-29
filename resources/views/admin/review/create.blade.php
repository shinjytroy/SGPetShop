@extends('admin.layout.layout')

@section('contents')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Reviews</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ Route('admin.homedb') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ Route('admin.review.index') }}">reviews</a></li>
          <li class="breadcrumb-item active">Create new review</li>
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
      <h3 class="card-title">Review</h3>

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
            <h3 class="card-title">Create new review</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <form action="{{ Route('admin.review.store') }}" method="post" class="card-body" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="user_id">User Name</label>
              <select name="user_id" id="user_id" class="form-control">

              <option value="">Select User</option>
              @foreach ( $user as $item)
              <option value="{{ $item->id }}">{{ $item->name }}</option>
              @endforeach
            </select>
            </div>
            <div class="form-group">
              <label for="product_id">Product Name</label>
              <select name="product_id" id="product_id" class="form-control">
                <option value="">Select Product</option>
                @foreach ( $product as $item)
                <option value="{{ $item->id }}">{{  $item->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="review_name">Review Name</label>
              <input type="text" id="review_name" name="review_name" class="form-control">
            </div>
            <div class="form-group">
              <label for="desc">Description</label>
              <textarea id="desc" name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="is_accept">Status :</label>
              <select id="is_accept" name="is_accept" class="form-control custom-select" required>
                <option value="1">No Display</option>
                <option value="2" selected>Oke</option>
              </select>
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