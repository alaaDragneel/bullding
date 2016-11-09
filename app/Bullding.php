<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bullding extends Model
{
    protected $table = 'bullding';
    protected $fillable = [ 'name', 'price', 'rent', 'square', 'type', 'small_dis', 'meta', 'langtuide', 'latitiute', 'decription', 'status', 'user_id' ];
}
