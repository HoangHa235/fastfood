@extends('layouts.site')
@section('main')
<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Thành viên</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Stuff -->
	<div class="stuff-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Đội ngũ nhân viên</h2>
						<p>Chất lượng là sự bảo đảm tốt nhất lòng trung thành của khách hàng</p>
					</div>
				</div>
			</div>
			<div class="row" style="margin: 0 auto;">
                @foreach($members as $key=>$member)
                <div class="col-md-4 col-sm-6">
                    <div class="our-team">
                        <div class="pic">
                            <img src="{{url('public/uploads')}}/{{$member->avata}}" style="height: 300px;">
                            <ul class="social">
                                <li><a href="#" class="fa fa-facebook"></a></li>
                                <li><a href="#" class="fa fa-google-plus"></a></li>
                                <li><a href="#" class="fa fa-instagram"></a></li>
                                <li><a href="#" class="fa fa-linkedin"></a></li>
                            </ul>
                        </div>
                        <div class="team-content">
                            <h3 class="title">{{$member->name}}</h3>
                            <span class="post">Nhân viên</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
		</div>
	</div>
	<!-- End Stuff -->
	
	
    @stop