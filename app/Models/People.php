<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;
    protected $attributes = [
      'dead_date' => 0,
    ];
    protected $fillable=['firstname','lastname','fathername','birthdate','passport'];

}
