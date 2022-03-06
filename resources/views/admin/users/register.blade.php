<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{url('public/ad123/css')}}/login.css">
</head>
<body style="background-color: #d65106;">
<body id="particles-js"></body>
<div class="animated bounceInDown">
  <div class="container" style="background-color: white;border-top: 10px solid #d65106;">
    <span class="error animated tada" id="msg" ></span>
    @include('admin.users.alert')
    <form name="form1" action="" method="POST" class="box" enctype="multipart/form-data">
      <h4 style="margin-top: 10px;color: #d65106;"><b>FAST FOOD</b></h4><h5 style="color: #d65106;"><span> Thức ăn nhanh</span></h5>
        <input type="text" name="name" placeholder="Tên"  style="background-color: white;color:black;margin-top:-50px;border: 1px solid #d65106;"><br><br>
        <input type="text" name="email" placeholder="Email"  style="background-color: white;color:black;margin-top:-50px;border: 1px solid #d65106;"><br><br>
        <input type="text" name="address" placeholder="Địa chỉ"  style="background-color: white;color:black;margin-top:-50px;border: 1px solid #d65106;"><br><br>
        <input type="text" name="phone" placeholder="Số điện thoại"  style="background-color: white;color:black;margin-top:-50px;border: 1px solid #d65106;">
        <input type="password" name="password" placeholder="Passsword" id="pwd" autocomplete="off" style="background-color: white;color:black;border: 1px solid #d65106;">
        Ảnh đại diện:
        <input type="file" name="image">
        <input type="submit" value="Đăng kí" class="btn1" style="background-color: #d65106;margin-top:20px;">
        @csrf
      </form>
        <a href="{{route('login')}}" class="dnthave" style="margin-top:15px;color: #d65106;">Bạn đã có tài khoản? Đăng nhập</a>
  </div> 
</div>
<script src="{{url('public/ad123/js')}}/login.js"></script>
</body>
</html>