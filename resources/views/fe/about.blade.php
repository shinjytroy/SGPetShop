@extends('fe.layout')

@section('contents')
<main id="main" class="main-site">

<div class="container">

	<div class="wrap-breadcrumb">
		<ul>
			<li class="item-link"><a href="{{Route('home')}}" class="link">home</a></li>
			<li class="item-link"><span>Contact us</span></li>
		</ul>
	</div>
</div>

<div class="container">
	<!-- <div class="main-content-area"> -->
		
		<div class="aboutus-info style-center">
			<b class="box-title">Interesting Facts</b>
			<p class="txt-content">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the dummy text ever since the 1500s, when an unknown printer took a galley of type</p>
		</div>
		
		<div class="row equal-container">
			
		@foreach($blogs as $item)
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="aboutus-box-score equal-elem ">
					<b class="box-score-title">{{$item->title}}</b>
					<span class="sub-title">{{$item->sub_title}}</span>
					<p class="desc">{{$item->description}}</p>
				</div>
			</div>
			@endforeach
			
		</div>
		

		<div class="row">
			@foreach($infors as $item)
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="aboutus-info style-small-left">
					<b class="box-title">{{$item->title}}</b>
					<p class="txt-content">{{$item->content}}</p>
				</div>
				
			</div>

			@endforeach
</div>
<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="aboutus-info style-small-left">
					<b class="box-title">Cooperate with Us!</b>
					<div class="list-showups">
						<label>
							<input type="radio" class="hidden" name="showup" id="shoup1" value="shoup1" checked="checked">
							<span class="check-box"></span>
							<span class='function-name'>Support 24/7</span>
							<span class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry...</span>
						</label>
						<label>
							<input type="radio" class="hidden" name="showup" id="shoup2" value="shoup2">
							<span class="check-box"></span>
							<span class='function-name'>Best Quanlity</span>
							<span class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry...</span>
						</label>
						<label>
							<input type="radio" class="hidden" name="showup" id="shoup3" value="shoup3">
							<span class="check-box"></span>
							<span class='function-name'>Fastest Delivery</span>
							<span class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry...</span>
						</label>
						<label>
							<input type="radio" class="hidden" name="showup" id="shoup4" value="shoup4">
							<span class="check-box"></span>
							<span class='function-name'>Customer Care</span>
							<span class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry...</span>
						</label>
					</div>
				</div>
			</div>
		</div>

		<div class="our-team-info">
			<h4 class="title-box">Our teams</h4>
			<div class="our-staff">
				<div 
					class="slide-carousel owl-carousel style-nav-1 equal-container" 
					data-items="5" 
					data-loop="false" 
					data-nav="true" 
					data-dots="false"
					data-margin="30"
					data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"4"}}' >
					@foreach($mems as $item)
					<div class="team-member equal-elem">
						<div class="media">
							<a href="#" title="{{$item->name}}">
								<figure><img src="{{ asset('/images/'. $item->image) }}" alt="{{$item->name}}" style="width:200 ; height:400px"></figure>
							</a>
						</div>
						<div class="info">
							<b class="name">{{$item->name}}</b>
							<span class="title">{{$item->position}}</span>
							<p class="age">Year Of Birth :{{$item->age}}</p>
							<p class="desc">{{$item->description}}</p>
						</div>
					</div>	
					@endforeach		
				</div>

			</div>

		</div>
	<!-- </div> -->
	

</div><!--end container-->

</main>
<!--main area-->


@endsection