<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'address',
    ];


    public function references()
    {
        return $this->belongsToMany(Reference::class, 'reference_school')
                    ->withTimestamps();
    }

}
