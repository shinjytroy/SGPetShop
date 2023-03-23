@extends('fe.layout')

@section('contents') 
@if(Session::has('messagesuccess'))
    <script>
      Swal.fire(
  'You have successfully registered !!',
  'You clicked the button to continue!',
  'success'
    )
    </script>
   @endif
@if(Session::has('messagelogout'))
    <script>
 const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Log Out successfully'
})
    </script>
    @endif

@if(Session::has('messagelogin'))
    <script>
     Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Email or Password wrong! Please input again',
  
})
    </script>
    @endif
<div class="container">

<div class="wrap-breadcrumb">
  <ul>
    <li class="item-link"><a href="{{Route('home')}}" class="link">home</a></li>
    <li class="item-link"><span>login</span></li>
  </ul>
</div>   
    <div class="login-form-btr">
      <form action="{{ Route('checkLogin') }}"method="post">
        @csrf
        <h2 class="text-center">Sign in</h2> 
          
        <div class="form-grouped">
        	  <div class="input-grouped">
               <label>Email Address : </label>
                <input type="text" class="form-control" name="email" placeholder="Type your email address" required="required">				
            </div>
        </div>
		  <div class="form-grouped">
            <div class="input-grouped">
            <label>Password : </label>
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">				
            </div>
        </div>    
        <br>    
        <div class="form-grouped">
            <button type="submit" class="btn btn-primary login-btn btn-block">Sign in</button>
        </div>
        <div class="clearfix">
            <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
            <a href="#" class="float-right">Forgot Password?</a>
        </div>
		<div class="or-seperator"><i>or</i></div>
        <p class="text-center">Login with your social media account</p>
        <div class="text-center social-btn">
            <a href="{{Route('githublogin')}}" class="btn btn-info"><i class="fa fa-github"></i>&nbsp; GitHUB</a>
			 <a href="{{Route('googlelogin')}}" class="btn btn-danger"><i class="fa fa-google"></i>&nbsp; Google</a>
        </div>
    </form>
    <p class="text-center text-muted small">Don't have an account? <a href="{{Route('register')}}">Sign up here!</a></p>
        </div>
   
</div>

<style>
.login-form-btr {
    width: 400px;
    margin: 30px auto;
}
.login-form-btr form {        
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form-btr h2 {
    margin: 0 0 15px;
}
.form-control, .login-btn {
    border-radius: 2px;
}
.input-grouped-prepend .fa {
    font-size: 18px;
}
.login-btn {
    font-size: 15px;
    font-weight: bold;
  	min-height: 40px;
}
.social-btn .btn {
    border: none;
    margin: 10px 3px 0;
    opacity: 1;
}
.social-btn .btn:hover {
    opacity: 0.9;
}
.social-btn .btn-secondary, .social-btn .btn-secondary:active {
    background: #507cc0 !important;
}
.social-btn .btn-info, .social-btn .btn-info:active {
    background: #64ccf1 !important;
}
.social-btn .btn-danger, .social-btn .btn-danger:active {
    background: #df4930 !important;
}
.or-seperator {
    margin-top: 20px;
    text-align: center;
    border-top: 1px solid #ccc;
}
.or-seperator i {
    padding: 0 10px;
    background: #f7f7f7;
    position: relative;
    top: -11px;
    z-index: 1;
}   
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

@endsection