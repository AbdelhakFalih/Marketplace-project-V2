<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    protected $fillable = [
        'user_id',
        'title',  // Ajoutez ceci pour résoudre l'erreur
        'category',
        'description',
        'price',
        'quantity',
        'unit',
        'images',
        'origin',
        'certification',
        'status',
        'available_until',
        // Ajoutez tout autre champ assignable via mass assignment
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
