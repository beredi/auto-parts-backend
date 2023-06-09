<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{


    use HasFactory;

    protected $fillable = [
        'name',
        'registration_number',
        'is_registered',
    ];

    public function parts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Part::class);
    }
}
