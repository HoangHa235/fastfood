@extends('admin.main')

@section('header')
    <script src="{{url('public/ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tên bài đăng</label>
                        <input type="text" name="name" value="{{ $recruit->name }}"  class="form-control"  placeholder="Nhập tên sản phẩm">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Mô Tả </label>
                <textarea name="description" id="description" class="form-control">{{ $recruit->description }}</textarea>
            </div>

            <div class="form-group">
                <label>Mô Tả Chi Tiết</label>
                <textarea name="content" id="content" class="form-control">{{ $recruit->content }}</textarea>
            </div>

            <div class="form-group">
                <label for="menu">Ảnh</label><br>
                <a href="{{url('public/uploads')}}/{{$recruit->thumb}}" target="_blank">
                <img width="150px" src="{{url('public/uploads')}}/{{$recruit->thumb}}">
                </a>
                <input type="file" name="file_upload"  class="form-control" id="upload">
            </div>

            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" 
                    {{$recruit->active == 1 ? 'checked=""' : ''}}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" 
                    {{$recruit->active == 0 ? 'checked=""' : ''}}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật tin tuyển dụng</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('description');
        CKEDITOR.replace('content');
    </script>
@endsection
