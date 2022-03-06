@extends('admin.main')

@section('content')   
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px;">ID</th>
                <th></th>
                <th>Tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th style="width: 100px;">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $key => $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>
                    <a href="{{url('public/uploads')}}/{{$user->avata}}" target="_blank">
                    <img src="{{url('public/uploads')}}/{{$user->avata}}" style="height: 50px;width: 50px;border-radius: 50%;"></a>
                </td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>                
                <td>{{$user->phone}}</td>
                <td>{{$user->address}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/projectlaravel/admin/users/edit/{{$user->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" onclick="removeRow('$user->id')" href="/projectlaravel/admin/users/destroy/{{$user->id}}">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach      
        </tbody>
    </table>
    {!! $users->links("pagination::bootstrap-4") !!}
@endsection