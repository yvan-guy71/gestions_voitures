@extends('layouts.app')

@section('title', 'Liste des Réparations')

@section('content')
<div class="container">
    <div class="flex-between mb-6" style="margin-top: 2rem;">
        <div>
            <h2 class="section-title" style="text-align: left; margin-bottom: 0.5rem;">Suivi des Réparations</h2>
            <p class="text-gray-500">Historique et interventions en cours</p>
        </div>
        <a href="{{ route('reparations.create') }}" class="btn btn-primary">
            <span>+</span> Ajouter une réparation
        </a>
    </div>

    @if($reparations->isEmpty())
        <div class="empty-state">
            <div style="font-size: 3rem; margin-bottom: 1rem; color: var(--primary-color);"><i class="fas fa-wrench"></i></div>
            <h3>Aucune réparation enregistrée</h3>
            <p>Commencez à suivre les maintenances et réparations.</p>
            <a href="{{ route('reparations.create') }}" class="btn btn-primary mt-4"><i class="fas fa-plus"></i> Ajouter une réparation</a>
        </div>
    @else
        <div class="grid-container">
            @foreach($reparations as $reparation)
                <div class="modern-card">
                    <div class="card-image-header" style="background: linear-gradient(135deg, #7c3aed, #4f46e5);">
                        <i class="fas fa-cogs" style="font-size: 2.5rem;"></i>
                    </div>
                    <div class="card-content">
                        <div class="card-header-title">
                            {{ $reparation->objet_reparation }}
                        </div>
                        <div class="card-subtitle">
                            <i class="fas fa-car"></i> {{ $reparation->vehicule->marque }} {{ $reparation->vehicule->modele }}
                        </div>
                        
                        <div style="margin-bottom: 1rem;">
                            <p class="text-sm text-gray-500">
                                <i class="fas fa-user-cog"></i> {{ $reparation->technicien->prenom }} {{ $reparation->technicien->nom }}
                            </p>
                            <p class="text-sm text-gray-500">
                                <i class="far fa-calendar-alt"></i> {{ $reparation->date->format('d/m/Y') }}
                            </p>
                            <p class="text-sm text-gray-500">
                                <i class="fas fa-clock"></i> {{ $reparation->duree_main_oeuvre }}h
                            </p>
                        </div>

                        <div class="card-meta">
                            <a href="{{ route('reparations.show', $reparation) }}" class="btn-link">
                                Voir détails <i class="fas fa-arrow-right"></i>
                            </a>
                            <div class="flex gap-2">
                                <a href="{{ route('reparations.edit', $reparation) }}" class="btn-link" style="color: var(--gray-500);">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('reparations.destroy', $reparation) }}" method="POST" class="inline-form" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette réparation ?');">
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
