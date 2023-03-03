@extends('fe.layout')

@section('contents')
<div class="container">

<div class="wrap-breadcrumb">
  <ul>
    <li class="item-link"><a href="{{Route('home')}}" class="link">home</a></li>
    <li class="item-link"><span>Register</span></li>
  </ul>
</div>
<div class="row">
  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">							
    <div class=" main-content-area">
      <div class="wrap-login-item ">
        <div class="register-form form-item ">
          <form class="form-stl" name="frm-login" action="{{Route('createregister')}}" method="post" >
          @csrf
            <fieldset class="wrap-title">
              <h3 class="form-title">Register a new membership</h3>
              <h4 class="form-subtitle">Personal infomation</h4>
            </fieldset>									
            <fieldset class="wrap-input">
              <label for="frm-reg-lname">Full Name :</label>
              <span style="color:red"> @error('name'){{$message}}@enderror</span>
              <input type="text"  id="name" name="name" placeholder="Greater than  3 character" placeholder="Last name*">
            </fieldset>
            <fieldset class="wrap-input">
              <label for="frm-reg-email">Email Address :</label>
              <span style="color:red"> @error('email'){{$message}}@enderror</span>
              <input type="email"id="email" name="email" placeholder="Example: abc@gmail.com">
            </fieldset>
            <fieldset class="wrap-input">
              <label for="frm-reg-password">Password :</label>
              <span style="color:red"> @error('password'){{$message}}@enderror</span>
              <input type="password"id="password" name="password" placeholder="From [6-12] character ">
            </fieldset>
            <fieldset class="wrap-input">
              <label for="frm-reg-password">Confirm Password :</label>
              <span style="color:red"> @error('confirm'){{$message}}@enderror</span>
              <input  type="password"  id="confirm" name="confirm"   placeholder="Comfirm password">
            </fieldset>
            <fieldset class="wrap-input">
              <label for="frm-reg-password">Phone :</label>
              <span style="color:red"> @error('phone'){{$message}}@enderror</span>
              <input type="number" id="phone" name="phone" class="form-control" placeholder="Phone Number">
            </fieldset>
            <fieldset class="wrap-input">
              <label for="frm-reg-password">Address :</label>
              <span style="color:red"> @error('address'){{$message}}@enderror</span>
              <input type="text" id="address" name="address" placeholder="Address">
            </fieldset>
            <fieldset class="wrap-input">                        
              <input type="hidden" id="role" name="role" class="form-control" value="2">
            </fieldset>
            <input type="submit" class="btn btn-sign" value="Register" name="register">
            <a class="btn btn-submit" href="{{Route('login')}}">Log In Here</a>
          </form>
        </div>											
      </div>
    </div><!--end main products area-->		
  </div>
</div><!--end row-->

</div><!--end container-->
     
@endsection