<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $fillable = ['body', 'retro_id', 'priority', 'status', 'deadline'];

    public function retro()
    {
        return $this->belongsTo(Retro::class);
    }

    
}
