<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioProfile extends Model
{
    protected $fillable = [
        'name',
        'headline',
        'short_bio',
        'bio',
        'skills',
        'skill_categories',
        'email',
        'phone',
        'location',
        'github_url',
        'linkedin_url',
        'website_url',
        'photo',
    ];

    protected $casts = [
        'skills' => 'array',
        'skill_categories' => 'array',
    ];
}