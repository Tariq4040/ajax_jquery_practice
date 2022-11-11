<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;


class State extends Model
{
    use HasFactory;

    public function state_cities(){
        return $this->hasMany(City::class , 'state_id' , 'id');
    }
}
