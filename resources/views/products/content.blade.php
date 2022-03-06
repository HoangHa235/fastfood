@extends('layouts.site')
@section('main')
<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Chi tiết sản phẩm</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End All Pages -->
<!-- Start Category title -->
<br>
<div class="container">
    <div class="bread-crumb">
        <a href="/projectlaravel/" style="color: #d65106;">
            Trang chủ 
            <i class="fa fa-angle-right" aria-hidden="true" style="color: black;"></i>
        </a>
        <a href="/projectlaravel/danh-muc/{{$product->menu->id}}-{{ \Str::slug($product->menu->name) }}.html" style="color: #d65106;">
            {{$product->menu->name}}
            <i class="fa fa-angle-right" aria-hidden="true"></i>
        </a>
        <span>
            {{ $title }}
        </span>
    </div>
</div>
<!-- End Category title -->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{url('public/uploads')}}/{{$product->thumb}}" alt="..." /></div>
            <div class="col-md-6">
            <h1 class="display-5 fw-bolder">{{$product->name}}</h1>
            <br>
             <p class="lead">{!! $product->content !!}</p>
            <span style="font-size:20px;"><b>Giá :</b> {!! \App\Helpers\Helper::price($product->price,$product->price_sale) !!}</span>
            <br>
            <br>
            <div class="d-flex">
            <form action="/projectlaravel/add-cart" method="post">
                <input class="form-control text-center me-3" name="num_product" id="num_product" type="num" value="1" style="max-width: 3rem" />
                @if($product->price != NULL)
                <button class="btn btn-outline flex-shrink-0" type="submit" style="background-color: #d65106;color:white;">
                <i class="bi-cart-fill me-1"></i>
                Mua hàng 
                </button>
                <input type="hidden" name="product_id" value="{{$product->id}}">
                @endif
                @csrf
            </form>
            </div>
            </div>
            <div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="heading-title text-center">
                <h2>Sản phẩm liên quan</h2>
            </div>
        </div>
        <div class="row inner-menu-box">
            @include('products.list')
        </div>
    </div>	
</div>
@endsection