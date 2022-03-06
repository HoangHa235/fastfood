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
    <form name="form1" action="/projectlaravel/admin/users/login/store" method="POST" class="box" >
      <h4 style="margin-top: 10px;color: #d65106;"><b>FAST FOOD</b></h4><h5 style="color: #d65106;"><span> Thức ăn nhanh</span></h5>
      <h5>Đăng nhập tài khoản</h5>
        <input type="text" name="email" placeholder="Email" autocomplete="off" style="background-color: white;color:black">
        <i class="typcn typcn-eye" id="eye"></i>
        <input type="password" name="password" placeholder="Passsword" id="pwd" autocomplete="off" style="background-color: white;color:black">
        <label>
          <input type="checkbox" name="remember">
          <span></span>
          <small class="rmb" style=" color: #d65106;">Nhớ tôi</small>
        </label>
        <input type="submit" value="Đăng nhập" class="btn1" style="background-color: #d65106;">
        @csrf
      </form>
        <a href="{{ route('register') }}" class="dnthave"  style="color: #d65106;">Bạn chưa có tài khoản? Đăng kí</a>
  </div> 
</div>
<script src="{{url('public/ad123/js')}}/login.js"></script>
</body>
</html>