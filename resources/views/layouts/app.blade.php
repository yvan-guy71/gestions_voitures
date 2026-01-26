<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DriveUp')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <nav class="nav">
        <div class="nav-container">
            <div class="nav-brand" style="cursor: pointer;" onclick="window.location.href='{{ route('home') }}'">DriveUp</div>

            <div class="nav-links">
                <a href="{{ route('vehicules.index') }}" class="nav-link">
                    Véhicules
                </a>
                <a href="{{ route('techniciens.index') }}" class="nav-link">
                    Techniciens
                </a>
                <a href="{{ route('reparations.index') }}" class="nav-link">
                    Réparations
                </a>
            </div>
        </div>
    </nav>

    <main class="main-content">
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

        @yield('content')
    </main>
    <footer>
        <div class="footer-section">
            <div class="footer-content">
                <span>&copy; {{ date('Y') }} DriveUp. Tous droits réservés.</span>
            </div>
            <div class="auteur">
                <span>Developper par Yvan</span>
            </div>
        </div>
    </footer>
</body>
</html>