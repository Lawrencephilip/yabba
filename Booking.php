<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';

    protected $fillable = [
        'user_id',
        'checkin',
        'checkout',
        'room_id',
        'status'
    ];
}
