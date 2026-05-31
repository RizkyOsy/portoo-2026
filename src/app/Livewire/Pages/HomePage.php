<?php

namespace App\Livewire\Pages;

use App\Models\PortfolioProfile;
use App\Models\Project;
use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        $profile = PortfolioProfile::query()
            ->where('is_active', true)
            ->latest()
            ->first();

        $featuredProjects = Project::query()
            ->where('is_published', true)
            ->where('is_featured', true)
            ->orderBy('sort_order')
            ->latest()
            ->take(3)
            ->get();

        return view('livewire.pages.home-page', [
            'profile' => $profile,
            'featuredProjects' => $featuredProjects,
        ])->layout('components.layouts.app', [
            'title' => 'Home - Portfolio',
        ]);
    }
}