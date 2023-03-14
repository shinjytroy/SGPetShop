@extends('admin.layout.layout')

@section('contents')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Member</h1>      
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ Route('admin.homedb') }}">Home</a></li>
          <li class="breadcrumb-item active">Member</li>
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
      <h3 class="card-title">Member : </h3>
    
      <div class="card-tools">
        <a class="btn btn-info btn-sm" href="{{ Route('admin.member.create')}}">
          <i class="fas fa-plus">
          </i>
          Create New
      </a>
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
                  <th style="width: 15%">Name</th>
                  <th style="width: 15%">Position</th>
                  <th style="width: 15%">Year of Birth</th>
                  <th style="width: 20%">Image</th>
                  <th style="width: 15%">Description</th>                                 
                  <th></th>
              </tr>
          </thead>
          <tbody>
            @foreach($mems as $item)
              <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->position }}</td>
                  <td>{{ $item->age }}</td>
                  <td>
                    @if (!empty($item->image))
                    <img src="{{asset('images/'.$item->image)}}" alt="{{$item->name}}" style="width: 100px; height:auto">
                    @endif
                  </td>
                  <td>{{ $item->description }}</td>               
                  <td class="project-actions text-right">
                     
                      <a class="btn btn-info btn-sm" href="{{ Route('admin.member.edit', $item->id) }}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                      </a>
                      <form action="{{ Route('admin.member.destroy', $item->id) }}" method="post" style="display:inline-block">
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
 
  </div>
  

</section>
@endsection