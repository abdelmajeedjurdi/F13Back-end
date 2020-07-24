<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table='reservation';

    protected $fillable=[
        'date_time','request','pending','user_id','table_id'
    ];
}
