<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'name_translit', 'region_id'
    ];

    public function region()
    {
        return $this->belongsTo('App\Models\Region');
    }

    public function districts()
    {
        return $this->hasMany('App\Models\District');
    }

}
