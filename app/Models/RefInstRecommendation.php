<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Important!!!
 * 
 *  this is the implementation of an individual's application to an employer or school.
 * It is a pivot table
 *
 * 
 */
class RefInstRecommendation extends Model
{
    protected $table = 'reference_school';

    public function reference()
    {
        return $this->belongsTo(Reference::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
