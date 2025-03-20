<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'photo',
        'auteur',
        'content',
        'user_id'
    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    public function user()
    {
        return $this->belongsTo(Article::class);
    }
}
