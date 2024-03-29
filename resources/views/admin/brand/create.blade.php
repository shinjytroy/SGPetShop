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
          <li class="breadcrumb-item active">Create new Brand</li>
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
      <h3 class="card-title">Brand</h3>

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
            <h3 class="card-title">Create new Brand</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <form action="{{ Route('admin.brand.store') }}" method="post" class="card-body" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="brand_name">Brand Name</label>
              <input type="text" id="brand_name" name="brand_name" class="form-control">
              <span style="color:red"> @error('brand_name'){{$message}}@enderror</span>
            </div>
            <div class="form-group">
              <label for="desc">Description</label>
              <textarea id="desc" name="description" class="form-control"></textarea>
              <span style="color:red"> @error('description'){{$message}}@enderror</span>
            </div>
            <div class="form-group">
              <label for="brand_image_path">Image</label>
              <input type="file" id="brand_image_path" name="photo" class="form-control">
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