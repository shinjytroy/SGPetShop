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
          <li class="breadcrumb-item"><a href="{{ Route('admin.review.index') }}">Reviews</a></li>
          <li class="breadcrumb-item active">Edit review</li>
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
      <h3 class="card-title">Reviews</h3>

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
            <h3 class="card-title">Edit Review</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <form action="{{ Route('admin.review.update', $review->id) }}" method="post" class="card-body" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{ $review->id }}"/>
            <div class="form-group">
              @php
                $name_user = DB::table('users')->where('id',"=",$review->user_id)->value('name');
                $name_product = DB::table('products')->where('id','=', $review->product_id)->value('name');
                @endphp
              <label for="user_name">User Name</label>
             <div>{{ $name_user }}</div> 
            </div>
            <div class="form-group">
              <label for="product_name">Product Name</label>
              {{-- <input type="text" id="product_id" name="product_id" class="form-control" value="{{ $review->product_id }}"> --}}

             <div>{{ $name_product }}</div> 
            </div>
            <div class="form-group">
              <label for="review_name">review Name</label>
              <input type="text" id="review_name" name="review_name" class="form-control" value="{{ $review->review_name }}">
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea rows="4" cols="50" type="text" id="description" name="description" class="form-control" >{{$review->description}}</textarea>
            </div>
            <div class="form-group">
              <label for="is_accept">Status</label>
              <select id="is_accept" name="is_accept" class="form-control custom-select" required>
                <option value="1" {{ $review->is_accept!=null && $review->is_accept==1 ? 'selected' : ''}}>No Display</option>
                <option value="2" {{ $review->is_accept!=null && $review->is_accept==2 ? 'selected' : ''}}>Oke</option>
              </select>
            </div>
            <input type="submit" value="Update" class="btn btn-success">
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