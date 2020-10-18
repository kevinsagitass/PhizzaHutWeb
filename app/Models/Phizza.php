<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phizza extends Model
{
    protected $table = "phizza";

    protected $fillable = array(
        'phizza_name',
        'desc',
        'price',
        'image'
    );
}
