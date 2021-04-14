<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public $table = 'favorites';

    protected $fillable = [
        'property_id', 'user_id'
    ];
}
