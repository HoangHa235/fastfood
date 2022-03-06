@extends('layouts.site')
@section('main')
<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Tuyển dụng</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
<!-- Start blog -->
<div class="blog-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Tin tuyển dụng</h2>
						<p>Kết nối mọi người.</p>
					</div>
				</div>
			</div>
			<div class="row">
                @foreach($recruits as $key=>$recruit) 
				<div class="col-lg-4 col-md-6 col-12">
					<div class="card" style="width: 18rem;">
						<img class="card-img-top" src="{{url('public/uploads')}}/{{$recruit->thumb}}" alt="Card image cap" style="height: 16rem;">
						<div class="card-body">
							<h3><b>{{$recruit->name}}</b></h3>
							<ul style="color: orange;">
								<li><span>Đăng bởi: Fast Food</span></li>
								<li><span>Thời gian: {{$recruit->created_at}}</span></li>
							</ul>
							<p class="card-text">{!! $recruit->description !!}</p>
							<a href="/projectlaravel/chi-tiet-tin-tuyen-dung/{{$recruit->id}}-{{ Str::slug($recruit->name,'-')}}.html" class="btn btn-lg btn-circle btn-outline-new-white" href="#">Xem chi tiết</a>
						</div>
					</div>
				</div>
                @endforeach
			</div>
		</div>
	</div>
	<!-- End blog -->
	
	
	
@stop