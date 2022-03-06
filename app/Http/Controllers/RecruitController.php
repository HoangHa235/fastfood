<?php

namespace App\Http\Controllers;

use App\Http\Service\CommentService;
use App\Http\Service\Recruit\RecruitService;
use Illuminate\Http\Request;

class RecruitController extends Controller
{
    protected $recruit;
    protected $commentService;

    public function __construct(RecruitService $recruit, CommentService $commentService)
    {
        $this->recruit = $recruit;
        $this->commentService = $commentService;
    }

    public function index()
    {
        return view('recruit',[
            'title' => 'Tin tức tuyển dụng',
            'recruits' => $this->recruit->show()
        ]);
    }

    public function show($id = '', $lug='')
    {
        $recruit = $this->recruit->getRecruit($id);
        $comment = $this->commentService->list($id);
        return view('recruit.content',[
            'title' => $recruit->name,
            'recruit' => $recruit,
            'comments' => $comment
        ]);
    }


}
