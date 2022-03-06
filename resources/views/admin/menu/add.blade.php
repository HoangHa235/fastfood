@extends('admin.main')

@section('header')
<script src="{{url('public/ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')   
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="menu">Tên danh mục</label>
        <input class="form-control" name="name" type="text" placeholder="Nhập tên danh mục"/>
    </div>
    <div class="form-group">
        <label>Danh mục</label>
        <select class="form-control" name="parent_id">
            <option value="0">Danh mục cha</option>
            @foreach($menus as $menu)
            <option value="{{$menu->id}}">{{$menu->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="menu">Ảnh Sản Phẩm</label>
        <input type="file" name="file_upload"  class="form-control" id="upload">
    </div>
    <div class="form-group">
        <label>Mô tả</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label>Mô tả chi tiết</label>
        <textarea name="content" id="content" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label>Kích hoạt</label>
        <div class="custom-control custom-radio">
            <input class="custom-control input" value="1" type="radio" id="active" name="active">
            <label for="active" class="custom-control-label">Có</label>
        </div>
        <div class="custom-control custom-radio">
            <input class="custom-control input" value="0" type="radio" id="no_active" name="active">
            <label for="no_active" class="custom-control-label">Không</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Thêm danh mục</button>
    @csrf
</form>
@endsection

@section('footer')
<script>
    CKEDITOR.replace( 'content' );
</script>
@endsection