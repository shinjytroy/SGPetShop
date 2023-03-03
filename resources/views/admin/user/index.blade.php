@extends('admin.layout.layout')

@section('contents')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Users</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ Route('admin.homedb') }}">Home</a></li>
          <li class="breadcrumb-item active">Users</li>
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
      <h3 class="card-title">Users : {{Session::get('user')->name }} </h3>

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
                  <th style="width: 15%">Email</th>
                  <th style="width: 15%">Full name</th>
                  <th style="width: 10%">Phone</th>
                  <th style="width: 15%">Address</th>
                  <th style="width: 10%" class="text-center">Role</th>
                  <th style="width: 10%">Password</th>
                  
                  <th></th>
              </tr>
          </thead>
          <tbody>
            @foreach($users as $item)
              <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->phone }}</td>
                  <td>{{ $item->address }}</td>
                  <td class="project-state">
                   @if(Session::get('user')->name == "Adminshop")
                   @if ($item->role != null && $item->role == 1 && $item->name !="Adminshop")
                        <span class="badge badge-danger">Admin-Staff</span>
                    @elseif ($item->role != null && $item->role == 1 && $item->name =="Adminshop")
                    <span class="badge badge-danger">Admin</span>
                    @else
                      <span class="badge badge-success">User</span>
                    @endif
                  </td>
                 <td>{{$item->password}}</td>
                  <td class="project-actions text-right">
                      <a class="btn btn-primary btn-sm" href="#">
                          <i class="fas fa-folder">
                          </i>
                          View
                      </a>
                      <a class="btn btn-info btn-sm" href="{{ Route('admin.user.edit', $item->id) }}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                      </a>
                      <form action="{{ Route('admin.user.destroy', $item->id) }}" method="post" style="display:inline-block">
                        @csrf
                        @method("delete")
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </button>
                      </form>
                  </td>
                 
                  @else
                  @if ($item->role != null && $item->role == 1 && $item->name !="Adminshop")
                        <span class="badge badge-danger">Admin-Staff</span>
                    @elseif ($item->role != null && $item->role == 1 && $item->name =="Adminshop")
                    <span class="badge badge-danger">Admin</span>
                    @else
                      <span class="badge badge-success">User</span>
                    @endif
                  </td>
                  <td>*****</td>
                 @if ($item->role != null   && $item->name !="Adminshop" )
                     
                  <td class="project-actions text-right">
                      <a class="btn btn-primary btn-sm" href="#">
                          <i class="fas fa-folder">
                          </i>
                          View
                      </a>
                      <a class="btn btn-info btn-sm" href="{{ Route('admin.user.edit', $item->id) }}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                      </a>
                      @if ($item->role ==2)
                      <form action="{{ Route('admin.user.destroy', $item->id) }}" method="post" style="display:inline-block">
                        @csrf
                        @method("delete")
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </button>
                      </form>
                      @endif
                    @endif
                  </td>
                  @endif
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