@extends('fe.layout')
@section('contents')
@if(Session::has('messageupdate'))
    <script>
      Swal.fire(
  'Edit Success !!',
  'You clicked the button to continue!',
  'success'
    )
    </script>
   @endif
<div class="container">

<div class="wrap-breadcrumb">
  <ul>
    <li class="item-link"><a href="{{Route('home')}}" class="link">home</a></li>
    <li class="item-link"><span>Edit Information</span></li>

  </ul>
</div>
<div class=" main-content-area">

<h3 class="box-title"> Edit Information </h3>
<form action="{{ Route('processEditUser',$user->id )}} " method="post" >

@csrf
<input type="hidden" name="id" value=" {{$user->id }}"/>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{$user->name}}">
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{$user->email}}">
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter Phone" value="{{$user->phone}}">
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="{{$user->address}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>

  <input type="submit" value="Update" class="btn btn-success">
</form>



</div>






@endsection

