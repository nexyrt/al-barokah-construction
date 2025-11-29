<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    // Relationships
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_tag_relations', 'tag_id', 'project_id');
    }
}
