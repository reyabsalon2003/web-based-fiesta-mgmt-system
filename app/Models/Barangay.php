<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    protected $fillable = ['barangay_name', 'contact_person', 'contact_number'];
    public function attendees()
    {
        return $this->hasMany(Attendee::class);
    }
    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function logistics()
{
    return $this->hasMany(Logistic::class);
}
}
