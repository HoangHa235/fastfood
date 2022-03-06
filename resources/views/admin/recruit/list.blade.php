@extends('admin.main')

@section('content')   
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px;">ID</th>
                <th>Hình ảnh</th>
                <th>Tên tin tuyển dụng</th>
                <th>Active</th>
                <th>Update</th>
                <th style="width: 100px;">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recruits as $key => $recruit)
            <tr>
                <td>{{$recruit->id}}</td>
                <td><img style="height: 50px;width: 65px;" src="{{url('public/uploads')}}/{{$recruit->thumb}}"></td>
                <td>{{$recruit->name}}</td>
                <td>{!! \App\Helpers\Helper::active($recruit->active) !!}</td>
                <td>{{$recruit->updated_at}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/projectlaravel/admin/recruits/edit/{{$recruit->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" onclick="removeRow('$recruit->id')" href="/projectlaravel/admin/recruits/destroy/{{$recruit->id}}">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach      
        </tbody>
    </table>
    {!!$recruits->links("pagination::bootstrap-4") !!}
@endsection