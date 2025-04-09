<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected  $fillable = [
        'user_id',
        'event_id',
        'comments',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public  function event()
    {
        return $this->belongsTo(Event::class);
    }
    
}
