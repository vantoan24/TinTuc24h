<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Categorie;


class News extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'news';
    protected $fillable = [
        'id','title','description','image','content','status','view','hot','puplish_date','category_id','user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function category_news()
    {
        return $this->belongsTo(CategoryNew::class, 'categorie_id', 'id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class,'category_id', 'id');
    }
}
