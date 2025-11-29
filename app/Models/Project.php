<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'client_name',
        'business_field_id',
        'location',
        'description',
        'short_description',
        'project_value',
        'area_size',
        'start_date',
        'end_date',
        'status',
        'is_featured',
        'is_published',
        'thumbnail',
        'views_count',
        'created_by',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'project_value' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'views_count' => 'integer',
    ];

    // Relationships
    public function businessField()
    {
        return $this->belongsTo(BusinessField::class, 'business_field_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function galleries()
    {
        return $this->hasMany(ProjectGallery::class, 'project_id');
    }

    public function tags()
    {
        return $this->belongsToMany(ProjectTag::class, 'project_tag_relations', 'project_id', 'tag_id');
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class, 'project_id');
    }
}
