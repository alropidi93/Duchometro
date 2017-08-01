<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
  protected $fillable = [
      'name', 'continuity','consumption','micromedition', 'facturation'
  ];
  protected $hidden = [
       'remember_token',
  ];

  protected $table = 'district';
}
