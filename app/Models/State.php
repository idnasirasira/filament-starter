<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country_id',
        'country_code',
        'fips_code',
        'iso2',
        'latitude',
        'longitude',
        'flag',
    ];

    function country() {
        return $this->belongsTo(Country::class);
    }

    function cities() {
        return $this->hasMany(City::class);
    }

    function employees() {
        return $this->hasMany(Employee::class);
    }
}
