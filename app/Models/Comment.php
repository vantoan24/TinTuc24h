<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    
    public $timestamp=false;

    protected $fillable = [
        'id','content','status','new_id','created_at','updated_at'
    ];

    public function news(){
        return $this->belongsTo(News::class, 'new_id','id');
    }
}
