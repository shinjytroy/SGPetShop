@extends('admin.layout.layout')

@section('contents')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>OrderDetail List Manage</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ Route('admin.homedb') }}">Home</a></li>
          <li class="breadcrumb-item active">Order Detail</li>
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
      <h3 class="card-title">OrderDetail List </h3>


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
                  <th style="width: 10%">Product Id</th>
                  <th style="width: 20%">Order Id</th>
                  <th style="width: 20%">Price</th>  
                  <th style="width: 10%">Quantity</th>
                  <th>
                  Total Money
                  </th>
                  
                  <th>

                  </th>
              </tr>
          </thead>
          <tbody>
            @foreach($ord as $item)
              <tr>
                  <td>{{ $item->product_id }}</td>   
                  <td>{{ $item->order_id }}</td>
                  
                  <td>{{ number_format($item->price) }}</td>
                  <td>{{ $item->quantity }}</td>
                  <td>{{ number_format($item->price * $item->quantity) }}</td>              
                  <td class="project-actions text-right">
            
                      <!-- <a class="btn btn-primary btn-sm" href="#">
                          <i class="fas fa-folder">
                          </i>
                          View
                      </a> -->
                      <a class="btn btn-info btn-sm" href="#">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                      </a>
                      <form action="#" method="post" style="display:inline-block">
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