<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gifts extends Model
{
    use HasFactory;
    protected $table = 'gifts'; // Nombre de la tabla en la base de datos

    protected $fillable = ['name', 'description', 'urlimage','company','state', 'expirationDate'];
}
