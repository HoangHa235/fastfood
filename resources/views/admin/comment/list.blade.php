@extends('admin.main')

@section('content')   
    <table class="table">
        <thead>
            <tr>
                <th style="width: 60px;"></th>
                <th>Bình luận</th>
                <th>Bài đăng</th>
                <th style="width: 100px;">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $key => $comment)
            <tr>
                <td><img src="{{url('public/uploads')}}/{{$comment->user->avata}}" style="width: 50px;height: 50px;border-radius: 50%;"></td>
                <td>{{$comment->content}}</td>
                <td>{{$comment->recruit->name}}</td>
                <td>
                    <a class="btn btn-danger btn-sm" onclick="removeRow('$comment->id')" href="/projectlaravel/admin/comments/delete/{{$comment->id}}">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection