<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'total',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id', 'id');
    }

    // motel through booking 
    public function motel()
    {
        return $this->hasOneThrough(Motel::class, Booking::class, 'id', 'id', 'booking_id', 'motel_id');
    }

    // user through booking
    public function user()
    {
        return $this->hasOneThrough(User::class, Booking::class, 'id', 'id', 'booking_id', 'user_id');
    }
}
