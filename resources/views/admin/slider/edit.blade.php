@extends('admin.main')

@section('content')   
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Tiêu đề</label>
        <input class="form-control" name="name" value="{{$slider->name}}" type="text" />
    </div>
    <div class="form-group">
        <label>Đường dẫn</label>
        <input class="form-control" name="url" value="{{$slider->url}}" type="text" />
    </div>
    <div class="form-group">
        <label>Ảnh sản phẩm</label>
        <div id="image_show">
            <a href="{{url('public/uploads')}}/{{$slider->thumb}}"><img src="{{url('public/uploads')}}/{{$slider->thumb}}" width="100px"></a>
        </div>
        <input class="form-control" name="file_upload" type="file" />
    </div>
    <div class="form-group">
        <label>Sắp xếp</label>
        <input class="form-control" name="sort_by" value="{{$slider->sort_by}}" type="number" />
    </div>
    <div class="form-group">
        <label>Kích hoạt</label>
        <div class="custom-control custom-radio">
            <input class="custom-control input" value="1" type="radio" id="active" name="active"
            {{ $slider->active == 1 ? 'checked=""': ''}}>
            <label for="active" class="custom-control-label">Có</label>
        </div>
        <div class="custom-control custom-radio">
            <input class="custom-control input" value="0" type="radio" id="no_active" name="active"
            {{ $slider->active == 0 ? 'checked=""': ''}}>
            <label for="no_active" class="custom-control-label">Không</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật Slider</button>
    @csrf
</form>
@endsection
