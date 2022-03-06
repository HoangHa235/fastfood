<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\Recruit\RecruitService;
use App\Models\Recruit;

class RecruitController extends Controller
{
    protected $recruit;

    public function __construct(RecruitService $recruit)
    {
        $this->recruit = $recruit;
    }
    public function create()
    {
        return view('admin.recruit.add',[
            'title' => 'Thêm tin tuyển dụng'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);

        $this->recruit->insert($request);

        return redirect()->back();
    }

    public function index()
    {
        return view('admin.recruit.list',[
            'title' => 'Danh sách tin tuyển dụng mới nhất',
            'recruits' =>$this->recruit->get(),
        ]);
    }

    public function show(Recruit $recruit)
    {
        return view('admin.recruit.edit',[
            'title' => 'Chỉnh sửa tin tuyển dụng',
            'recruit' =>$recruit
        ]);
    }

    public function update(Request $request , Recruit $recruit)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        $result = $this->recruit->update($request,$recruit);
        if($result){
            return redirect('/admin/recruits/list');
        }
        return redirect()->back();
    }

    public function destroy($idrecruit)
    {
        $result = $this->recruit->delete($idrecruit);
        if($result){
            return redirect('/admin/recruits/list');
        }
    }
}
