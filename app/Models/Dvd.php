<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dvd extends Model
{
    protected $fillable = ['title', 'genre', 'available', 'rent_price'];
}
