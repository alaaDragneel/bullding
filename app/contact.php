<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
   protected $table = 'contacts';
   protected $fillable = [
      'id', 'contactName', 'contactEmail', 'contactSubject', 'contactMessage', 'view', 'contactType',
   ];
}
