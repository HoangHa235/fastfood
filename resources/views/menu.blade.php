@extends('layouts.site')
@section('main')
<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Thực đơn</h1>
				</div>
			</div>
		</div>
	</div>
</div>
	<!-- End All Pages -->
	
	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>{{ $title }}</h2>
						<p>Hãy nấu như nấu cho người mình thương yêu nhất</p>
					</div>
				</div>
			</div>
			<div class="dropdown" style="margin-bottom: 50px;">
				<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" style="background-color: #d65106;border-color: #d65106;;" aria-haspopup="true" aria-expanded="false">
					Sắp xếp sản phẩm
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<!-- <a class="dropdown-item" href="{{ request()->url() }}" style="color: #d65106;">Giá cơ bản</a> -->
					<a class="dropdown-item" href="{{request()->fullUrlWithQuery(['price' => 'asc'])}}" style="color: #d65106;">Giá thấp -> cao</a>
					<a class="dropdown-item" href="{{request()->fullUrlWithQuery(['price' => 'desc'])}}" style="color: #d65106;">Giá cao -> thấp</a>
				</div>
			</div>
			<div class="input-group" style="margin-bottom: 50px;">
				<input type="text" name="country_name" id="country_name" class="form-control " placeholder="Tìm kiếm sản phẩm">
				<div id="countryList" class="container"><br>
				
				</div>
				{{ csrf_field() }}
			</div>
			@include('products.list')
			<div class="text-center">
				{!! $products->links() !!}
			</div>
		</div>
	</div>
	<!-- End Menu -->
	<script>
		$(document).ready(function(){

		$('#country_name').keyup(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
			var query = $(this).val(); //lấy gía trị ng dùng gõ
			if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
			{
			var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
			$.ajax({
			url:"{{ route('search') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
			method:"POST", // phương thức gửi dữ liệu.
			data:{query:query, _token:_token},
			success:function(data){ //dữ liệu nhận về
			$('#countryList').fadeIn();  
			$('#countryList').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
			} 
		});
		}else {
			$('#countryList').html('');
		}
		});

		$(document).on('click', 'li', function(){  
			$('#country_name').val($(this).text());  
			$('#countryList').fadeOut();  
		});  

		});
	</script>
	
@endSection