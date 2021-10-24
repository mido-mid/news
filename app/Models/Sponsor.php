<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    //
    protected $table = 'sponsors';

    public $timestamps = false;

    protected $fillable = [
        'link','image','type'
    ];
}
