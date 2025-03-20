<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['type', 'body', 'author_id', 'retro_id', 'likes', 'dislikes'];


    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }


    public function retro()
    {
        return $this->belongsTo(Retro::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
