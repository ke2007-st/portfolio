<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'location',
        'start_date',
        'end_date',
        'is_current',
        'description',
        'highlights',
        'order_index',
    ];

    protected $casts = [
        'highlights' => 'array',
        'is_current' => 'boolean',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('order_index')->orderBy('created_at', 'desc');
    }
}
