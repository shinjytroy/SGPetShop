@extends('fe.layout')

@section('contents')
<main id="main" class="main-site left-sidebar">

<div class="container">

	<div class="wrap-breadcrumb">
		<ul>
			<li class="item-link"><a href="{{Route('home')}}" class="link">home</a></li>
			<li class="item-link"><span>Contact us</span></li>
		</ul>
	</div>
	<div class="row">
		<div class=" main-content-area">
			<div class="wrap-contacts ">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="contact-box contact-form">
						<h2 class="box-title">Leave a Message</h2>
						<form action="#" method="get" name="frm-contact">

							<label for="name">Name<span>*</span></label>
							<input type="text" value="" id="name" name="name" >

							<label for="email">Email<span>*</span></label>
							<input type="text" value="" id="email" name="email" >

							<label for="phone">Number Phone</label>
							<input type="text" value="" id="phone" name="phone" >

							<label for="comment">Comment</label>
							<textarea name="comment" id="comment"></textarea>

							<input type="submit" name="ok" value="Submit" >
							
						</form>
					</div>
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="contact-box contact-info">
						<div class="wrap-map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.32531626685!2d106.66410831465527!3d10.78637699231474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ed23c80767d%3A0x5a981a5efee9fd7d!2zNTkwIMSQLiBDw6FjaCBN4bqhbmcgVGjDoW5nIDgsIFBoxrDhu51uZyAxMSwgUXXhuq1uIDMsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1678074977607!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
							</div>
						</div>
						<h2 class="box-title">Contact Detail</h2>
						<div class="wrap-icon-box">

							<div class="icon-box-item">
								<i class="fa fa-envelope" aria-hidden="true"></i>
								<div class="right-info">
									<b>Email</b>
									<p>Adminshop@gmail.com</p>
								</div>
							</div>

							<div class="icon-box-item">
								<i class="fa fa-phone" aria-hidden="true"></i>
								<div class="right-info">
									<b>Phone</b>
									<p>0123-465-789-111</p>
								</div>
							</div>

							<div class="icon-box-item">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
								<div class="right-info">
									<b>Local Office</b>
									<p>FPT Aptech<br />590 Cach Mang Thang Tam, Ward 11, District 3, City. Ho Chi Minh City</p>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div><!--end main products area-->

	</div><!--end row-->

</div><!--end container-->

</main>
<!--main area-->


@endsection