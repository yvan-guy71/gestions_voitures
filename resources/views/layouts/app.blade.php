<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GarageNova')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <header class="app-header">
        <div class="app-header-bar">
            <div class="app-logo" onclick="window.location.href='{{ route('home') }}'">
                <span class="app-logo-mark">GN</span>
                <div class="app-logo-text">
                    <span class="app-logo-title">GarageNova</span>
                    <span class="app-logo-subtitle">Tableau de bord atelier</span>
                </div>
            </div>
            <nav class="app-nav">
                <a href="{{ route('vehicules.index') }}" class="app-nav-link">
                    <i class="fa-solid fa-car-side"></i>
                    <span>Véhicules</span>
                </a>
                <a href="{{ route('techniciens.index') }}" class="app-nav-link">
                    <i class="fa-solid fa-user-gear"></i>
                    <span>Techniciens</span>
                </a>
                <a href="{{ route('reparations.index') }}" class="app-nav-link">
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                    <span>Interventions</span>
                </a>
            </nav>
        </div>
    </header>

    <main class="main-shell">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error" role="alert">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="page-shell">
            @yield('content')
        </section>
    </main>

    <footer class="app-footer">
        <div class="footer-content">
            <div>
                <span>&copy; {{ date('Y') }} GarageNova · Plateforme de suivi d’atelier</span>
            </div>
        </div>
    </footer>
</body>
</html>
