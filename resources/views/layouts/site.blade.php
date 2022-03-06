<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	@include('head')
</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="{{route('home.index')}}">				
					<img src="{{url('public/site')}}/images/Capture.png" alt="" style="height: 90px;width: 120px;" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="{{route('home.index')}}">Trang chủ</a></li>
						<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Thực đơn</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">							
								{!! \App\Helpers\Helper::menus($menus) !!}
							</div>
						</li>
						<li class="nav-item"><a class="nav-link" href="{{route('tin-tuc-tuyen-dung')}}">Tuyển dụng</a></li>
						<li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Liên hệ</a></li>
						<li class="nav-item"><a class="nav-link" href="/projectlaravel/carts"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
							<sup> ({{ !is_null(Session::get('carts')) ? count(Session::get('carts')) : 0}}) </sup>Giỏ hàng</a></li>
						@if(Auth::check())
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" id="dropdown-a" data-toggle="dropdown"><img src="{{url('public/uploads')}}/{{Auth::user()->avata}}" style="height: 40px;width: 40px;border-radius: 50%;margin-right: 10px;">{{Auth::user()->name}}</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-a">
								<a class="dropdown-item" href="/projectlaravel/thong-tin-ca-nhan/{{Auth::user()->id}}">Thông tin cá nhân</a>
								<a class="dropdown-item" href="{{ Route('order')}}">Đơn hàng của tôi</a>
								<a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a>
							</div>
						</li>
						@else
						<li class="nav-item"><a class="nav-link" href="{{route('login')}}">Đăng nhập</a></li>
						@endif
						
						<!-- <li class="nav-item"><a class="nav-link" href="/projectlaravel/admin/users/login">Đăng nhập</a></li> -->
						
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
    @yield('main')
	<!-- Start Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4 arrow-right">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>Điện thoại</h4>
						<p class="lead">
							0935386494
						</p>
					</div>
				</div>
				<div class="col-md-4 arrow-right">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Email</h4>
						<p class="lead">
							hha.20it10@vku.udn.vn
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Địa chỉ</h4>
						<p class="lead">
							470 Trần Đại Nghĩa
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->
	<!-- Start Footer -->
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>Về chúng tôi</h3>
					<p>Được thành lập vào năm 2020, Live Dinner hiện là chuỗi nhà hàng thức ăn nhanh lớn nhất. Mỗi ngày, có hơn 10 nghìn thực khách đến với các nhà hàng Live Dinner trên khắp Việt Nam để thưởng thức các món ăn chất lượng cao, hương vị tuyệt hảo và giá cả phải chăng.</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Đặt hàng</h3>
					<div class="subscribe_form">
						<form class="subscribe_form">
							<input name="EMAIL" id="subs-email" class="form_input" placeholder="Email Address..." type="email">
							<button type="submit" class="submit">Đặt mua</button>
							<div class="clearfix"></div>
						</form>
					</div>
					<ul class="list-inline f-social">
						<li class="list-inline-item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Thông tin liên hệ</h3>
					<p class="lead">470 Trần Đại Nghĩa, Đà Nẵng</p>
					<p class="lead"><a href="#">0935386494</a></p>
					<p><a href="#">hha.20it10@vku.udn.vn</a></p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Thời gian mở cửa</h3>
					<p><span class="text-color">Thứ 2 : </span>9:00-21:00</p>
					<p><span class="text-color">Thứ 3-4 :</span>10:00 - 21:00</p>
					<p><span class="text-color">Thứ 5-6 :</span>10:00 - 21:00</p>
					<p><span class="text-color">Thứ 7-CN :</span>7:00 - 20:00</p>
				</div>
			</div>
		</div>
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">All Rights Reserved. &copy; 2018 <a href="#">Live Dinner Restaurant</a> Design By : 
					<a href="https://html.design/">html design</a></p>
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

	@include('footer')
</body>
</html>