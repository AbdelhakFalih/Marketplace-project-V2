<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'title', 'description', 'category', 'budget', 'quantity', 'unit',
                            'location', 'urgency', 'needed_by', 'responses_count'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}
