<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'gift_id',
        'user_id',
        'state',
    ];

    // Relación con el modelo Gift
    public function gift()
    {
        return $this->belongsTo(Gifts::class);
    }

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
