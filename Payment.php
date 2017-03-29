<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';

    protected $fillable = [
        'transaction_code',
        'user_id',
        'amount',
        'phone_number',
        'booking_id'
    ];
}
