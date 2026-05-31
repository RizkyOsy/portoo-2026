<div>
    @php
        $statusStyles = [
            'planning' => 'project-status planning',
            'development' => 'project-status development',
            'on progress' => 'project-status development',
            'done' => 'project-status done',
            'completed' => 'project-status done',
            'testing' => 'project-status testing',
        ];
    @endphp

    <style>
        .projects-section {
            background: #f5f7fb;
            padding: 36px 0 80px;
            min-height: 100vh;
        }

        .projects-container {
            width: min(1120px, calc(100% - 32px));
            margin: 0 auto;
        }

        .projects-heading {
            margin-bottom: 28px;
        }

        .projects-title {
            margin: 0 0 12px;
            font-size: clamp(40px, 6vw, 74px);
            line-height: 0.95;
            font-weight: 900;
            letter-spacing: -0.04em;
            color: #0b1736;
        }

        .projects-subtitle {
            max-width: 720px;
            margin: 0;
            font-size: 18px;
            line-height: 1.7;
            color: #4b587c;
        }

        .projects-toolbar {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 190px;
            gap: 14px;
            margin-bottom: 26px;
        }

        .projects-search,
        .projects-filter {
            width: 100%;
            height: 54px;
            border-radius: 16px;
            border: 1px solid #d9dfeb;
            background: #ffffff;
            padding: 0 18px;
            font-size: 15px;
            color: #0b1736;
            outline: none;
            transition: 0.2s ease;
        }

        .projects-search:focus,
        .projects-filter:focus {
            border-color: #6d5dfc;
            box-shadow: 0 0 0 4px rgba(109, 93, 252, 0.10);
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
        }

        .project-card-clean {
            display: flex;
            flex-direction: column;
            height: 100%;
            min-height: 515px;
            background: #ffffff;
            border: 1px solid #dde3f0;
            border-radius: 26px;
            overflow: hidden;
            box-shadow: 0 12px 35px rgba(20, 31, 70, 0.08);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .project-card-clean:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 44px rgba(20, 31, 70, 0.12);
        }

        .project-cover {
            position: relative;
            height: 165px;
            background:
                radial-gradient(circle at 22% 22%, rgba(143, 98, 255, 0.35), transparent 28%),
                linear-gradient(135deg, #111c48 0%, #282b7a 55%, #343699 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .project-cover-badge {
            width: 66px;
            height: 66px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.14);
            border: 1px solid rgba(255, 255, 255, 0.16);
            backdrop-filter: blur(8px);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 38px;
            font-weight: 800;
            color: #ffffff;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.12);
        }

        .project-status {
            position: absolute;
            left: 16px;
            bottom: -14px;
            display: inline-flex;
            align-items: center;
            height: 30px;
            padding: 0 14px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.03em;
            text-transform: uppercase;
            border: 1px solid transparent;
        }

        .project-status.planning {
            background: #e8f0ff;
            color: #2f63ff;
            border-color: #c8d9ff;
        }

        .project-status.development {
            background: #efe8ff;
            color: #6d3df5;
            border-color: #d9c8ff;
        }

        .project-status.done {
            background: #e6f9ef;
            color: #159a56;
            border-color: #c9efda;
        }

        .project-status.testing {
            background: #fff4df;
            color: #c97a00;
            border-color: #ffe0a7;
        }

        .project-body-clean {
            display: flex;
            flex-direction: column;
            flex: 1;
            padding: 28px 18px 18px;
        }

        .project-title-clean {
            margin: 0 0 12px;
            font-size: 18px;
            line-height: 1.4;
            font-weight: 800;
            color: #0b1736;
            min-height: 50px;
        }

        .project-title-clean a {
            color: inherit;
            text-decoration: none;
        }

        .project-title-clean a:hover {
            color: #5f4df6;
        }

        .project-description-clean {
            margin: 0 0 18px;
            color: #617096;
            font-size: 15px;
            line-height: 1.7;
            min-height: 78px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .project-tags-clean {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 18px;
            min-height: 72px;
            align-content: flex-start;
        }

        .project-tag-clean {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 32px;
            padding: 0 12px;
            border-radius: 999px;
            background: #f1ebff;
            border: 1px solid #e0d5ff;
            color: #5a39e6;
            font-size: 13px;
            font-weight: 700;
        }

        .project-progress-wrap {
            margin-top: auto;
            padding-top: 4px;
        }

        .project-progress-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 10px;
        }

        .project-progress-label {
            font-size: 13px;
            font-weight: 700;
            color: #5a6787;
        }

        .project-progress-value {
            font-size: 14px;
            font-weight: 800;
            color: #3d4fff;
        }

        .project-progress-bar {
            width: 100%;
            height: 10px;
            border-radius: 999px;
            background: #e6ddff;
            overflow: hidden;
            margin-bottom: 16px;
        }

        .project-progress-fill {
            height: 100%;
            border-radius: inherit;
            background: linear-gradient(90deg, #7e57ff 0%, #3f64ff 100%);
            box-shadow: 0 0 16px rgba(110, 90, 255, 0.25);
        }

        .project-footer-clean {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
        }

        .project-meta-clean {
            font-size: 13px;
            color: #6f7b97;
            font-weight: 600;
        }

        .project-detail-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 94px;
            height: 44px;
            padding: 0 18px;
            border-radius: 14px;
            text-decoration: none;
            background: linear-gradient(135deg, #7e57ff 0%, #3f64ff 100%);
            color: #ffffff;
            font-size: 14px;
            font-weight: 800;
            box-shadow: 0 10px 20px rgba(93, 83, 255, 0.20);
            transition: 0.2s ease;
        }

        .project-detail-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 24px rgba(93, 83, 255, 0.28);
        }

        .project-empty {
            grid-column: 1 / -1;
            padding: 48px 24px;
            border-radius: 24px;
            background: #ffffff;
            border: 1px dashed #d6dcec;
            text-align: center;
            color: #617096;
            font-size: 16px;
            box-shadow: 0 10px 28px rgba(20, 31, 70, 0.05);
        }

        @media (max-width: 1024px) {
            .projects-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 768px) {
            .projects-section {
                padding: 28px 0 64px;
            }

            .projects-toolbar {
                grid-template-columns: 1fr;
            }

            .projects-grid {
                grid-template-columns: 1fr;
            }

            .project-card-clean {
                min-height: auto;
            }

            .project-description-clean,
            .project-tags-clean {
                min-height: unset;
            }

            .project-footer-clean {
                flex-direction: column;
                align-items: stretch;
            }

            .project-detail-btn {
                width: 100%;
            }
        }
    </style>

    <section class="projects-section">
        <div class="projects-container">
            <div class="projects-heading">
                <h1 class="projects-title">Project Saya</h1>
                <p class="projects-subtitle">
                    Daftar project yang pernah atau sedang dibuat. Semua data project ini dapat dikelola dari admin panel Filament.
                </p>
            </div>

            <div class="projects-toolbar">
                <input
                    type="text"
                    class="projects-search"
                    placeholder="Cari project..."
                    wire:model.live.debounce.300ms="search"
                >

                <select
                    class="projects-filter"
                    wire:model.live="status"
                >
                    <option value="">Semua Status</option>
                    <option value="planning">Planning</option>
                    <option value="development">Development</option>
                    <option value="done">Done</option>
                    <option value="testing">Testing</option>
                </select>
            </div>

            <div class="projects-grid">
                @forelse ($projects as $project)
                    @php
                        $normalizedStatus = strtolower(trim($project->status ?? 'planning'));
                        $statusClass = $statusStyles[$normalizedStatus] ?? 'project-status planning';
                        $progress = (int) ($project->progress ?? 0);
                    @endphp

                    <article class="project-card-clean">
                        <div class="project-cover">
                            <div class="project-cover-badge">
                                {{ strtoupper(substr($project->title, 0, 1)) }}
                            </div>

                            <span class="{{ $statusClass }}">
                                {{ strtoupper($project->status) }}
                            </span>
                        </div>

                        <div class="project-body-clean">
                            <h3 class="project-title-clean">
                                <a href="{{ route('projects.show', $project) }}">
                                    {{ $project->title }}
                                </a>
                            </h3>

                            <p class="project-description-clean">
                                {{ $project->short_description }}
                            </p>

                            <div class="project-tags-clean">
                                @foreach ($project->tech_stack ?? [] as $stack)
                                    <span class="project-tag-clean">{{ $stack }}</span>
                                @endforeach
                            </div>

                            <div class="project-progress-wrap">
                                <div class="project-progress-top">
                                    <span class="project-progress-label">Progress Project</span>
                                    <span class="project-progress-value">{{ $progress }}%</span>
                                </div>

                                <div class="project-progress-bar">
                                    <div
                                        class="project-progress-fill"
                                        style="width: {{ $progress }}%;"
                                    ></div>
                                </div>

                                <div class="project-footer-clean">
                                    <span class="project-meta-clean">
                                        Status: {{ ucfirst($project->status) }}
                                    </span>

                                    <a
                                        href="{{ route('projects.show', $project) }}"
                                        class="project-detail-btn"
                                    >
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="project-empty">
                        Belum ada project yang tersedia.
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</div>