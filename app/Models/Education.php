<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'school',
        'degree',
        'start_year',
        'end_year',
        'description',
        'location',
        'order_index',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('order_index')->orderBy('created_at', 'desc');
    }
}
