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
          <li class="breadcrumb-item active">Send Mail</li>
        </ol>
      </div>  
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
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
                <h3 class="card-title">Compose New Message</h3>
              </div>
              <!-- /.card-header -->
              <form action="{{Route('admin.contact.process')}}" >
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <input class="form-control" placeholder="To:"  value = "{{$contact->email}}">
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Subject:" id="subject" name="subject">
                </div>
                <div class="form-group">
                    <textarea id="compose-textarea" class="form-control" style="height: 300px">
                     
                    </textarea>
                </div>
                <div class="form-group">
                  <div class="btn btn-default btn-file">
                    <i class="fas fa-paperclip"></i> Attachment
                    <input type="file" name="attachment">
                  </div>
                  <p class="help-block">Max. 32MB</p>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                </div>
              </div>
</form>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
</div>

</div>
</div>

<!-- Main content -->



</section>

@endsection