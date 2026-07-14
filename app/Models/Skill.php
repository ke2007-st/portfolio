<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'order_index',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('order_index')->orderBy('name');
    }
}
