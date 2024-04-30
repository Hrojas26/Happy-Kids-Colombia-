<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $table = 'donations'; // Nombre de la tabla en la base de datos

    protected $fillable = ['address', 'dateCollection', 'timeCollection', 'numberToys', 'observations','user_id'];

}
