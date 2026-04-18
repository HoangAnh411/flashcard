<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Flashcard Learning System')</title>
    <meta name="description" content="A flashcard learning system to create, manage, and study flashcards.">
    <style>
        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            /* Vibrant Flat Palette */
            --bg-body: #f8fafc;
            --bg-header: #4f46e5; /* Indigo */
            --bg-card: #ffffff;
            
            --border-default: #cbd5e1;
            --border-muted: #e2e8f0;
            
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --text-link: #2563eb;
            --text-white: #ffffff;
            
            --btn-primary-bg: #0ea5e9; /* Light Blue/Teal */
            --btn-primary-hover: #0284c7;
            --btn-primary-border: #0ea5e9;
            
            --btn-secondary-bg: #ffffff;
            --btn-secondary-hover: #f1f5f9;
            --btn-secondary-border: #cbd5e1;
            
            --btn-danger-bg: #ef4444;
            --btn-danger-hover: #dc2626;
            
            --radius: 8px;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
            background-color: var(--bg-body);
            color: var(--text-primary);
            line-height: 1.5;
            min-height: 100vh;
            font-size: 14px;
        }

        a {
            color: var(--text-link);
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* ===== Navbar ===== */
        .navbar {
            background: var(--bg-header);
            padding: 0 1.5rem;
            color: var(--text-white);
        }

        .navbar-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 60px;
        }

        .navbar-brand {
            font-weight: 600;
            font-size: 1.25rem;
            color: var(--text-white);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-brand:hover {
            text-decoration: none;
            color: rgba(255,255,255,0.8);
        }

        .navbar-links {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .navbar-links a {
            color: var(--text-white);
            font-weight: 600;
            font-size: 0.875rem;
            text-decoration: none;
            opacity: 0.8;
            transition: opacity 0.2s;
        }

        .navbar-links a:hover {
            opacity: 1;
            text-decoration: none;
        }

        .navbar-links a.active {
            opacity: 1;
            border-bottom: 2px solid var(--text-white);
            padding-bottom: 18px;
            margin-top: 20px;
        }

        /* ===== Main ===== */
        .main-content {
            padding: 2rem 3rem;
            max-width: 1280px;
            margin: 0 auto;
        }

        /* ===== Page Header ===== */
        .page-header {
            margin-bottom: 1.5rem;
            border-bottom: 1px solid var(--border-default);
            padding-bottom: 1rem;
        }

        .page-header h1 {
            font-size: 1.5rem;
            font-weight: 400;
            color: var(--text-primary);
            margin-bottom: 0.25rem;
        }

        .page-header p {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        /* ===== Buttons ===== */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 5px 16px;
            font-size: 0.875rem;
            font-weight: 500;
            line-height: 20px;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid;
            border-radius: var(--radius);
            appearance: none;
            text-decoration: none;
            transition: 0.2s cubic-bezier(0.3, 0, 0.5, 1);
        }

        .btn:hover {
            text-decoration: none;
        }

        .btn-primary {
            color: var(--text-white);
            background-color: var(--btn-primary-bg);
            border-color: var(--btn-primary-border);
        }

        .btn-primary:hover {
            background-color: var(--btn-primary-hover);
            border-color: var(--btn-primary-border);
        }

        .btn-secondary {
            color: var(--text-primary);
            background-color: var(--btn-secondary-bg);
            border-color: var(--btn-secondary-border);
        }

        .btn-secondary:hover {
            background-color: var(--btn-secondary-hover);
            border-color: var(--btn-secondary-border);
        }

        .btn-danger {
            color: var(--btn-danger-bg);
            background-color: var(--bg-card);
            border-color: var(--btn-secondary-border);
        }

        .btn-danger:hover {
            color: var(--text-white);
            background-color: var(--btn-danger-hover);
            border-color: var(--btn-primary-border);
        }

        .btn-sm {
            padding: 3px 12px;
            font-size: 0.75rem;
            line-height: 18px;
        }

        /* ===== Cards ===== */
        .card {
            background-color: var(--bg-card);
            border: 1px solid var(--border-default);
            border-radius: var(--radius);
            padding: 16px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);
        }

        /* ===== Forms ===== */
        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .form-control {
            width: 100%;
            padding: 5px 12px;
            font-size: 0.875rem;
            line-height: 20px;
            color: var(--text-primary);
            background-color: var(--bg-body);
            border: 1px solid var(--border-default);
            border-radius: var(--radius);
            outline: none;
            font-family: inherit;
        }

        .form-control:focus {
            border-color: var(--text-link);
            background-color: var(--bg-card);
            box-shadow: 0 0 0 3px rgba(9, 105, 218, 0.3);
        }

        .form-control::placeholder {
            color: var(--text-secondary);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%2357606a' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 32px;
        }

        .error-text {
            color: var(--btn-danger-bg);
            font-size: 0.75rem;
            margin-top: 4px;
        }

        /* ===== Alerts ===== */
        .alert {
            padding: 16px;
            border-radius: var(--radius);
            margin-bottom: 1rem;
            font-size: 0.875rem;
            border: 1px solid transparent;
        }

        .alert-success {
            color: #1a7f37;
            background-color: #dafbe1;
            border-color: rgba(45, 164, 78, 0.4);
        }

        .alert-danger {
            color: #cf222e;
            background-color: #ffebe9;
            border-color: rgba(255, 129, 130, 0.4);
        }

        /* ===== Badge ===== */
        .badge {
            display: inline-block;
            padding: 2px 7px;
            font-size: 12px;
            font-weight: 500;
            line-height: 18px;
            border: 1px solid transparent;
            border-radius: 2em;
        }

        .badge-category {
            color: var(--text-link);
            border-color: rgba(9, 105, 218, 0.2);
        }

        .badge-learned {
            color: #1a7f37;
            border-color: rgba(45, 164, 78, 0.2);
        }

        .badge-not-learned {
            color: var(--text-secondary);
            border-color: var(--border-default);
        }

        /* ===== Empty State ===== */
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            background: var(--bg-card);
            border: 1px solid var(--border-default);
            border-radius: var(--radius);
            color: var(--text-secondary);
        }

        .empty-state h3 {
            font-size: 1.25rem;
            color: var(--text-primary);
            margin-bottom: 8px;
        }

        .empty-state p {
            font-size: 0.875rem;
            margin-bottom: 16px;
        }

        /* ===== Grid ===== */
        .grid-2 {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 16px;
        }

        /* ===== Utilities ===== */
        .flex { display: flex; }
        .flex-between { display: flex; align-items: center; justify-content: space-between; }
        .flex-center { display: flex; align-items: center; justify-content: center; }
        .flex-gap { gap: 8px; }
        .flex-wrap { flex-wrap: wrap; }
        .mt-1 { margin-top: 8px; }
        .mt-2 { margin-top: 16px; }
        .mb-1 { margin-bottom: 8px; }
        .mb-2 { margin-bottom: 16px; }
        .text-center { text-align: center; }
        .text-muted { color: var(--text-secondary); }
        .text-sm { font-size: 12px; }
        .pre-wrap { white-space: pre-wrap; }

        /* Laravel Pagination Utilities */
        .pagination {
            display: flex;
            padding-left: 0;
            list-style: none;
            gap: 4px;
            flex-wrap: wrap;
            justify-content: center;
        }
        .page-item .page-link {
            position: relative;
            display: block;
            padding: 5px 10px;
            color: var(--text-primary);
            background-color: var(--bg-card);
            border: 1px solid var(--border-default);
            border-radius: var(--radius);
            text-decoration: none;
            font-size: 0.875rem;
            min-width: 32px;
            text-align: center;
        }
        .page-item.active .page-link {
            z-index: 3;
            color: var(--text-white);
            background-color: var(--text-link);
            border-color: var(--text-link);
        }
        .page-item.disabled .page-link {
            color: var(--text-secondary);
            pointer-events: none;
            background-color: var(--bg-body);
            border-color: var(--border-default);
        }
        .page-link:hover {
            z-index: 2;
            color: var(--text-link);
            background-color: var(--bg-body);
            border-color: var(--border-default);
            text-decoration: none;
        }

        .d-none { display: none !important; }
        .d-flex { display: flex !important; }
        .justify-content-between { justify-content: center !important; }
        .align-items-center { align-items: center !important; }
        
        nav p.text-muted { display: none !important; }
        nav .d-sm-flex > div:first-child { display: none !important; }
        
        @media (min-width: 640px) {
            .d-sm-none { display: none !important; }
            .d-sm-flex { display: flex !important; justify-content: center !important; }
            .d-sm-block { display: block !important; }
            .justify-content-sm-between { justify-content: center !important; }
            .align-items-sm-center { align-items: center !important; }
        }

        @media (max-width: 640px) {
            .navbar { padding: 0 1rem; }
            .main-content { padding: 1.25rem 1rem; }
            .page-header { display: flex; flex-direction: column; gap: 10px; }
            .page-header .flex-between { flex-direction: column; align-items: flex-start; gap: 10px; }
            .grid-2 { grid-template-columns: 1fr; }
        }

        /* ===== Modal ===== */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(27, 31, 36, 0.5);
            z-index: 2000;
            align-items: center;
            justify-content: center;
        }

        .modal-overlay.active { display: flex; }

        .modal-box {
            background: var(--bg-card);
            border: 1px solid var(--border-default);
            border-radius: var(--radius);
            padding: 24px;
            max-width: 400px;
            width: 90%;
            text-align: center;
            box-shadow: 0 8px 24px rgba(140, 149, 159, 0.2);
        }

        .modal-box h3 {
            font-size: 1.25rem;
            margin-bottom: 8px;
        }

        .modal-box p {
            color: var(--text-secondary);
            font-size: 0.875rem;
            margin-bottom: 24px;
        }

        .modal-actions {
            display: flex;
            gap: 8px;
            justify-content: center;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="navbar-inner">
            <a href="{{ route('dashboard') }}" class="navbar-brand">FlashLearn</a>
            <div class="navbar-links">
                <a href="{{ route('dashboard') }}"
                   class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('flashcards.index') }}"
                   class="{{ request()->routeIs('flashcards.index') || request()->routeIs('flashcards.create') || request()->routeIs('flashcards.edit') ? 'active' : '' }}">
                    Flashcards
                </a>
                <a href="{{ route('categories.index') }}"
                   class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">
                    Categories
                </a>
            </div>
        </div>
    </nav>

    <main class="main-content">
        @if(session('success'))
            <div class="alert alert-success" id="flash-alert">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger" id="flash-alert">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <div class="modal-overlay" id="deleteModal">
        <div class="modal-box">
            <h3>Confirm Delete</h3>
            <p id="deleteModalText">Are you sure you want to delete this item? This action cannot be undone.</p>
            <div class="modal-actions">
                <button class="btn btn-secondary" onclick="closeDeleteModal()">Cancel</button>
                <form id="deleteForm" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        setTimeout(() => {
            const alert = document.getElementById('flash-alert');
            if (alert) {
                alert.style.opacity = '0';
                alert.style.transition = 'opacity 0.3s';
                setTimeout(() => alert.remove(), 300);
            }
        }, 4000);

        function confirmDelete(url, message = 'Are you sure you want to delete this item? This action cannot be undone.') {
            document.getElementById('deleteForm').action = url;
            document.getElementById('deleteModalText').innerText = message;
            document.getElementById('deleteModal').classList.add('active');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('active');
        }

        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) closeDeleteModal();
        });
    </script>

    @yield('scripts')
</body>
</html>
