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
          <li class="breadcrumb-item active">Footer</li>
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
      <h3 class="card-title">Footer </h3> 
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

      <table class="table table-striped projects">
          <thead>
              <tr>
              <th style="width: 15%">Id</th>    
                  <th style="width: 30%">Address</th>
                  <th style="width: 15%">Phone</th>                 
                  <th style="width: 20%">Email</th>     
                  <th style="width: 15%">Hot Line</th>                              
                  <th></th>
              </tr>
          </thead>
          <tbody>
            @foreach($footers as $item)
              <tr>
              <td>{{ $item-> id }}</td>
                  <td>{{ $item-> address }}</td>
                  <td>{{ $item-> phone }}</td>
                  <td>{{ $item-> email }}</td> 
                  <td>{{ $item-> hotline }}</td>                                            
                  <td class="project-actions text-right">
                     
                      <a class="btn btn-info btn-sm" href="{{ Route('admin.footer.edit', $item->id) }}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                      </a>
                      
                  </td>
              </tr>
            @endforeach
          </tbody>
      </table>
    </div>
 
  </div>
  

</section>
@endsection