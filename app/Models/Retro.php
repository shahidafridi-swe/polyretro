<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retro extends Model
{
    protected $fillable = ['name', 'team_id', 'status'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function actions()
    {
        return $this->hasMany(Action::class);
    }

}
