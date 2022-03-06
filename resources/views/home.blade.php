@extends('layouts.site')
@section('main')
<!-- Start slides -->
<div id="slides" class="cover-slides">
		<ul class="slides-container">
			@foreach($sliders as $slider)
			<li class="text-left">
				<img src="{{url('public/uploads/')}}/{{$slider->thumb}}" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Welcome To <br> Fast Foood</strong></h1>
							<p class="m-b-40">Hãy nấu như nấu cho người mình thương yêu nhất.</p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="{{route('contact')}}">Liên hệ với chúng tôi</a></p>
						</div>
					</div>
				</div>
			</li>
			@endforeach
		</ul>
		<div class="slides-navigation">
			<a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
		</div>
	</div>
	<!-- End slides -->
	
	<!-- Start About -->
	<div class="about-section-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 text-center">
					<div class="inner-column">
						<h1>Welcome To <span>Fast Food</span></h1>
						<h4>Lịch sử hình thành</h4>
						<p>Fast Food có mặt tại thị trường Việt Nam từ năm 2020 và cho đến nay đang là một trong những thương hiệu dẫn đầu ngành công nghiệp ăn uống quốc nội với hơn 21 chuỗi cửa hàng tại hơn 30 tỉnh/thành trên cả nước.
						Thị trường Việt Nam được đánh giá là một trong những thị trường có tiềm năng lớn trong việc phát triển ngành F&B. Với mong muốn phát triển bền vững và củng cố vị thế hàng đầu của mình ở thị trường sôi động này, từ tháng 10.2020, Fast Food bắt đầu nhượng quyền thương hiệu để hợp tác cùng phát triển với các đối tác trên toàn quốc.
						Nếu quý anh/chị có nhu cầu tham gia nhượng quyền thương hiệu Fast Food, quý anh/chị có thể để lại thông tin ngay bên cạnh hoặc liên hệ qua hotline 0935386494 để chúng tôi có thể chủ động liên hệ lại với anh/chị..</p>
						<a class="btn btn-lg btn-circle btn-outline-new-white" href="{{ Route('member') }}">Giới thiệu</a>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<img src="{{url('public/site')}}/images/history-about.jpg" alt="" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
	<!-- End About -->
	
	<!-- Start QT -->
	<div class="qt-box qt-background">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ml-auto mr-auto text-center">
					<p class="lead ">
						" Chỉ bán khi bạn hài lòng. "
					</p>
					<span class="lead">Hoàng Hà</span>
				</div>
			</div>
		</div>
	</div>
	<!-- End QT -->
	
	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Món ăn mới nhất</h2>
						<p>Hãy nấu như nấu cho người mình thương yêu nhất.</p>
					</div>
				</div>
			</div>
			
			<div class="row inner-menu-box">				
				@include('products.list')
			</div>
			
		</div>
	</div>
	<!-- End Menu -->
	
	<!-- Start Gallery -->
	<div class="gallery-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Danh mục sản phẩm</h2>
						<p>Hãy nấu như nấu cho người mình thương yêu nhất.</p>
					</div>
				</div>
			</div>
			<div class="tz-gallery">
				<div class="row">
					@foreach($menus as $menu )
					<div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href="/projectlaravel/danh-muc/{{$menu->id}}-{{\Str::slug($menu->name,'-')}}.html" style="border: 3px solid white;">
							<h1 style="position: absolute;color:#d65106;font-family:Arial;"><strong>{{$menu->name}}</strong></h1>
							<img class="img-fluid" src="{{url('public/uploads')}}/{{$menu->thumb}}" style="height: 200px;width: 300px;">
						</a>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<!-- End Gallery -->
	
	<!-- Start Customer Reviews -->
	<div class="customer-reviews-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Phản hồi từ khách hàng</h2>
						<p>Hãy nấu như nấu cho người mình thương yêu nhất.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 mr-auto ml-auto text-center">
					<div id="reviews" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner mt-4">
							@foreach($commentones as $commentone)
							<div class="carousel-item text-center active">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="{{url('public/uploads')}}/{{$commentone->user->avata}}" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">{{$commentone->user->name}}</strong></h5>
								<h6 class="text-dark m-0">Nhân viên</h6>
								<p class="m-0 pt-3">{{$commentone->content}}</p>
							</div>
							@endforeach
							@foreach($comments as $comment)
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="{{url('public/uploads')}}/{{$comment->user->avata}}" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">{{$comment->user->name}}</strong></h5>
								<h6 class="text-dark m-0">Khách hàng</h6>
								<p class="m-0 pt-3">{{$comment->content}}</p>
							</div>
							@endforeach
						</div>
						<a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
							<i class="fa fa-angle-left" aria-hidden="true"></i>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
							<span class="sr-only">Next</span>
						</a>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Customer Reviews -->

@stop