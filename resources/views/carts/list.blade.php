@extends('layouts.site')

@section('main')
<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Giỏ hàng</h1>
				</div>
			</div>
		</div>
	</div>
</div>
	<!-- End All Pages -->
<form method="POST"> 
@if(count($products) != 0)
<div class="container pb-5 mt-n2 mt-md-n3">
    @php $total = 0; @endphp
    <div class="row">
        <div class="col-xl-9 col-md-8">
            <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-secondary"><a class="font-size-sm" href="/projectlaravel/danh-muc/tatca.html"><i class="fa fa-arrow-circle-left" style="font-size:24px;"></i> Tiếp tục mua hàng</a></h2>
            @foreach($products as $key=>$product)
            <!-- Item-->
            @php
                $price = $product->price_sale !=0 ? $product->price_sale : $product->price;
                $priceEnd = $price * $carts[$product->id];
                $total += $priceEnd;
            @endphp
            <div class="d-sm-flex justify-content-between my-4 pb-4 border-bottom">
                <div class="media d-block d-sm-flex text-center text-sm-left">
                    <a class="cart-item-thumb mx-auto mr-sm-4" href="#"><img src="{{url('public/uploads')}}/{{$product->thumb}}" alt="Product"></a>
                    <div class="media-body pt-3">
                        <h3 class="product-card-title font-weight-semibold border-0 pb-0"><a href="#">{{$product->name}}</a></h3>
                        <div class="font-size-lg text-primary pt-2">
                            <p style="color: #d65106;">{{$product->price_sale !=0 ? number_format($product->price_sale,0,'','.') : number_format($product->price,0,'','.')}}
                            VNĐ</p>
                        </div>
                    </div>
                </div>
                <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width: 10rem;">
                    <div class="form-group mb-2">
                        <label for="quantity1">Số lượng</label>
                        <input class="form-control form-control-sm" type="number" name="num_product[{{$product->id}}]" value="{{ $carts[$product->id]}}">
                        <label for="quantity1"><b>Thành tiền</b></label>
                        <p>{{number_format($priceEnd,0,'','.')}} VNĐ</p>
                    </div>
                    <a href="/projectlaravel/carts/delete/{{$product->id}}"><button class="btn btn-outline-danger btn-sm btn-block mb-2" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mr-1">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg>Xóa</button></a>
                </div>
            </div>
            @endforeach
        </div>
        @if(Auth::check())
        <!-- Sidebar-->
        <div class="col-xl-3 col-md-4 pt-3 pt-md-0">
            <h2 class="h6 px-4 py-3 bg-secondary text-center">Tổng cộng</h2>
            <div class="h3 font-weight-semibold text-center py-3">{{number_format($total,0,'','.')}} VNĐ</div>
            <hr>
            <form method="post">
            <h3 class="h6 pt-4 font-weight-semibold">Thông tin khách hàng</h3>
            <p>Tên : <b>{{Auth::user()->name}}</b></p>
            <input type="hidden" name="name" value="{{Auth::user()->name}}">
            <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
            <p>Email : <b>{{Auth::user()->email}}</b></p> 
            <input type="hidden" name="email" value="{{Auth::user()->email}}">
            <p>Số điện thoại : <b>0{{Auth::user()->phone}}</b></p>
            <input type="hidden" name="phone" value="{{Auth::user()->phone}}">
            <p>Địa chỉ :  <input type="text" name="address" value="{{Auth::user()->address}}"></p>          
            <h3 class="h6 pt-4 font-weight-semibold"><span class="badge badge-success mr-2">Note</span>Ghi chú</h3>
            <textarea class="form-control mb-3" name="content" rows="5"></textarea>
            <input type="hidden" name="total" value="{{$total}}">
            <button type="submit" formaction="/projectlaravel/carts" class="btn btn-primary btn-block" style="background-color: green;border-color: green;margin-bottom: 20px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card mr-2">
                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                    <line x1="1" y1="10" x2="23" y2="10"></line>
                </svg>Thanh toán</button>
            </form>
            <div class="pt-4">
                <div class="accordion" id="cart-accordion">
                <button type="submit" formaction="/projectlaravel/update-cart" class="btn btn-primary btn-block" style="background-color: #F3C246;border-color: #F3C246;margin-bottom: 20px;">
                    Cập nhật đơn hàng
                </button>
                @csrf
                <button class="btn btn-primary btn-block" style="background-color: red;border-color: red;">
                    <a href="/projectlaravel/carts/remove" style="color: white;">
                        Xóa đơn hàng
                    </a>
                </button>
                </div>
            </div>
        </div>
        @else
        <div class="col-xl-3 col-md-4 pt-3 pt-md-0">
            <h3 style="margin-top: 100px;">Bạn cần <a href="{{ route('login')}}" style="color: #fd7e14;">Đăng nhập</a> để tiến hành thanh toán</h3>
        </div>
        @endif
    </div>
</div>
@else
    <div class="container text-center" style="margin-top: 70px;margin-bottom: 70px;">
        <h2>Bạn chưa có sản phẩm nào trong giỏ hàng - <a href="/projectlaravel/danh-muc/tatca.html" style="color: #d65106;">Mua hàng</a></h2> 
    </div>
@endif
@endsection