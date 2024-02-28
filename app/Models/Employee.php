<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'address',
        'zip_code',
        'date_of_birth',
        'date_hired',
        'country_id',
        'state_id',
        'city_id',
        'department_id',
    ];

    protected $guarded = [];

    function department() {
        return $this->belongsTo(Department::class);
    }

    function country() {
        return $this->belongsTo(Country::class);
    }

    function state() {
        return $this->belongsTo(State::class);
    }

    function city() {
        return $this->belongsTo(City::class);
    }

    function user() {
        return $this->belongsTo(User::class);
    }
}
