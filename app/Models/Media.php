<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    public $timestamps = false;

    protected $fillable = [
        'filename',
        'news_id',
    ];
}
