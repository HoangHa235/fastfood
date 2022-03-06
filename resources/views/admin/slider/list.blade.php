@extends('admin.main')

@section('content')   
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px;">ID</th>
                <th>Tiêu đề</th>
                <th>Link</th>
                <th>Hình ảnh</th>
                <th>Trạng thái</th>
                <th>Cập nhật</th>
                <th style="width: 100px;">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sliders as $key => $slider)
            <tr>
                <td>{{$slider->id}}</td>
                <td>{{$slider->name}}</td>
                <td>{{$slider->url}}</td>
                <td>
                    <a href="{{url('public/uploads')}}/{{$slider->thumb}}" target="_blank"><img src="{{url('public/uploads')}}/{{$slider->thumb}}" style="height: 40px;width: 80px;"></a>
                </td>
                <td>{!! \App\Helpers\Helper::active($slider->active) !!}</td>
                <td>{{$slider->updated_at}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/projectlaravel/admin/sliders/edit/{{$slider->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" onclick="removeRow('$slider->id')" href="/projectlaravel/admin/sliders/destroy/{{$slider->id}}">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach      
        </tbody>
    </table>
    {!! $sliders->links("pagination::bootstrap-4") !!}
@endsection