<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [

        'name', 'name_translit'
    ];

    public function locality()
    {
        return $this->belongsTo('App\Models\Locality');
    }
}
