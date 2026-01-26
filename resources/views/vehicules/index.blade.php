@extends('layouts.app')

@section('title', 'Liste des Véhicules')

@section('content')
<div class="container">
    <div class="flex-between mb-6" style="margin-top: 2rem;">
        <div>
            <h2 class="section-title" style="text-align: left; margin-bottom: 0.5rem;">Nos Véhicules</h2>
            <p class="text-gray-500">Gérez votre flotte automobile avec efficacité</p>
        </div>
        <a href="{{ route('vehicules.create') }}" class="btn btn-primary">
            <span>+</span> Ajouter un véhicule
        </a>
    </div>

    @if($vehicules->isEmpty())
        <div class="empty-state">
            <div style="font-size: 3rem; margin-bottom: 1rem; color: var(--primary-color);"><i class="fas fa-car"></i></div>
            <h3>Aucun véhicule enregistré</h3>
            <p>Commencez par ajouter votre premier véhicule pour le suivi.</p>
            <a href="{{ route('vehicules.create') }}" class="btn btn-primary mt-4"><i class="fas fa-plus"></i> Ajouter un véhicule</a>
        </div>
    @else
        <div class="grid-container">
            @foreach($vehicules as $vehicule)
                <div class="modern-card">
                    <div class="card-image-header">
                        <i class="fas fa-car" style="font-size: 2.5rem;"></i>
                    </div>
                    <div class="card-content">
                        <div class="card-header-title">
                            {{ $vehicule->marque }} {{ $vehicule->modele }}
                        </div>
                        <div class="card-subtitle">
                            <i class="fas fa-hashtag"></i> {{ $vehicule->immatriculation }}
                        </div>
                        
                        <div style="margin-bottom: 1rem;">
                            <span class="status-badge status-active">
                                <i class="far fa-calendar-alt"></i> {{ $vehicule->annee }}
                            </span>
                            <span class="status-badge status-pending" style="margin-left: 0.5rem;">
                                <i class="fas fa-tachometer-alt"></i> {{ number_format($vehicule->kilometrage, 0, ',', ' ') }} km
                            </span>
                        </div>

                        <div class="card-meta">
                            <a href="{{ route('vehicules.show', $vehicule) }}" class="btn-link">
                                Voir détails <i class="fas fa-arrow-right"></i>
                            </a>
                            <div class="flex gap-2">
                                <a href="{{ route('vehicules.edit', $vehicule) }}" class="btn-link" style="color: var(--gray-500);">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('vehicules.destroy', $vehicule) }}" method="POST" class="inline-form" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce véhicule ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-link btn-link-danger" style="padding: 0;">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
