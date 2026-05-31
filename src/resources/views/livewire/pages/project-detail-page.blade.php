<div>
    <section class="detail-hero">
        <div class="container">
            <a href="{{ route('projects.index') }}" class="btn btn-outline">
                ← Kembali ke Projects
            </a>
        </div>
    </section>

    <section style="padding-bottom: 76px;">
        <div class="container">
            <div class="card detail-card">
                <span class="eyebrow">
                    <span class="dot"></span>
                    {{ strtoupper($project->status) }}
                </span>

                <h1 class="page-title">
                    {{ $project->title }}
                </h1>

                <p class="subtitle">
                    {{ $project->short_description }}
                </p>

                <div class="progress">
                    <div class="progress-fill" style="width: {{ $project->progress }}%"></div>
                </div>

                <p class="muted" style="margin-top: 8px; font-weight: 800;">
                    Progress: {{ $project->progress }}%
                </p>

                <div class="detail-section">
                    <h2>Deskripsi Project</h2>

                    <p>
                        {!! nl2br(e($project->description ?: 'Belum ada deskripsi detail.')) !!}
                    </p>
                </div>

                <div class="detail-section">
                    <h2>Analisis Masalah</h2>

                    <p>
                        {!! nl2br(e($project->problem_analysis ?: 'Belum ada analisis masalah.')) !!}
                    </p>
                </div>

                <div class="detail-section">
                    <h2>Kebutuhan Sistem</h2>

                    <p>
                        {!! nl2br(e($project->system_requirement ?: 'Belum ada kebutuhan sistem.')) !!}
                    </p>
                </div>

                <div class="detail-section">
                    <h2>Arsitektur & Tech Stack</h2>

                    <p>
                        {!! nl2br(e($project->architecture ?: 'Belum ada penjelasan arsitektur.')) !!}
                    </p>

                    <div class="tags">
                        @foreach ($project->tech_stack ?? [] as $stack)
                            <span class="tag">{{ $stack }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="detail-section">
                    <h2>Diagram ERD / Flowchart</h2>

                    @if ($project->diagram_path)
                        <div class="diagram-box">
                            <img
                                src="{{ \Illuminate\Support\Facades\Storage::url($project->diagram_path) }}"
                                alt="Diagram {{ $project->title }}"
                            >
                        </div>
                    @else
                        <div class="empty">
                            Diagram belum diupload. Upload diagram dari admin Filament.
                        </div>
                    @endif
                </div>

                <div class="actions">
                    @if ($project->repository_url)
                        <a href="{{ $project->repository_url }}" target="_blank" class="btn btn-outline">
                            Repository
                        </a>
                    @endif

                    @if ($project->demo_url)
                        <a href="{{ $project->demo_url }}" target="_blank" class="btn btn-primary">
                            Live Demo
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>