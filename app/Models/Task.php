<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 

class Task extends Model
{
    use HasFactory;//, Commentable;
 
    public function projects()
    {
        return $this->belongsToMany(User::class,'Project_User');
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'task_users');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


}
