@extends('layouts.app')

@section('title', 'Détails du Technicien')

@section('content')
<div class="container">
    <div class="detail-container">
        <div class="detail-header" style="background: linear-gradient(135deg, var(--success-color), #059669);">
            <h1 class="detail-title"><i class="fas fa-user-tie"></i> {{ $technicien->prenom }} {{ $technicien->nom }}</h1>
            <p class="detail-subtitle"><i class="fas fa-tools"></i> {{ $technicien->specialite }}</p>
            <div style="margin-top: 2rem;">
                <a href="{{ route('techniciens.edit', $technicien) }}" class="btn btn-secondary"><i class="fas fa-edit"></i> Modifier</a>
                <a href="{{ route('techniciens.index') }}" class="btn btn-gray" style="margin-left: 1rem;"><i class="fas fa-arrow-left"></i> Retour à la liste</a>
            </div>
        </div>

        <div class="detail-body">
            <h3 class="card-title" style="margin-bottom: 1.5rem; font-size: 1.5rem;"><i class="fas fa-id-card"></i> Informations Personnelles</h3>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Prénom</div>
                    <div class="info-value">{{ $technicien->prenom }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Nom</div>
                    <div class="info-value">{{ $technicien->nom }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Spécialité</div>
                    <div class="info-value">{{ $technicien->specialite }}</div>
                </div>
            </div>

            <div style="margin-top: 3rem;">
                <div class="flex-between mb-6">
                    <h3 class="card-title" style="font-size: 1.5rem;"><i class="fas fa-clipboard-list"></i> Interventions Réalisées</h3>
                    <a href="{{ route('reparations.create', ['technicien_id' => $technicien->id]) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Ajouter une intervention
                    </a>
                </div>

                @if($technicien->reparations->isEmpty())
                    <div class="empty-state" style="background: var(--gray-50); box-shadow: none; border: 1px dashed var(--gray-300);">
                        <p>Aucune intervention enregistrée pour ce technicien.</p>
                    </div>
                @else
                    <div class="grid-container" style="grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));">
                        @foreach($technicien->reparations as $reparation)
                            <div class="modern-card" style="box-shadow: none; border: 1px solid var(--gray-200);">
                                <div class="card-content">
                                    <div class="card-header-title" style="font-size: 1.1rem;">
                                        {{ $reparation->objet_reparation }}
                                    </div>
                                    <div class="card-subtitle">
                                        <i class="far fa-calendar-alt"></i> {{ $reparation->date->format('d/m/Y') }}
                                    </div>
                                    <div style="margin-bottom: 1rem;">
                                        <p class="text-sm text-gray-500">
                                            <i class="fas fa-car"></i> {{ $reparation->vehicule->marque }} {{ $reparation->vehicule->modele }}
                                        </p>
                                    </div>
                                    <div style="margin-top: auto;">
                                        <a href="{{ route('reparations.show', $reparation) }}" class="btn-link" style="margin-top: 0.5rem; display: inline-block;">
                                            Voir détails <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
