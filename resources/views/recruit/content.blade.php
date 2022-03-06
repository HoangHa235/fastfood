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
<!-- Start blog details -->
<div class="blog-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>{{ $title }}</h2>
						<p>{{$recruit->updated_at}}</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-8 col-lg-8 col-12">
					<div class="blog-inner-details-page">
						<div class="blog-inner-box">
							<div class="side-blog-img">
								<img class="img-fluid" src="{{url('public/uploads/')}}/{{$recruit->thumb}}" alt="">							
								<div class="date-blog-up">
									HOT
								</div>
							</div>
							<div class="inner-blog-detail details-page">
							<ul style="text-align: right;">
								<li><i class="zmdi zmdi-account"></i>Đăng bởi : <span>Fast Food</span></li>
							</ul>
								<h4>{!!$recruit->description !!}</h4>
								<p>{!! $recruit->content !!}</p>
							</div>
						</div>
						<div class="blog-comment-box">
							<h3>Bình luận </h3>
							@foreach($comments as $key => $comment)
							<div class="comment-item">
								<div class="comment-item-left">
									<img src="{{url('public/uploads')}}/{{$comment->user->avata}}" style="border-radius: 50%;width: 60px;height: 60px;">
								</div>
								<div class="comment-item-right">
									<div class="pull-left">
										<a href="#">{{$comment->user->name}}</a>
									</div>
									<div class="pull-right">
										<i class="fa fa-clock-o" aria-hidden="true"></i>Thời gian : <span>{{date('d/m/Y H:i',strtotime($comment->created_at))}}</span>
									</div>
									<div class="des-l">
										<p>{{$comment->content}} <a href="/projectlaravel/chi-tiet-tin-tuyen-dung/{{$comment->id}}" style="color: red;text-align: right;"> - Xóa</a></p>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						@if(Auth::guard('web')->check())
						<div class="comment-respond-box">
							<h3>Viết bình luận </h3>
							<div class="comment-respond-form">
								<form  class="comment-form-respond row" action="" method="post"> 
								<img class="col-lg-2 col-md-2 col-sm-2" src="{{url('public/uploads')}}/{{Auth::user()->avata}}" style="border-radius: 50%;height: 100px;width: 100px;">
									<div class="col-lg-8 col-md-8 col-sm-8">
										<input name="recruit_id" type="hidden" value="{{$recruit->id}}">
										<input name="user_id" type="hidden" value="{{Auth::user()->id}}">
										<div class="form-group">
											<textarea class="form-control" id="content" name="content" placeholder="Viết bình luận...." rows="2"></textarea>
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12" style="text-align: right;">
										<button type="submit" class="btn btn-primary" style="background-color: #d65106;" id="btnGui">Đăng</button>
									</div>
									@csrf
								</form> 
							</div>
						</div>
						@endif
					</div>
				</div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8 col-12 blog-sidebar">
                    <img src="{{url('public/site')}}/images/fastfood1.jpg" style="width: 100%;">
                    <br><br>
                    <img src="{{url('public/site')}}/images/fastfood2.jpg" style="width: 100%;">
                </div>
            </div>
        </div>
</div>
@endsection
<script>
	$('#btn-comment').click(function(ev){
		ev.preventDefault();
		let content = $('#comment-content').val();
		console.log(content)
	})
</script>