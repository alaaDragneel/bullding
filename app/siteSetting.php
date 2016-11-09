<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siteSetting extends Model
{
    protected $table = 'siteSetting';

    protected $fillable = [
	     'slug', 'nameSetting', 'value', 'type'
    ];
}
