@extends('admin.layout.layout')

@section('contents')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Brands</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ Route('admin.homedb') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ Route('admin.brand.index') }}">Brands</a></li>
          <li class="breadcrumb-item active">Edit Brand</li>
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
      <h3 class="card-title">Brands</h3>

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
            <h3 class="card-title">Edit Brand</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <form action="{{ Route('admin.brand.update', $brand->id) }}" method="post" class="card-body" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="category_id" value="{{ $brand->id }}"/>
            <div class="form-group">
              <label for="brand_name">Brand Name</label>
              <input type="text" id="brand_name" name="brand_name" class="form-control" value="{{ $brand->brand_name }}">
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea rows="4" cols="50" type="text" id="description" name="description" class="form-control" >{{$brand->description}}</textarea>
            </div>
            <div class="form-group">
              <label for="image">Image</label>
              <img src="{{asset('/images/'.$brand->brand_image_path)}}" width="150px" height="200px">
            <input type="file" id="image" name="photo" class="form-control-file" value="{{$brand->brand_image_path}}">
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