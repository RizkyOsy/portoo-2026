<div>
    <section class="section">
        <div class="container">
            <span class="eyebrow">
                <span class="dot"></span>
                Contact
            </span>

            <h1 class="page-title">Mari Terhubung</h1>

            <p class="subtitle">
                Kirim pesan melalui form berikut. Data pesan akan tersimpan langsung ke database dan dapat dibaca melalui admin panel Filament.
            </p>

            <div class="grid grid-2" style="margin-top: 34px;">
                <div class="card contact-card">
                    <h3>Informasi Kontak</h3>

                    <p class="muted">
                        Silakan hubungi saya untuk diskusi project, kerja sama, atau kebutuhan pengembangan website.
                    </p>

                    <div class="contact-info">
                        <div class="contact-info-item">
                            <strong>Email</strong>
                            <span class="muted">{{ $profile->email ?? 'admin@admin.com' }}</span>
                        </div>

                        <div class="contact-info-item">
                            <strong>Phone</strong>
                            <span class="muted">{{ $profile->phone ?? '081234567890' }}</span>
                        </div>

                        <div class="contact-info-item">
                            <strong>Location</strong>
                            <span class="muted">{{ $profile->location ?? 'Indonesia' }}</span>
                        </div>

                        <div class="contact-info-item">
                            <strong>Availability</strong>
                            <span class="muted">Open for new project</span>
                        </div>
                    </div>
                </div>

                <div class="card contact-card">
                    <h3>Kirim Pesan</h3>

                    @if (session()->has('success'))
                        <div class="alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="submit" class="form-grid">
                        <div class="form-group">
                            <label for="name">Nama</label>

                            <input
                                id="name"
                                type="text"
                                class="form-control"
                                wire:model.blur="name"
                                placeholder="Masukkan nama kamu"
                            >

                            @error('name')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>

                            <input
                                id="email"
                                type="email"
                                class="form-control"
                                wire:model.blur="email"
                                placeholder="nama@email.com"
                            >

                            @error('email')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject</label>

                            <input
                                id="subject"
                                type="text"
                                class="form-control"
                                wire:model.blur="subject"
                                placeholder="Topik pesan"
                            >

                            @error('subject')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="message">Pesan</label>

                            <textarea
                                id="message"
                                class="form-control"
                                wire:model.blur="message"
                                placeholder="Tulis pesan kamu..."
                            ></textarea>

                            @error('message')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                            <span wire:loading.remove>Kirim Pesan</span>
                            <span wire:loading>Mengirim...</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>