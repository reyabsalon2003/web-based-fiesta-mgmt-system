<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [ 
        'event_name',
        'event_description',
        'event_date',
        'event_time',
        'event_venue',
        'event_image',
        'status',
        'barangay_id',

       
    ];
    public function barangay()
    {
        return $this->belongsTo(Barangay::class);
    }
    public function attendees()
    {
        return $this->hasMany(Attendee::class);

    }
    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }
}
