@extends('layouts.site')
@section('main')
<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Đơn hàng của {{Auth::user()->name}}</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End All Pages -->
<!-- Start Category title -->
<br>
<div class="container">
<table class="table">
        <thead>
            <tr>
                <th style="width: 50px;">ID</th>
                <th>Tên khách hàng</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Tổng tiền</th>
                <th>Ngày đặt hàng</th>
                <th style="width: 100px;">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $key => $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->phone }}</td>           
            <td>{{ $order->address }}</td>
            <td>{{ number_format($order->total,0,'','.') }} VNĐ</td>
            <td>{{ $order->created_at }}</td>
            <td><a href="/projectlaravel/don-hang/view/{{ $order->id }}" style="color: #d65106;">Chi tiết</a></td>
        </tr>
        @endforeach
        </tbody>
</table>    
</div>
@endsection