@extends('layouts.app')

@section('title', 'Détails du Véhicule')

@section('content')
<div class="container">
    <div class="detail-container">
        <div class="detail-header">
            <h1 class="detail-title"><i class="fas fa-car"></i> {{ $vehicule->marque }} {{ $vehicule->modele }}</h1>
            <p class="detail-subtitle"><i class="fas fa-hashtag"></i> {{ $vehicule->immatriculation }}</p>
            <div style="margin-top: 2rem;">
                <a href="{{ route('vehicules.edit', $vehicule) }}" class="btn btn-secondary"><i class="fas fa-edit"></i> Modifier</a>
                <a href="{{ route('vehicules.index') }}" class="btn btn-gray" style="margin-left: 1rem;"><i class="fas fa-arrow-left"></i> Retour à la liste</a>
            </div>
        </div>
        <div class="detail-body">
            <h3 class="card-title" style="margin-bottom: 1.5rem; font-size: 1.5rem;"><i class="fas fa-info-circle"></i> Informations Générales</h3>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Marque</div>
                    <div class="info-value">{{ $vehicule->marque }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Modèle</div>
                    <div class="info-value">{{ $vehicule->modele }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Immatriculation</div>
                    <div class="info-value">{{ $vehicule->immatriculation }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Année</div>
                    <div class="info-value">{{ $vehicule->annee }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Kilométrage</div>
                    <div class="info-value">{{ number_format($vehicule->kilometrage, 0, ',', ' ') }} km</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Couleur</div>
                    <div class="info-value">{{ $vehicule->couleur }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Carrosserie</div>
                    <div class="info-value">{{ $vehicule->carrosserie }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Énergie</div>
                    <div class="info-value">{{ $vehicule->energie }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Boîte</div>
                    <div class="info-value">{{ $vehicule->boite }}</div>
                </div>
            </div>

            <div style="margin-top: 3rem;">
                <div class="flex-between mb-6">
                    <h3 class="card-title" style="font-size: 1.5rem;"><i class="fas fa-history"></i> Historique des Réparations</h3>
                    <a href="{{ route('reparations.create', ['vehicule_id' => $vehicule->id]) }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Ajouter une réparation
                    </a>
                </div>

                @if($vehicule->reparations->isEmpty())
                    <div class="empty-state" style="background: var(--gray-50); box-shadow: none; border: 1px dashed var(--gray-300);">
                        <p>Aucune réparation enregistrée pour ce véhicule.</p>
                    </div>
                @else
                    <div class="grid-container" style="grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));">
                        @foreach($vehicule->reparations as $reparation)
                            <div class="modern-card" style="box-shadow: none; border: 1px solid var(--gray-200);">
                                <div class="card-content">
                                    <div class="card-header-title" style="font-size: 1.1rem;">
                                        {{ $reparation->objet_reparation }}
                                    </div>
                                    <div class="card-subtitle">
                                        <i class="far fa-calendar-alt"></i> {{ $reparation->date->format('d/m/Y') }}
                                    </div>
                                    <div style="margin-top: auto;">
                                        <p class="text-sm text-gray-500">
                                            <i class="fas fa-user-cog"></i> {{ $reparation->technicien->prenom }} {{ $reparation->technicien->nom }}
                                        </p>
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
