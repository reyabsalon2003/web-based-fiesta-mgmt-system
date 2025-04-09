<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logistic extends Model
{
    protected $fillable = [
        'item_name',
        'quantity',
        'status',
        'barangay_id'

    ];
    public function barangay()
{
    return $this->belongsTo(Barangay::class);
}

public function attendees()
{
    return $this->hasMany(Attendee::class);
}
    
}
