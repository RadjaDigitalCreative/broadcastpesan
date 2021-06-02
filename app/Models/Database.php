<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Database extends Model
{
    protected $table    = 'database';
    protected $fillable = ['name', 'number', 'text'];
}
