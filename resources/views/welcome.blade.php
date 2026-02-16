@extends('layouts.app')
@section('title', 'Tableau de bord GarageNova')
@section('content')

    <section class="dashboard-hero">
        <div class="dashboard-hero-inner">
            <div class="dashboard-hero-main">
                <h1 class="dashboard-title">Vue d’ensemble de votre atelier</h1>
                <p class="dashboard-subtitle">
                    Suivez en un coup d’œil vos véhicules, vos techniciens et vos interventions en cours.
                </p>
                <div class="dashboard-actions">
                    <a href="{{ route('vehicules.create') }}" class="btn btn-primary">
                        <i class="fa-solid fa-plus"></i>
                        <span>Ajouter un véhicule</span>
                    </a>
                    <a href="{{ route('reparations.index') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-list-check"></i>
                        <span>Voir les interventions</span>
                    </a>
                </div>
            </div>
            <div class="dashboard-hero-stats">
                <div class="stat-card">
                    <div class="stat-label">Véhicules enregistrés</div>
                    <div class="stat-value">{{ \App\Models\Vehicules::count() }}</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Techniciens actifs</div>
                    <div class="stat-value">{{ \App\Models\Techniciens::count() }}</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Réparations enregistrées</div>
                    <div class="stat-value">{{ \App\Models\Reparations::count() }}</div>
                </div>
            </div>
        </div>
    </section>

    <section class="dashboard-grid">
        <div class="dashboard-panel">
            <div class="panel-header">
                <h2 class="panel-title">Véhicules récents</h2>
                <a href="{{ route('vehicules.index') }}" class="panel-link">Tout voir</a>
            </div>
            <div class="panel-body">
                @php
                    $recentVehicules = \App\Models\Vehicules::latest()->take(5)->get();
                @endphp
                @if($recentVehicules->isEmpty())
                    <p>Aucun véhicule enregistré pour le moment.</p>
                @else
                    <ul class="panel-list">
                        @foreach($recentVehicules as $vehicule)
                            <li class="panel-list-item">
                                <div>
                                    <div class="panel-item-title">{{ $vehicule->marque }} {{ $vehicule->modele }}</div>
                                    <div class="panel-item-subtitle">{{ $vehicule->immatriculation }}</div>
                                </div>
                                <a href="{{ route('vehicules.show', $vehicule) }}" class="btn btn-sm btn-gray">
                                    Détails
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        <div class="dashboard-panel">
            <div class="panel-header">
                <h2 class="panel-title">Techniciens</h2>
                <a href="{{ route('techniciens.index') }}" class="panel-link">Gérer</a>
            </div>
            <div class="panel-body">
                @php
                    $recentTechs = \App\Models\Techniciens::latest()->take(5)->get();
                @endphp
                @if($recentTechs->isEmpty())
                    <p>Aucun technicien enregistré pour le moment.</p>
                @else
                    <ul class="panel-list">
                        @foreach($recentTechs as $technicien)
                            <li class="panel-list-item">
                                <div>
                                    <div class="panel-item-title">{{ $technicien->nom }}</div>
                                    <div class="panel-item-subtitle">{{ $technicien->specialite }}</div>
                                </div>
                                <a href="{{ route('techniciens.show', $technicien) }}" class="btn btn-sm btn-gray">
                                    Profil
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        <div class="dashboard-panel dashboard-panel-wide">
            <div class="panel-header">
                <h2 class="panel-title">Interventions récentes</h2>
                <a href="{{ route('reparations.index') }}" class="panel-link">Historique complet</a>
            </div>
            <div class="panel-body">
                @php
                    $recentRep = \App\Models\Reparations::latest()->take(5)->get();
                @endphp
                @if($recentRep->isEmpty())
                    <p>Aucune intervention enregistrée pour le moment.</p>
                @else
                    <ul class="panel-list">
                        @foreach($recentRep as $rep)
                            <li class="panel-list-item">
                                <div>
                                    <div class="panel-item-title">{{ $rep->description }}</div>
                                    <div class="panel-item-subtitle">
                                        {{ optional($rep->vehicule)->immatriculation }} ·
                                        {{ optional($rep->technicien)->nom }}
                                    </div>
                                </div>
                                <span class="status-badge {{ $rep->date_fin ? 'status-active' : 'status-pending' }}">
                                    {{ $rep->date_fin ? 'Terminée' : 'En cours' }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </section>
@endsection
