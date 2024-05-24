<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;

    public function user()
    {
       return $this->belongsTo('App\Models\User');
    }
    public function institutions()
    {
       return $this->belongsToMany('App\Models\Institution');
    }

    // Looks good. just in case
    public function isSharedWith($schoolId)
    {
        return $this->schools()->where('school_id', $schoolId)->exists();
    }

}
