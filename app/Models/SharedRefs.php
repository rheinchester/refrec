<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharedRefs extends Model
{
    protected $table = 'sharedrefs';
    use HasFactory;

    public function user()
    {
       return $this->belongsTo('App\Models\User');
    }
}
