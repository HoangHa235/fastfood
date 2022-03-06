@extends('admin.main')

@section('content')   
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="menu">Tên người dùng</label>
        <input class="form-control" value="{{$user->name}}" name="name" type="text"/>
    </div>
    <div class="form-group">
        <label for="menu">Email</label>
        <input class="form-control" value="{{$user->email}}" name="email" type="text"/>
    </div>
    <div class="form-group">
        <label for="menu">Số điện thoại</label>
        <input class="form-control" value="{{$user->phone}}" name="phone" type="text"/>
    </div>
    <div class="form-group">
        <label for="menu">Địa chỉ</label>
        <input class="form-control" value="{{$user->address}}" name="address" type="text"/>
    </div>
    <div class="form-group">
        <label for="menu">Ảnh đại diện</label><br>
        <a href="{{url('public/uploads')}}/{{$user->avata}}" target="_blank">
        <img width="150px" src="{{url('public/uploads')}}/{{$user->avata}}">
        </a>
        <input type="file" name="file_upload"  class="form-control" id="upload">
    </div>
    <br>
    <br>
    <button type="submit" class="btn btn-primary">Cập nhật người dùng</button>
    @csrf
</form>    
@endsection