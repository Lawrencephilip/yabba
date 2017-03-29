<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenants extends Model
{
    protected $table = 'tenants';

    protected $fillable = [
      	'firstName',
        'surname',
        'email',
        'phone_number',
        'password',
        'gender'
    ];
}
