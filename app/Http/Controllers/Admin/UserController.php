<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Service\User\UserService;
use App\Models\User;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('admin.users.list',[
            'title' => 'Danh sách người dùng',
            'users' => $this->userService->getAll()
        ]);
    }

    public function show(User $user)
    {
        return view('admin.users.edit',[
            'title' => 'Chính sửa thông tin',
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $result = $this->userService->update($request,$user);
        if($result){
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $result = $this->userService->delete($id);
        if($result){
            return redirect()->back();
        }
    }
}
