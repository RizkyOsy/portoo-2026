<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'problem_analysis',
        'system_requirement',
        'architecture',
        'tech_stack',
        'diagram_path',
        'repository_url',
        'demo_url',
        'status',
        'progress',
        'is_featured',
        'is_published',
        'sort_order',
        'published_at',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'progress' => 'integer',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::saving(function (Project $project) {
            if (blank($project->slug)) {
                $project->slug = static::generateUniqueSlug($project->title, $project->id);
            }

            $project->progress = max(0, min(100, (int) $project->progress));
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    private static function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 2;

        while (
            static::query()
                ->where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = "{$baseSlug}-{$counter}";
            $counter++;
        }

        return $slug;
    }
}