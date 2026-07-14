<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'technologies',
        'image',
        'category',
        'link_live',
        'link_github',
        'status',
        'project_date',
        'order_index',
        'is_featured',
    ];

    protected $casts = [
        'technologies' => 'array',
        'project_date' => 'date',
        'is_featured' => 'boolean',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('order_index')->orderBy('created_at', 'desc');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
