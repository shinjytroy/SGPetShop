@extends('admin.layout.layout')
@section('contents')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Contact List Manage</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ Route('admin.homedb') }}">Home</a></li>
          <li class="breadcrumb-item active">Read Contact</li>
        </ol>
      </div>  
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <!-- Default box -->
<div class="card" >
    <div class="card-header">
      
               
      <h3 class="card-title">  Contact in List</h3>
      
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body p-0" >
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Read Mail</h3>

              <div class="card-tools">
                <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5>Mail Contact</h5>
                @foreach($contact as $item)
                <h6>From: {{$item->email}}
                  <span class="mailbox-read-time float-right">{{$item->created_at}}</span></h6>
              </div>
                     
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">



                <p>{{$item ->comment}}</p>
                @endforeach
              </div>
              <!-- /.mailbox-read-message -->
            </div>

            <!-- /.card-footer -->
            <div class="card-footer">
              <div class="float-right">
                <button type="button" class="btn btn-default">
                
                <a class="btn btn-info btn-sm" href="{{ Route('admin.contact.sendMail', $item->id) }}">
                <i class="fas fa-reply"></i>
                          Reply
                      </a>
              </button>
              
              </div>
              <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>



 
</section>
    </div> 


@endsection