@extends('admin.main')

@section('header')
<script src="{{url('public/ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')   
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="menu">Tên danh mục</label>
        <input class="form-control" value="{{$menu->name}}" name="name" type="text" placeholder="Nhập tên danh mục"/>
    </div>
    <div class="form-group">
        <label>Danh mục</label>
        <select class="form-control" name="parent_id">
            <option value="0" {{$menu->parent_id == 0 ? 'selected': '' }}>Danh mục cha</option>
            @foreach($menus as $menuParent)
            <option value="{{$menuParent->id}}" {{$menu->parent_id == $menuParent->id ? 'selected': '' }}>
                {{$menuParent->name}}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="menu">Ảnh Sản Phẩm</label><br>
        <a href="{{url('public/uploads')}}/{{$menu->thumb}}" target="_blank">
        <img width="150px" src="{{url('public/uploads')}}/{{$menu->thumb}}">
        </a>
        <input type="file" name="file_upload"  class="form-control" id="upload">
    </div>
    <div class="form-group">
        <label>Mô tả</label>
        <textarea name="description" class="form-control">{{$menu->description}}</textarea>
    </div>
    <div class="form-group">
        <label>Mô tả chi tiết</label>
        <textarea name="content" id="content" class="form-control">{{$menu->content}}</textarea>
    </div>
    <div class="form-group">
        <label>Kích hoạt</label>
        <div class="custom-control custom-radio">
            <input class="custom-control input" value="1" type="radio" id="active" 
            name="active" {{$menu->active == 1 ? 'checked=""': ''}}>
            <label for="active" class="custom-control-label">Có</label>
        </div>
        <div class="custom-control custom-radio">
            <input class="custom-control input" value="0" type="radio" id="no_active" 
            name="active" {{$menu->active == 0 ? 'checked=""': ''}}>
            <label for="no_active" class="custom-control-label">Không</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
    @csrf
</form>
@endsection

@section('footer')
<script>
    CKEDITOR.replace( 'content' );
</script>
@endsection