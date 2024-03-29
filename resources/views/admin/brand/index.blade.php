@extends('admin.layout.layout')

@section('contents')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Brand List Manage</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ Route('admin.homedb') }}">Home</a></li>
          <li class="breadcrumb-item active">Brands</li>
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
      
                @php
                $countBrand = count($brand);
                @endphp
      <h3 class="card-title">Having : {{$countBrand}}  Categories in List</h3>
      
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
      @if(Session::has('messageupdate'))
      <script>
        Swal.fire(
    'Update Success !!',
    'You clicked the button to continue!',
    'success'
      )
      </script>
     @endif
  
     @if(Session::has('messagedelete'))
      <script>
        Swal.fire(
    'Delete Success !!',
    'You clicked the button to continue!',
    'success'
      )
      </script>
     @endif
     @if(Session::has('messagecreate'))
      <script>
        Swal.fire(
    'Create Success !!',
    'You clicked the button to continue!',
    'success'
      )
      </script>
     @endif
      <table class="table table-striped projects">
          <thead>
              <tr>
                  <th style="width: 10%">Id</th>
                  <th style="width: 20%">Brand Name</th>
                  <th style="width: 30%">Description</th>
                  <th>Image</th>
                  <th></th>
              </tr>
          </thead>
          <tbody>
            @foreach($brand as $item)
              <tr>
                  <td>{{ $item->id }}</td>   
                  <td>{{ $item->brand_name }}</td>
                  <td>{{ $item->description }}</td>
                  <td>
                    @if (!empty($item->brand_image_path))
                    <img src="{{asset('images/'.$item->brand_image_path)}}" alt="{{$item->brand_name}}" style="width: 100px; height:auto">
                    @endif
                  </td>
                  <td class="project-actions text-right">
                    
                      <!-- <a class="btn btn-primary btn-sm" href="#">
                          <i class="fas fa-folder">
                          </i>
                          View
                      </a> -->
                      <a class="btn btn-info btn-sm" href="{{ Route('admin.brand.edit', $item->id) }}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                      </a>
                      <form action="{{ Route('admin.brand.destroy', $item->id) }}" method="post" style="display:inline-block">
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