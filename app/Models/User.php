<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory; use SoftDeletes;
    
    protected $table = 'users';
    protected $fillable = [
        'id','name','day_of_birth','address','password','avatar','phone','email','gender','start_day','user_group_id'
    ];


    public function news(){
        return $this->hasMany(News::class);
    }

    public function userGroup()
    {
        return $this->belongsTo(UserGroup::class, 'user_group_id', 'id');
    }

}
