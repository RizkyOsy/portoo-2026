<?php

use App\Livewire\Pages\ContactPage;
use App\Livewire\Pages\HomePage;
use App\Livewire\Pages\ProjectDetailPage;
use App\Livewire\Pages\ProjectsPage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');

Route::get('/projects', ProjectsPage::class)->name('projects.index');

Route::get('/projects/{project:slug}', ProjectDetailPage::class)->name('projects.show');

Route::get('/contact', ContactPage::class)->name('contact');