<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Book extends Eloquent
{
    protected $connection='mongodb';
    protected $collection='items';
    protected $fillable=[
        'name','image','price','stock','category'
    ];
}
