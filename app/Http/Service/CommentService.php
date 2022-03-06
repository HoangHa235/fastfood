<?php 

namespace App\Http\Service;

use App\Models\Comment;
use App\Models\User;

class CommentService
{
    public function getall()
    {
        return Comment::with('user')->with('recruit')->orderByDesc('id')->get();
    }
    public function getOne()
    {
        return Comment::with('user')->limit(1)->get();
    }
    public function get()
    {
        return Comment::with('user')->limit(4)->where('id','!=',1)->orderByDesc('id')->get();
    }
   
    public function list($id)
    {
        return Comment::where('recuit_id',$id)->with('user')->get();
    }

    public function delete($id)
    {
        $result = Comment::where('id',$id);
        if($result){
            return Comment::where('id',$id)->delete();
        }
        return false;
    }
}