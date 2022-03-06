@extends('admin.main')

@section('content')   
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px;">ID</th>
                <th>Tên khách hàng</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Ngày đặt hàng</th>
                <th style="width: 100px;">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $key => $customer)
            <tr>
                <td>{{$customer->id}}</td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->address}}</td>
                <td>{{$customer->created_at}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/projectlaravel/admin/customers/view/{{$customer->id}}">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" onclick="removeRow('$customer->id')" href="/projectlaravel/admin/customers/destroy/{{$customer->id}}">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach      
        </tbody>
    </table>
    {!! $customers->links("pagination::bootstrap-4") !!}
@endsection