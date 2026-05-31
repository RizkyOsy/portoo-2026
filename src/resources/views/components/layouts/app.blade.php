<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Ikkkyyyss' }}</title>

    @livewireStyles

    <style>
        :root {
            --dark: #070b18;
            --dark-soft: #0f172a;
            --bg: #f8fafc;
            --surface: #ffffff;
            --surface-soft: #f1f5f9;
            --text: #0f172a;
            --text-soft: #334155;
            --muted: #64748b;
            --white: #ffffff;
            --primary: #7c3aed;
            --primary-dark: #5b21b6;
            --primary-soft: #ede9fe;
            --secondary: #2563eb;
            --secondary-soft: #dbeafe;
            --success: #22c55e;
            --warning: #f59e0b;
            --danger: #ef4444;
            --border: #e2e8f0;
            --border-dark: rgba(255, 255, 255, 0.12);
            --radius: 28px;
            --shadow: 0 28px 80px rgba(15, 23, 42, 0.14);
            --shadow-purple: 0 24px 70px rgba(124, 58, 237, 0.26);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.65;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        img {
            display: block;
            max-width: 100%;
        }

        button,
        input,
        textarea,
        select {
            font: inherit;
        }

        #skills {
            scroll-margin-top: 110px;
        }

        .container {
            width: min(1320px, calc(100% - 48px));
            margin: 0 auto;
        }

        .site-header {
            position: sticky;
            top: 0;
            z-index: 50;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(7, 11, 24, 0.88);
            backdrop-filter: blur(18px);
        }

        .navbar {
            min-height: 76px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 24px;
            font-weight: 950;
            letter-spacing: -0.04em;
            color: var(--white);
        }

        .brand-mark {
            width: 42px;
            height: 42px;
            border-radius: 15px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 950;
            box-shadow: 0 16px 34px rgba(124, 58, 237, 0.38);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 6px;
            border: 1px solid var(--border-dark);
            border-radius: 999px;
            background: rgba(15, 23, 42, 0.72);
            box-shadow: 0 18px 50px rgba(0, 0, 0, 0.18);
        }

        .nav-links a {
            padding: 9px 15px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 800;
            color: rgba(255, 255, 255, 0.76);
            transition: 0.2s ease;
        }

        .nav-links a:hover,
        .nav-links a.active {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
            box-shadow: 0 14px 30px rgba(124, 58, 237, 0.34);
        }

        .main {
            min-height: calc(100vh - 150px);
        }

        .hero-dark {
            position: relative;
            padding: 86px 0 30px;
            background:
                radial-gradient(circle at 75% 20%, rgba(124, 58, 237, 0.30), transparent 28%),
                radial-gradient(circle at 20% 10%, rgba(37, 99, 235, 0.18), transparent 26%),
                linear-gradient(180deg, #070b18 0%, #0f172a 100%);
            color: var(--white);
            overflow: hidden;
        }

        .hero-dark::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle, rgba(255, 255, 255, 0.16) 1px, transparent 1px);
            background-size: 24px 24px;
            opacity: 0.28;
            mask-image: radial-gradient(circle at 72% 30%, black 0%, transparent 36%);
        }

        .hero-dark::after {
            content: "";
            position: absolute;
            left: -12%;
            bottom: -220px;
            width: 124%;
            height: 260px;
            background: var(--bg);
            border-radius: 50% 50% 0 0;
        }

        .hero-grid {
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: 1fr 0.95fr;
            gap: 90px;
            align-items: center;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            width: fit-content;
            padding: 8px 14px;
            border-radius: 999px;
            border: 1px solid var(--border-dark);
            background: rgba(255, 255, 255, 0.08);
            color: rgba(255, 255, 255, 0.86);
            font-size: 13px;
            font-weight: 900;
            margin-bottom: 22px;
            backdrop-filter: blur(12px);
        }

        .eyebrow-light {
            border-color: var(--border);
            background: var(--surface);
            color: var(--primary);
            box-shadow: 0 14px 36px rgba(15, 23, 42, 0.06);
        }

        .dot {
            width: 9px;
            height: 9px;
            border-radius: 999px;
            background: var(--success);
            box-shadow: 0 0 0 5px rgba(34, 197, 94, 0.14);
        }

        .hero-title,
        .page-title {
            margin: 0;
            font-size: clamp(44px, 6vw, 82px);
            line-height: 1.08;
            letter-spacing: -0.075em;
            font-weight: 950;
            overflow: visible;
            padding-bottom: 10px;
        }

        .hero-title {
            color: var(--white);
        }

        .gradient-text {
            display: inline-block;
            line-height: 1.08;
            padding-right: 10px;
            padding-bottom: 8px;
            overflow: visible;
            background: linear-gradient(135deg, #ffffff 0%, #a78bfa 46%, #60a5fa 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero-subtitle {
            margin: 16px 0 0;
            font-size: clamp(22px, 3vw, 34px);
            font-weight: 900;
            letter-spacing: -0.04em;
            color: #c4b5fd;
        }

        .hero-text {
            max-width: 650px;
            margin: 18px 0 0;
            color: rgba(255, 255, 255, 0.76);
            font-size: 17px;
        }

        .subtitle {
            max-width: 660px;
            margin: 18px 0 0;
            font-size: clamp(16px, 1.8vw, 19px);
            color: var(--text-soft);
        }

        .muted {
            color: var(--muted);
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 30px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            min-height: 48px;
            padding: 12px 20px;
            border-radius: 14px;
            border: 1px solid transparent;
            font-weight: 900;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
            box-shadow: 0 18px 40px rgba(124, 58, 237, 0.32);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 22px 52px rgba(124, 58, 237, 0.44);
        }

        .btn-outline {
            background: rgba(255, 255, 255, 0.08);
            color: var(--white);
            border-color: var(--border-dark);
        }

        .btn-outline:hover {
            background: rgba(255, 255, 255, 0.14);
            transform: translateY(-2px);
        }

        .btn-light {
            background: var(--surface);
            color: var(--primary-dark);
            border-color: var(--border);
            box-shadow: 0 14px 36px rgba(15, 23, 42, 0.08);
        }

        .btn-light:hover {
            border-color: var(--primary);
            transform: translateY(-2px);
        }

        .hero-visual {
            display: flex;
            justify-content: center;
        }

        .terminal-card {
            position: relative;
            width: min(520px, 100%);
            min-height: 430px;
            border-radius: 28px;
            background:
                radial-gradient(circle at 70% 18%, rgba(124, 58, 237, 0.24), transparent 30%),
                linear-gradient(145deg, rgba(15, 23, 42, 0.96), rgba(3, 7, 18, 0.94));
            border: 1px solid rgba(255, 255, 255, 0.16);
            box-shadow: var(--shadow-purple);
            overflow: hidden;
            backdrop-filter: blur(18px);
        }

        .terminal-card::before {
            content: "";
            position: absolute;
            inset: 16px;
            border-radius: 22px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            pointer-events: none;
        }

        .terminal-glow {
            position: absolute;
            right: -70px;
            top: 30px;
            width: 260px;
            height: 260px;
            border-radius: 999px;
            background: rgba(124, 58, 237, 0.36);
            filter: blur(70px);
        }

        .terminal-header {
            position: relative;
            z-index: 2;
            height: 58px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.10);
            background: rgba(255, 255, 255, 0.04);
        }

        .terminal-dots {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .terminal-dots span {
            width: 11px;
            height: 11px;
            border-radius: 999px;
        }

        .terminal-dots span:nth-child(1) {
            background: var(--danger);
        }

        .terminal-dots span:nth-child(2) {
            background: var(--warning);
        }

        .terminal-dots span:nth-child(3) {
            background: var(--success);
        }

        .terminal-title {
            color: rgba(255, 255, 255, 0.62);
            font-size: 13px;
            font-weight: 800;
        }

        .terminal-body {
            position: relative;
            z-index: 2;
            padding: 26px 24px;
            font-family: "JetBrains Mono", "Fira Code", Consolas, monospace;
            font-size: 15px;
            line-height: 1.75;
        }

        .terminal-line {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            color: rgba(255, 255, 255, 0.86);
            min-height: 28px;
        }

        .terminal-prompt {
            color: #22c55e;
            font-weight: 900;
        }

        .terminal-command {
            color: #93c5fd;
            font-weight: 800;
        }

        .terminal-output {
            color: rgba(255, 255, 255, 0.78);
            padding-left: 20px;
        }

        .terminal-highlight {
            color: #c4b5fd;
            font-weight: 900;
        }

        .terminal-success {
            color: #4ade80;
            font-weight: 900;
        }

        .typing-line {
            width: 0;
            max-width: fit-content;
            overflow: hidden;
            white-space: nowrap;
            border-right: 3px solid #a78bfa;
            animation:
                typing 3.2s steps(38, end) forwards,
                blink 0.75s step-end infinite;
        }

        .typing-delay-1 {
            animation-delay: 0.3s;
        }

        .typing-delay-2 {
            animation-delay: 1.1s;
        }

        .typing-delay-3 {
            animation-delay: 1.9s;
        }

        .typing-delay-4 {
            animation-delay: 2.7s;
        }

        .terminal-badge {
            position: absolute;
            right: 22px;
            bottom: 22px;
            z-index: 4;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 13px;
            border-radius: 14px;
            background: rgba(124, 58, 237, 0.22);
            border: 1px solid rgba(167, 139, 250, 0.28);
            color: var(--white);
            font-size: 13px;
            font-weight: 900;
            backdrop-filter: blur(14px);
        }

        .status-dot {
            width: 9px;
            height: 9px;
            border-radius: 999px;
            background: var(--success);
            box-shadow: 0 0 0 5px rgba(34, 197, 94, 0.14);
        }

        @keyframes typing {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        @keyframes blink {
            50% {
                border-color: transparent;
            }
        }

        .tech-row {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 34px;
        }

        .tech-label {
            color: rgba(255, 255, 255, 0.84);
            font-weight: 900;
            margin-right: 4px;
        }

        .tech-pill {
            min-width: 54px;
            min-height: 54px;
            padding: 12px;
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid var(--border-dark);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: 900;
            font-size: 13px;
        }

        .stats-dark {
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1px;
            margin-top: 42px;
            border: 1px solid var(--border-dark);
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.08);
            overflow: hidden;
            backdrop-filter: blur(16px);
        }

        .stat-card {
            padding: 22px;
            background: rgba(255, 255, 255, 0.03);
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 16px;
            background: rgba(124, 58, 237, 0.22);
            color: #c4b5fd;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 950;
        }

        .stat-number {
            display: block;
            font-size: 28px;
            line-height: 1;
            font-weight: 950;
            letter-spacing: -0.06em;
            color: var(--white);
        }

        .stat-label {
            display: block;
            margin-top: 5px;
            color: rgba(255, 255, 255, 0.68);
            font-size: 13px;
            font-weight: 800;
        }

        .section-light {
            background: var(--bg);
            padding: 72px 0;
        }

        .section-white {
            background: var(--surface);
            padding: 72px 0;
        }

        .section-heading {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
        }

        .section-title {
            margin: 0;
            font-size: clamp(30px, 4vw, 46px);
            line-height: 1;
            letter-spacing: -0.06em;
            font-weight: 950;
            color: var(--text);
        }

        .card {
            border: 1px solid var(--border);
            background: var(--surface);
            border-radius: var(--radius);
            padding: 26px;
            box-shadow: 0 20px 54px rgba(15, 23, 42, 0.06);
        }

        .grid {
            display: grid;
            gap: 18px;
        }

        .grid-2 {
            grid-template-columns: repeat(2, 1fr);
        }

        .grid-3 {
            grid-template-columns: repeat(3, 1fr);
        }

        .list-check {
            display: grid;
            gap: 12px;
            margin: 24px 0 0;
            padding: 0;
            list-style: none;
        }

        .list-check li {
            display: flex;
            gap: 10px;
            color: var(--text-soft);
            font-weight: 700;
        }

        .check-icon {
            flex: 0 0 24px;
            width: 24px;
            height: 24px;
            border-radius: 999px;
            background: var(--primary-soft);
            color: var(--primary);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 950;
        }

        .tags {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;
            margin-top: 16px;
        }

        .tag {
            display: inline-flex;
            align-items: center;
            padding: 7px 11px;
            border-radius: 999px;
            background: var(--primary-soft);
            color: var(--primary-dark);
            border: 1px solid #ddd6fe;
            font-size: 13px;
            font-weight: 900;
        }

        .skill-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
            margin-top: 18px;
        }

        .skill-item {
            min-height: 112px;
            border: 1px solid var(--border);
            background: var(--surface);
            border-radius: 18px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            padding: 18px;
            font-weight: 900;
            color: var(--text);
            transition: 0.2s ease;
        }

        .skill-item span {
            font-size: 26px;
            margin-bottom: 8px;
        }

        .skill-item small {
            display: block;
            margin-top: 4px;
            color: var(--muted);
            font-weight: 700;
        }

        .skill-item:hover {
            transform: translateY(-4px);
            border-color: #c4b5fd;
            box-shadow: 0 18px 46px rgba(124, 58, 237, 0.14);
        }

        .project-card {
            padding: 0;
            overflow: hidden;
            transition: 0.2s ease;
        }

        .project-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow);
        }

        .project-thumb {
            min-height: 180px;
            background:
                radial-gradient(circle at 20% 20%, rgba(124, 58, 237, 0.25), transparent 26%),
                linear-gradient(135deg, #0f172a, #312e81);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .project-thumb span {
            width: 74px;
            height: 74px;
            border-radius: 22px;
            background: rgba(255, 255, 255, 0.12);
            color: var(--white);
            border: 1px solid var(--border-dark);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            font-weight: 950;
            backdrop-filter: blur(12px);
        }

        .project-body {
            padding: 22px;
        }

        .project-card h3 {
            margin: 12px 0 8px;
            font-size: 21px;
            color: var(--text);
        }

        .project-card p {
            margin: 0;
            color: var(--muted);
        }

        .project-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-top: 18px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 7px 10px;
            border-radius: 999px;
            background: var(--secondary-soft);
            border: 1px solid #bfdbfe;
            color: #1d4ed8;
            font-size: 12px;
            font-weight: 900;
            text-transform: uppercase;
        }

        .progress {
            width: 100%;
            height: 9px;
            border-radius: 999px;
            background: #e9d5ff;
            overflow: hidden;
            margin-top: 15px;
            border: 1px solid #ddd6fe;
        }

        .progress-fill {
            height: 100%;
            border-radius: 999px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }

        .cta-section {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
            padding: 44px 0;
        }

        .cta-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .cta-card h2 {
            margin: 0;
            font-size: clamp(26px, 4vw, 38px);
            letter-spacing: -0.05em;
            line-height: 1.05;
        }

        .cta-card p {
            margin: 10px 0 0;
            color: rgba(255, 255, 255, 0.82);
        }

        .filter-bar {
            display: grid;
            grid-template-columns: 1fr 220px;
            gap: 14px;
            margin: 28px 0;
        }

        .form-control {
            width: 100%;
            min-height: 48px;
            padding: 12px 15px;
            border-radius: 16px;
            border: 1px solid var(--border);
            background: var(--surface);
            color: var(--text);
            outline: none;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.12);
        }

        textarea.form-control {
            min-height: 160px;
            resize: vertical;
        }

        .form-grid {
            display: grid;
            gap: 16px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 900;
            color: var(--text-soft);
        }

        .error {
            display: block;
            margin-top: 6px;
            color: #dc2626;
            font-size: 13px;
            font-weight: 800;
        }

        .alert-success {
            padding: 14px 16px;
            border-radius: 18px;
            border: 1px solid #bbf7d0;
            background: #f0fdf4;
            color: #166534;
            font-weight: 900;
            margin-bottom: 18px;
        }

        .detail-hero {
            padding: 60px 0 30px;
        }

        .detail-card {
            padding: clamp(24px, 5vw, 46px);
        }

        .detail-section {
            margin-top: 32px;
            padding-top: 26px;
            border-top: 1px solid var(--border);
        }

        .detail-section h2 {
            margin: 0 0 10px;
            font-size: 26px;
            letter-spacing: -0.05em;
        }

        .diagram-box {
            margin-top: 16px;
            border-radius: 24px;
            border: 1px solid var(--border);
            background: var(--surface-soft);
            overflow: hidden;
        }

        .diagram-box img {
            width: 100%;
            height: auto;
        }

        .empty {
            padding: 28px;
            border: 1px dashed #c4b5fd;
            border-radius: 24px;
            background: var(--surface);
            color: var(--muted);
            text-align: center;
            font-weight: 800;
        }

        .contact-info {
            display: grid;
            gap: 14px;
            margin-top: 22px;
        }

        .contact-info-item {
            padding: 16px;
            border-radius: 18px;
            background: var(--surface-soft);
            border: 1px solid var(--border);
        }

        .contact-info-item strong {
            display: block;
            margin-bottom: 4px;
            color: var(--text);
        }

        .site-footer {
            background: #070b18;
            color: rgba(255, 255, 255, 0.72);
            border-top: 1px solid rgba(255, 255, 255, 0.10);
            padding: 38px 0;
        }

        .footer-centered {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 18px;
        }

        .footer-brand-center {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 14px;
        }

        .footer-logo {
            width: 46px;
            height: 46px;
            border-radius: 15px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--white);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 950;
            box-shadow: 0 16px 34px rgba(124, 58, 237, 0.34);
        }

        .footer-name {
            display: block;
            color: var(--white);
            font-size: 20px;
            font-weight: 950;
            line-height: 1.1;
            letter-spacing: -0.04em;
        }

        .footer-role {
            display: block;
            margin-top: 4px;
            color: #c4b5fd;
            font-size: 14px;
            font-weight: 800;
        }

        .footer-line {
            width: min(100%, 760px);
            height: 1px;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.16),
                rgba(124, 58, 237, 0.45),
                rgba(255, 255, 255, 0.16),
                transparent
            );
        }

        .footer-menu-center {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .footer-menu-center a {
            color: rgba(255, 255, 255, 0.72);
            font-size: 14px;
            font-weight: 850;
            transition: 0.2s ease;
        }

        .footer-menu-center a:hover {
            color: var(--white);
        }

        .footer-dot {
            color: var(--primary);
            font-weight: 950;
        }

        .footer-copy {
            color: rgba(255, 255, 255, 0.48);
            font-size: 13px;
            font-weight: 750;
        }

        @media (max-width: 940px) {
            .container {
                width: min(100% - 32px, 1320px);
            }

            .hero-grid,
            .grid-2,
            .grid-3,
            .filter-bar {
                grid-template-columns: 1fr;
            }

            .stats-dark {
                grid-template-columns: repeat(2, 1fr);
            }

            .skill-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .navbar {
                align-items: flex-start;
                flex-direction: column;
                padding: 16px 0;
            }

            .nav-links {
                width: 100%;
                overflow-x: auto;
                justify-content: flex-start;
            }

            .hero-dark {
                padding: 52px 0 30px;
            }

            .terminal-card {
                min-height: 390px;
            }

            .cta-card {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-width: 560px) {
            .container {
                width: min(100% - 24px, 1320px);
            }

            .stats-dark,
            .skill-grid {
                grid-template-columns: 1fr;
            }

            .hero-title {
                font-size: 48px;
            }

            .section-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .terminal-body {
                padding: 22px 18px;
                font-size: 13px;
            }

            .terminal-title {
                display: none;
            }

            .footer-brand-center {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>

<body>
    <header class="site-header">
        <div class="container navbar">
            <a href="{{ route('home') }}" class="brand">
                <span class="brand-mark">&lt;/&gt;</span>
                <span>Ikkkyyyss</span>
            </a>

            <nav class="nav-links">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    Home
                </a>

                <a href="{{ route('home') }}#skills">
                    Skills
                </a>

                <a href="{{ route('projects.index') }}" class="{{ request()->routeIs('projects.*') ? 'active' : '' }}">
                    Projects
                </a>

                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                    Contact
                </a>
            </nav>
        </div>
    </header>

    <main class="main">
        {{ $slot }}
    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="footer-centered">
                <div class="footer-brand-center">
                    <span class="footer-logo">&lt;/&gt;</span>

                    <div>
                        <span class="footer-name">Ikkkyyyss</span>
                        <span class="footer-role">Laravel Web Developer</span>
                    </div>
                </div>

                <div class="footer-line"></div>

                <div class="footer-menu-center">
                    <a href="{{ route('home') }}">Home</a>
                    <span class="footer-dot">•</span>
                    <a href="{{ route('home') }}#skills">Skills</a>
                    <span class="footer-dot">•</span>
                    <a href="{{ route('projects.index') }}">Projects</a>
                    <span class="footer-dot">•</span>
                    <a href="{{ route('contact') }}">Contact</a>
                </div>

                <div class="footer-copy">
                    © {{ date('Y') }} Ikkkyyyss. Built with Laravel, Livewire, Filament V3 & MariaDB.
                </div>
            </div>
        </div>
    </footer>

    @livewireScripts
</body>
</html>