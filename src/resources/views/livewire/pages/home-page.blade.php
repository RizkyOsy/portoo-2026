<div>
    <style>
        .hero-title {
            line-height: 1.08 !important;
            padding-bottom: 10px !important;
            overflow: visible !important;
        }

        .hero-title .gradient-text {
            display: inline-block !important;
            line-height: 1.08 !important;
            padding-right: 10px !important;
            padding-bottom: 8px !important;
            overflow: visible !important;
        }

        .hero-grid > div:first-child {
            overflow: visible !important;
        }

        .skill-category-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            margin-top: 18px;
        }

        .skill-category-card {
            min-height: 190px;
            border: 1px solid var(--border);
            background:
                radial-gradient(circle at 85% 15%, rgba(124, 58, 237, 0.08), transparent 28%),
                var(--surface);
            border-radius: 20px;
            padding: 18px;
            transition: 0.2s ease;
        }

        .skill-category-card:hover {
            transform: translateY(-4px);
            border-color: #c4b5fd;
            box-shadow: 0 18px 46px rgba(124, 58, 237, 0.14);
        }

        .skill-category-icon {
            width: 44px;
            height: 44px;
            border-radius: 15px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 950;
            margin-bottom: 14px;
            box-shadow: 0 14px 28px rgba(124, 58, 237, 0.26);
        }

        .skill-category-card h3 {
            margin: 0;
            font-size: 18px;
            line-height: 1.2;
            letter-spacing: -0.035em;
            color: var(--text);
        }

        .skill-category-card p {
            margin: 8px 0 14px;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.6;
        }

        .skill-category-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .skill-category-list span {
            display: inline-flex;
            align-items: center;
            min-height: 30px;
            padding: 6px 10px;
            border-radius: 999px;
            background: var(--primary-soft);
            border: 1px solid #ddd6fe;
            color: var(--primary-dark);
            font-size: 12px;
            font-weight: 900;
        }

        .skill-empty-box {
            min-height: 300px;
        }

        @media (max-width: 640px) {
            .skill-category-grid {
                grid-template-columns: 1fr;
            }

            .skill-empty-box {
                min-height: 180px;
            }
        }
    </style>

    @php
        $toList = function ($value) {
            if (empty($value)) {
                return [];
            }

            if (is_array($value)) {
                return collect($value)
                    ->map(function ($item) {
                        if (is_array($item)) {
                            return $item['name'] ?? $item['value'] ?? null;
                        }

                        return $item;
                    })
                    ->filter(fn ($item) => ! empty($item))
                    ->values()
                    ->all();
            }

            return collect(explode(',', (string) $value))
                ->map(fn ($item) => trim($item))
                ->filter(fn ($item) => $item !== '')
                ->values()
                ->all();
        };

        $skills = $toList($profile?->skills ?? []);

        $skillCategories = collect($profile?->skill_categories ?? [])
            ->map(function ($category) use ($toList) {
                return [
                    'icon' => $category['icon'] ?? '',
                    'title' => $category['title'] ?? '',
                    'description' => $category['description'] ?? '',
                    'items' => $toList($category['items'] ?? []),
                ];
            })
            ->filter(function ($category) {
                return ! empty($category['icon'])
                    || ! empty($category['title'])
                    || ! empty($category['description'])
                    || ! empty($category['items']);
            })
            ->values()
            ->all();
    @endphp

    <section class="hero-dark">
        <div class="container">
            <div class="hero-grid">
                <div>
                    <span class="eyebrow">
                        <span class="dot"></span>
                        Laravel Developer Portfolio
                    </span>

                    @if ($profile)
                        <h1 class="hero-title">
                            Hi, I'm <span class="gradient-text">{{ $profile->name }}</span>
                        </h1>

                        <p class="hero-subtitle">
                            {{ $profile->headline }}
                        </p>

                        @if ($profile->short_bio)
                            <p class="hero-text">
                                {{ $profile->short_bio }}
                            </p>
                        @endif
                    @else
                        <h1 class="hero-title">
                            Hi, I'm <span class="gradient-text">Rizky</span>
                        </h1>

                        <p class="hero-subtitle">
                            Laravel Web Developer
                        </p>

                        <p class="hero-text">
                            Saya adalah mahasiswa Sistem Informasi yang fokus membangun aplikasi web menggunakan Laravel, Livewire, Blade, Filament, dan MariaDB.
                        </p>
                    @endif

                    <div class="actions">
                        <a href="{{ route('projects.index') }}" class="btn btn-primary">
                            Lihat Project
                            <span>→</span>
                        </a>

                        <a href="{{ route('contact') }}" class="btn btn-outline">
                            Hubungi Saya
                        </a>
                    </div>

                    @if (! empty($skills))
                        <div class="tech-row">
                            <span class="tech-label">Tech Stack</span>

                            @foreach ($skills as $skill)
                                <span class="tech-pill">
                                    {{ $skill }}
                                </span>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="hero-visual">
                    <div class="terminal-card">
                        <div class="terminal-glow"></div>

                        <div class="terminal-header">
                            <div class="terminal-dots">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>

                            <div class="terminal-title">
                                terminal — portfolio
                            </div>
                        </div>

                        <div class="terminal-body">
                            <div class="terminal-line">
                                <span class="terminal-prompt">$</span>
                                <span class="terminal-command typing-line typing-delay-1">whoami</span>
                            </div>

                            <div class="terminal-output">
                                rizky_developer
                            </div>

                            <div class="terminal-line" style="margin-top: 16px;">
                                <span class="terminal-prompt">$</span>
                                <span class="terminal-command typing-line typing-delay-2">role --show</span>
                            </div>

                            <div class="terminal-output">
                                Laravel Web Developer
                            </div>

                            @if (! empty($skills))
                                <div class="terminal-line" style="margin-top: 16px;">
                                    <span class="terminal-prompt">$</span>
                                    <span class="terminal-command typing-line typing-delay-3">skills --list</span>
                                </div>

                                <div class="terminal-output">
                                    @foreach ($skills as $skill)
                                        <span class="terminal-highlight">{{ $skill }}</span>{{ ! $loop->last ? ',' : '' }}
                                    @endforeach
                                </div>
                            @endif

                            <div class="terminal-line" style="margin-top: 16px;">
                                <span class="terminal-prompt">$</span>
                                <span class="terminal-command typing-line typing-delay-4">status --available</span>
                            </div>

                            <div class="terminal-output">
                                <span class="terminal-success">Open to work ✓</span>
                            </div>
                        </div>

                        <div class="terminal-badge">
                            <span class="status-dot"></span>
                            Terminal Mode
                        </div>
                    </div>
                </div>
            </div>

            <div class="stats-dark">
                <div class="stat-card">
                    <span class="stat-icon">▣</span>

                    <div>
                        <span class="stat-number">10+</span>
                        <span class="stat-label">Project Selesai</span>
                    </div>
                </div>

                <div class="stat-card">
                    <span class="stat-icon">▤</span>

                    <div>
                        <span class="stat-number">2+</span>
                        <span class="stat-label">Tahun Pengalaman</span>
                    </div>
                </div>

                <div class="stat-card">
                    <span class="stat-icon">&lt;/&gt;</span>

                    <div>
                        <span class="stat-number">5+</span>
                        <span class="stat-label">Teknologi Dikuasai</span>
                    </div>
                </div>

                <div class="stat-card">
                    <span class="stat-icon">★</span>

                    <div>
                        <span class="stat-number">100%</span>
                        <span class="stat-label">Dedikasi</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-light" id="skills">
        <div class="container">
            <div class="grid grid-2">
                <div class="card">
                    <span class="eyebrow eyebrow-light">
                        <span class="dot"></span>
                        About Me
                    </span>

                    <h2 class="section-title">
                        Membangun solusi digital yang modern dan inovatif.
                    </h2>

                    <p class="subtitle">
                        {{ $profile->bio ?? 'Saya berfokus pada pengembangan aplikasi web modern dengan arsitektur yang bersih, performa optimal, dan pengalaman pengguna yang baik.' }}
                    </p>

                    <ul class="list-check">
                        <li>
                            <span class="check-icon">✓</span>
                            Clean Code & Best Practices
                        </li>

                        <li>
                            <span class="check-icon">✓</span>
                            Responsive & Mobile Friendly
                        </li>

                        <li>
                            <span class="check-icon">✓</span>
                            Scalable & Maintainable
                        </li>
                    </ul>

                    <div class="actions">
                        <a href="{{ route('contact') }}" class="btn btn-primary">
                            Selengkapnya
                            <span>→</span>
                        </a>
                    </div>
                </div>

                <div class="card">
                    <span class="eyebrow eyebrow-light">
                        <span class="dot"></span>
                        My Skills
                    </span>

                    <h2 class="section-title">Tech Expertise</h2>

                    @if (! empty($skillCategories))
                        <div class="skill-category-grid">
                            @foreach ($skillCategories as $category)
                                <div class="skill-category-card">
                                    @if (! empty($category['icon']))
                                        <span class="skill-category-icon">
                                            {{ $category['icon'] }}
                                        </span>
                                    @endif

                                    @if (! empty($category['title']))
                                        <h3>{{ $category['title'] }}</h3>
                                    @endif

                                    @if (! empty($category['description']))
                                        <p>{{ $category['description'] }}</p>
                                    @endif

                                    @if (! empty($category['items']))
                                        <div class="skill-category-list">
                                            @foreach ($category['items'] as $item)
                                                <span>{{ $item }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="skill-empty-box"></div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="section-white">
        <div class="container">
            <div class="section-heading">
                <div>
                    <span class="eyebrow eyebrow-light">
                        <span class="dot"></span>
                        Projects
                    </span>

                    <h2 class="section-title">
                        Beberapa project yang pernah saya kerjakan.
                    </h2>
                </div>

                <a href="{{ route('projects.index') }}" class="btn btn-light">
                    View All Projects
                    <span>→</span>
                </a>
            </div>

            <div class="grid grid-3">
                @forelse ($featuredProjects as $project)
                    <article class="card project-card">
                        <a href="{{ route('projects.show', $project) }}" class="project-thumb">
                            <span>{{ strtoupper(substr($project->title, 0, 1)) }}</span>
                        </a>

                        <div class="project-body">
                            <span class="badge">{{ $project->status }}</span>

                            <h3>
                                <a href="{{ route('projects.show', $project) }}">
                                    {{ $project->title }}
                                </a>
                            </h3>

                            <p>
                                {{ $project->short_description }}
                            </p>

                            <div class="tags">
                                @foreach ($project->tech_stack ?? [] as $stack)
                                    <span class="tag">{{ $stack }}</span>
                                @endforeach
                            </div>

                            <div class="progress">
                                <div class="progress-fill" style="width: {{ $project->progress }}%"></div>
                            </div>

                            <div class="project-footer">
                                <span class="muted">{{ $project->progress }}%</span>

                                <a href="{{ route('projects.show', $project) }}" class="btn btn-light">
                                    Lihat Detail
                                    <span>→</span>
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="empty">
                        Belum ada project unggulan. Aktifkan project dari panel admin.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container">
            <div class="cta-card">
                <div>
                    <h2>Tertarik bekerja sama?</h2>
                    <p>
                        Saya terbuka untuk peluang baru dan tantangan menarik. Mari wujudkan ide menjadi solusi digital yang nyata.
                    </p>
                </div>

                <a href="{{ route('contact') }}" class="btn btn-light">
                    Hubungi Saya
                    <span>→</span>
                </a>
            </div>
        </div>
    </section>
</div>