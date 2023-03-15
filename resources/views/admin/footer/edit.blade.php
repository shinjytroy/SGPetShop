@extends('admin.layout.layout')

@section('contents')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Footer</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ Route('admin.homedb') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ Route('admin.footer.index') }}">Footer</a></li>
          <li class="breadcrumb-item active">Edit Blogs</li>
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
      <h3 class="card-title">Footer</h3>

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
            <h3 class="card-title">Edit Footer</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <form action="{{ Route('admin.footer.update', $footer->id) }}" method="post" class="card-body">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{ $footer->id }}"/>
            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" id="address" name="address" class="form-control" value="{{ $footer->address }}">
            </div>
         
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="number" id="phone" name="phone" class="form-control" value="{{ $footer->phone }}" >
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" class="form-control" value="{{ $footer->email }}">
            </div>
            <div class="form-group">
              <label for="hotline">Hot Line</label>
              <input type="number" id="hotline" name="hotline" class="form-control" value="{{ $footer->hotline }}" >
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