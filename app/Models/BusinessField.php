<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessField extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'hero_image',
        'description',
        'short_description',
        'long_description',
        'services',
        'process_steps',
        'advantages',
        'faq',
        'is_active',
        'display_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'services' => 'array',
        'process_steps' => 'array',
        'advantages' => 'array',
        'faq' => 'array',
    ];

    // Relationships
    public function projects()
    {
        return $this->hasMany(Project::class, 'business_field_id');
    }

    /**
     * Get published projects only
     */
    public function publishedProjects()
    {
        return $this->projects()
            ->where('is_published', true)
            ->orderBy('start_date', 'desc');
    }

    /**
     * Get featured projects
     */
    public function featuredProjects()
    {
        return $this->projects()
            ->where('is_published', true)
            ->where('is_featured', true)
            ->orderBy('start_date', 'desc');
    }
}