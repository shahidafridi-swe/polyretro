<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActionComment extends Model
{
    protected $fillable =['body', 'action_id', 'author_id'];

    public function action()
    {
        return $this->belongsTo(Action::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class , 'author_id');
    }
}
