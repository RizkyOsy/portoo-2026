<?php

namespace App\Livewire\Pages;

use App\Models\Project;
use Livewire\Component;

class ProjectsPage extends Component
{
    public string $search = '';

    public string $status = '';

    public function render()
    {
        $projects = Project::query()
            ->where('is_published', true)
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('title', 'like', '%' . $this->search . '%')
                        ->orWhere('short_description', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->status, fn ($query) => $query->where('status', $this->status))
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('livewire.pages.projects-page', [
            'projects' => $projects,
        ])->layout('components.layouts.app', [
            'title' => 'Projects - Portfolio',
        ]);
    }
}