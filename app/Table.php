<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $table='table';

    protected $fillable=[
        'name','coord','inside'
    ];
}
