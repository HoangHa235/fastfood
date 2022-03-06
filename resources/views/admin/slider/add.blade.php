@extends('admin.main')

@section('content')   
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Tiêu đề</label>
        <input class="form-control" name="name" type="text" />
    </div>
    <div class="form-group">
        <label>Đường dẫn</label>
        <input class="form-control" name="url" type="text" />
    </div>
    <div class="form-group">
        <label>Ảnh sản phẩm</label>
        <input class="form-control" name="file_upload" type="file" />
    </div>
    <div class="form-group">
        <label>Sắp xếp</label>
        <input class="form-control" name="sort_by" value="1" type="number" />
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
    <button type="submit" class="btn btn-primary">Thêm Slider</button>
    @csrf
</form>
@endsection
