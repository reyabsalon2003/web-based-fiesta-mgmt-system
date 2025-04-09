<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    protected $fillable = [
        'user_id',
        'barangay_id',
        'age',
        'contact_number',
        'gender',
        'event_id',
        'email',
        
    ];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function barangay()
    {
        return $this->belongsTo(Barangay::class);
    }
    public function logistics()
{
    return $this->belongsTo(Logistic::class);
}
}
