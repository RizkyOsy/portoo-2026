<?php

namespace App\Livewire\Pages;

use App\Models\Project;
use Livewire\Component;

class ProjectDetailPage extends Component
{
    public Project $project;

    public function mount(Project $project): void
    {
        abort_unless($project->is_published, 404);

        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.pages.project-detail-page')
            ->layout('components.layouts.app', [
                'title' => $this->project->title . ' - Portfolio',
            ]);
    }
}