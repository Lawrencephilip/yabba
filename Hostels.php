<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hostels extends Model
{
    protected $table = 'hostel';

    protected $fillable = [
        'hostelName',
        'caretakerName',
        'location',
        'image_url'
    ];
}
