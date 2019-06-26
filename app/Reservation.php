<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{


    protected $fillable = ['no_reservation', 'date_in', 'date_out', 'pending'];
}
