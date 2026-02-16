@extends('layouts.app')

@section('title', 'Liste des Véhicules')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Véhicules</h1>
        <p class="page-subtitle">Vue d’ensemble de votre parc automobile.</p>
    </div>
    <a href="{{ route('vehicules.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus"></i>
        <span>Ajouter un véhicule</span>
    </a>
</div>

@if($vehicules->isEmpty())
    <div class="empty-state">
        <div style="font-size: 3rem; margin-bottom: 1rem; color: var(--primary-color);">
            <i class="fas fa-car"></i>
        </div>
        <h3>Aucun véhicule enregistré</h3>
        <p>Ajoutez votre premier véhicule pour démarrer le suivi atelier.</p>
        <a href="{{ route('vehicules.create') }}" class="btn btn-primary mt-4">
            <i class="fas fa-plus"></i> Ajouter un véhicule
        </a>
    </div>
@else
    <div class="dashboard-panel dashboard-panel-wide">
        <div class="panel-body">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Véhicule</th>
                        <th>Immatriculation</th>
                        <th>Année</th>
                        <th>Kilométrage</th>
                        <th style="width: 1%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vehicules as $vehicule)
                        <tr>
                            <td>{{ $vehicule->marque }} {{ $vehicule->modele }}</td>
                            <td>{{ $vehicule->immatriculation }}</td>
                            <td>{{ $vehicule->annee }}</td>
                            <td>{{ number_format($vehicule->kilometrage, 0, ',', ' ') }} km</td>
                            <td class="data-table-actions">
                                <a href="{{ route('vehicules.show', $vehicule) }}" class="btn btn-sm btn-gray">Détails</a>
                                <a href="{{ route('vehicules.edit', $vehicule) }}" class="btn btn-sm btn-secondary">Modifier</a>
                                <form action="{{ route('vehicules.destroy', $vehicule) }}" method="POST" class="inline-form" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce véhicule ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@endsection
