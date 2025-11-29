<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'company',
        'position',
        'photo',
        'testimonial',
        'rating',
        'project_id',
        'is_published',
        'display_order',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_published' => 'boolean',
    ];

    // Relationships
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
