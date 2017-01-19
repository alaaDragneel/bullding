<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bullding extends Model
{
	protected $fillable = [
		'name', 'price', 'rent', 'square', 'type', 'small_dis', 'meta', 'langtuide', 'latitiute', 'decription', 'status', 'user_id', 'rooms', 'place'
	];

   public function user()
   {
      return $this->belongsTo('App\User');
   }
}
