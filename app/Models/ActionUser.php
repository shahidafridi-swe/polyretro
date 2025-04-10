<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActionUser extends Model
{
    protected $fillable = ['action_id', 'user_id'];

    public function action()
    {
        return $this->belongsTo(Action::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
