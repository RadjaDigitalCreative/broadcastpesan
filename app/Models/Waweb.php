<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Waweb extends Model
{
	protected $table    = 'wa';
	protected $fillable = ['name', 'number', 'text', 'id_data'];
}
