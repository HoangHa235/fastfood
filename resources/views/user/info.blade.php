<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="css/updateinfo.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{url('public/css')}}/info.css"> 
<!------ Include the above in your HEAD tag ---------->
<!-- {{url('public/uploads')}}/{{Auth::user()->avata}} -->
</head>
<body>
<section class="get-in-touch">
   <h5 class="title">Thông tin cá nhân</h5>
   <form class="contact-form row" action="" method="POST" enctype="multipart/form-data">
      <div class="form-field col-lg-6">
         <input id="name" name="name" value="{{Auth::user()->name}}"  class="input-text js-input" type="text" style="margin-left: 5px;" required>
         <label class="label" for="name" style="margin-bottom: 15px;">Họ và tên</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="email" name="email" value="{{Auth::user()->email}}"  class="input-text js-input" type="email" style="margin-left: 5px;" required>
         <label class="label" for="email" style="margin-bottom: 15px;">E-mail</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="company" name="address" value="{{Auth::user()->address}}"  class="input-text js-input" type="text" style="margin-left: 5px;" required>
         <label class="label" for="company" style="margin-bottom: 15px;">Địa chỉ: </label>
      </div>
       <div class="form-field col-lg-6 ">
         <input id="phone" name="phone" value="{{Auth::user()->phone}}"   class="input-text js-input" type="number" style="margin-left: 5px;" required>
         <label class="label" for="phone" style="margin-bottom: 15px;">Số điện thoại</label>
      </div>
      <div class="form-field col-lg-6 ">
         <p class="label" style="margin-bottom: 50px;">Ngày tạo tài khoản: {{Auth::user()->created_at}}</p>
      </div>
         <img style="width: 130px;height:130px;margin-left: 50px;border-radius: 50%;" src="{{url('public/uploads')}}/{{Auth::user()->avata}}"><br>
         <input type="file" name="file_upload" id="avata">
      <div class="form-field col-lg-12">
         <input class="submit-btn" type="submit" value="Cập nhật">
         <a href="{{ Route('home.index')}}" style="margin-left: 30px;color: #551A8B;">Quay trở lại</a>
      </div>
      @csrf
   </form>
</section>
</body>
</html>