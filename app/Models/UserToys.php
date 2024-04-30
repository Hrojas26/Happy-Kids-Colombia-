<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserToys extends Model
{
    use HasFactory;

    protected $table = 'user_toys'; // Nombre de la tabla en la base de datos

    protected $fillable = ['received_toys', 'redeemed_toys', 'user_id'];

    /**
     * Obtener el usuario dueño de los juguetes.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
