<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'name_translit'];

    public function localities()
    {
        return $this->hasMany('App\Models\Locality');
    }
}
