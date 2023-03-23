@extends('admin.layout.layout')

@section('contents')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Order List Manage</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ Route('admin.homedb') }}">Home</a></li>
          <li class="breadcrumb-item active">Order List</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
        @php
        $countorder=count($order);      
        @endphp
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Having : {{$countorder}} in  Order List</h3>

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
              <th style="width: 5%">Id</th>
                  <th style="width: 5%">User_Name</th>
                  <th style="width: 10%">order_date</th>
                  <th style="width: 10%">shipping_name</th>  
                  <th style="width: 10%">shipping_phone</th>
                  <th style="width: 15%">shipping_email</th>
                  <th style="width: 25%">shipping_address</th>   
                  <th style="width: 10%">payment</th>  
                  <th style="width: 10%">Status</th>                
                  <th>

                  </th>
              </tr>
          </thead>

          <tbody>
            @foreach($order as $item)
            @php
            $userName = DB::table('users')->where('id',"=",$item->user_id)->value('name');  

            @endphp
              <tr>
              <td>{{ $item->id }}</td>   
                  <td>{{ $userName }}</td>   
                  <td>{{ $item->order_date }}</td>
                  <td>{{ $item->shipping_name}}</td>
                  <td>{{ $item->shipping_phone}}</td>
                  <td>{{ $item->shipping_email}}</td>
                  <td>{{ $item->shipping_address}}</td>        
                  <td>{{ $item->payment}}</td>   
                  @if ($item->status == 1  ) 
                  <td><span class="badge badge-success">Processing</span></td>   
                  @elseif ($item->status == 2 )   
                  <td><span class="badge badge-danger">Cancel</span></td>   
                  @else
                  <td><span class="badge badge-warning">Finish</span></td>    
                  @endif

                  <td class="project-actions text-right">      
                      <a class="btn btn-info btn-sm" href="{{ Route('admin.orderdetail.view', $item->id) }}">
                          <i class="fas fa-pencil-alt">
                          </i>
                          View
                      </a>                 
                  </td>
                  <td class="project-actions text-right">      
                    <a class="btn btn-info btn-sm" href="{{ Route('admin.order.edit', $item->id) }}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </>                 
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