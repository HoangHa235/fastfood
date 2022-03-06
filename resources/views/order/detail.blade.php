@extends('layouts.site')
@section('main')
<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Chi tiết đơn hàng </h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End All Pages -->
<!-- Start Category title -->
<br>
<div class="container">
<div class="customer mt-3">
        <ul>
            <li> Tên khách hàng : <strong>{{$customer->name}}</strong> </li>
            <li> Số điện thoại : <strong>{{$customer->phone}}</strong> </li>
            <li> Địa chỉ : <strong>{{$customer->address}}</strong> </li>
            <li> Email : <strong>{{$customer->email}}</strong> </li>
            <li> Chi chú : <strong>{{$customer->content}}</strong> </li>
        </ul>
        <li style="margin-left: 75%;display: flex;"> <strong> Trạng thái đơn hàng :  </strong>
            <p style="margin-left: 10px;color: #00CC00;"> Đang giao hàng</p> 
        </li>
    </div>

<div class="carts">
@php $total =0; $alltotal = 0 @endphp
<table class="table" style="text-align: center;">
    <tbody>
        <tr class="table_head">
            <th class="column-1">Ảnh</th>
            <th class="column-2">Tên sản phẩm</th>
            <th class="column-3">Giá tiền</th>
            <th class="column-4">Số lượng</th>
            <th class="column-5">Tổng tiền</th>
            <th class="column-6"></th>
        </tr>
        @foreach($carts as $key=>$cart)
        @php
            $price = $cart->price * $cart->qty;
            $total += $price;
        @endphp
        <tr class="table_row">
            <td class="column-1" >
                <div class="how-itemcart1">
                    <img src="{{url('public/uploads')}}/{{$cart->product->thumb}}" alt="IMG" style="width: 100px;">
                </div>
            </td>
            <td class="column-2">{{$cart->product->name}}</td>
            <td class="column-3">{{number_format($cart->price,0,'','.')}}</td>
            <td class="column-4">{{$cart->qty}}</td>
            <td class="column-5">{{number_format($price,0,'','.')}}</td>
        </tr>
        @endforeach
        @php $alltotal += $total; @endphp
        <tr>
            <td colspan="4" class="text-right"><strong>Tổng cộng : </strong></td>
            <td>{{number_format($alltotal,0,'','.')}} VNĐ</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <button type="button" class="btn btn-primary btn-block" style="background-color: #006600;border-color: #006600;">
                    <a href="/projectlaravel/don-hang/remove/{{$customer->id}}" style="color: white;">Đã nhận được hàng</a>
                </button>
            </td>
        </tr>
    </tbody>
</table>
</div>
</div>
@endsection