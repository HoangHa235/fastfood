<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Service\CommentService;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentService;
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }
    public function index()
    {
        return view('admin.comment.list',[
            'title' => 'Danh sách bình luận',
            'comments' => $this->commentService->getall()           
        ]);
    }

    public function delete($id)
    {
        $result = $this->commentService->delete($id);
        if($result){
            return redirect()->back();
        }else
        {
            return 'Xóa lỗi';
        }
    }
}
