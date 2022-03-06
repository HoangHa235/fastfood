<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'recuit_id',
        'user_id',
        'content',
        'active'
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function recruit()
    {
        return $this->hasOne(Recruit::class,'id','recuit_id');
    }
}
