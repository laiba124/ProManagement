<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class,'Project_User');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);//,'Project_User');
    }





}
