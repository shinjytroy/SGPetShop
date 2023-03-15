@extends('admin.layout.layout')

@section('contents')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Review List Manage</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ Route('admin.homedb') }}">Home</a></li>
          <li class="breadcrumb-item active">Contact</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  @if(Session::has('messagedelete'))
  <script>
    Swal.fire(
'Delete Success !!',
'You clicked the button to continue!',
'success'
  )
  </script>
 @endif
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      
                @php
                $countreview = count($contacts);
                @endphp
      <h3 class="card-title">Having : {{$countreview}}  Contacts in List</h3>
      
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
                  <th style="width: 10%">Id</th>
                  <th style="width: 10%">Name</th>
                  <th style="width: 15%">Email</th>
                  <th style="width: 10%">Phone</th>
                  <th style="width: 40%">Comment</th>
                  <th style="width: 10%">Created_at</th>
                  

                  <th></th>
              </tr>
          </thead>
          <tbody>
            @foreach($contacts as $item)
              <tr>
                  <td>{{ $item->id }}</td>  
                  <td>{{ $item->name }}</td>  
                  <td>{{ $item->email }}</td>  
                  <td>{{ $item->phone }}</td>
                  <td>{{ $item->comment }}</td>
                  <td>{{ $item->created_at }}</td>
              <td></td>
                 
                  <td class="project-actions text-right">
                      <form action="{{ Route('admin.contact.destroy', $item->id) }}" method="post" style="display:inline-block">
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