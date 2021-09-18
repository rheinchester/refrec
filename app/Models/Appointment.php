<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Appointment extends Model
{
    use HasFactory;
    protected $table  = 'appointments';
    protected $primaryKey  = 'id';
    public $timestamps  = true;

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
