<?php

namespace App\Livewire\Pages;

use App\Models\ContactMessage;
use App\Models\PortfolioProfile;
use Livewire\Component;

class ContactPage extends Component
{
    public string $name = '';

    public string $email = '';

    public string $subject = '';

    public string $message = '';

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'subject' => ['nullable', 'string', 'max:150'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
        ];
    }

    public function submit(): void
    {
        $validated = $this->validate();

        ContactMessage::query()->create($validated);

        $this->reset([
            'name',
            'email',
            'subject',
            'message',
        ]);

        session()->flash('success', 'Pesan berhasil dikirim. Terima kasih sudah menghubungi saya.');
    }

    public function render()
    {
        $profile = PortfolioProfile::query()
            ->where('is_active', true)
            ->latest()
            ->first();

        return view('livewire.pages.contact-page', [
            'profile' => $profile,
        ])->layout('components.layouts.app', [
            'title' => 'Contact - Portfolio',
        ]);
    }
}