@extends('layouts.app')

@section('title', 'Détails de la Réparation')

@section('content')
<div class="container">
    <div class="detail-container">
        <div class="detail-header" style="background: linear-gradient(135deg, #7c3aed, #4f46e5);">
            <h1 class="detail-title"><i class="fas fa-wrench"></i> {{ $reparation->objet_reparation }}</h1>
            <p class="detail-subtitle"><i class="far fa-calendar-alt"></i> Intervention du {{ $reparation->date->format('d/m/Y') }}</p>
            <div style="margin-top: 2rem;">
                <a href="{{ route('reparations.edit', $reparation) }}" class="btn btn-secondary"><i class="fas fa-edit"></i> Modifier</a>
                <a href="{{ route('reparations.index') }}" class="btn btn-gray" style="margin-left: 1rem;"><i class="fas fa-arrow-left"></i> Retour à la liste</a>
            </div>
        </div>

        <div class="detail-body">
            <h3 class="card-title" style="margin-bottom: 1.5rem; font-size: 1.5rem;"><i class="fas fa-info-circle"></i> Informations sur l'Intervention</h3>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Véhicule</div>
                    <div class="info-value">
                        <a href="{{ route('vehicules.show', $reparation->vehicule) }}" class="btn-link">
                            <i class="fas fa-car"></i> {{ $reparation->vehicule->marque }} {{ $reparation->vehicule->modele }}
                        </a>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-label">Technicien</div>
                    <div class="info-value">
                        <a href="{{ route('techniciens.show', $reparation->technicien) }}" class="btn-link">
                            <i class="fas fa-user-cog"></i> {{ $reparation->technicien->prenom }} {{ $reparation->technicien->nom }}
                        </a>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-label">Date</div>
                    <div class="info-value">{{ $reparation->date->format('d/m/Y') }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Heure</div>
                    <div class="info-value">{{ \Carbon\Carbon::parse($reparation->heure)->format('H:i') }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Montant Total</div>
                    <div class="info-value" style="font-weight: bold; color: var(--success-color);">
                        {{ number_format($reparation->montant_total, 2, ',', ' ') }} €
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-label">Durée Main d'Oeuvre</div>
                    <div class="info-value">{{ $reparation->duree_main_oeuvre }}h</div>
                </div>
            </div>

            <div style="margin-top: 3rem;">
                <h3 class="card-title" style="font-size: 1.5rem; margin-bottom: 1rem;"><i class="fas fa-tasks"></i> Description des Travaux</h3>
                <div class="modern-card" style="box-shadow: none; border: 1px solid var(--gray-200); background: var(--gray-50);">
                    <div class="card-content">
                        <p style="color: var(--gray-700); line-height: 1.6;">
                            {{ $reparation->description_travaux ?: 'Aucune description détaillée disponible.' }}
                        </p>
                    </div>
                </div>
            </div>

            @if($reparation->pieces_rechange)
            <div style="margin-top: 3rem;">
                <h3 class="card-title" style="font-size: 1.5rem; margin-bottom: 1rem;"><i class="fas fa-cogs"></i> Pièces de Rechange</h3>
                <div class="modern-card" style="box-shadow: none; border: 1px solid var(--gray-200); background: var(--gray-50);">
                    <div class="card-content">
                        <p style="color: var(--gray-700); line-height: 1.6;">
                            {{ $reparation->pieces_rechange }}
                        </p>
                    </div>
                </div>
            </div>
            @endif

            <div style="margin-top: 3rem;">
                <h3 class="card-title" style="font-size: 1.5rem; margin-bottom: 1rem;"><i class="fas fa-sticky-note"></i> Remarques</h3>
                <div class="modern-card" style="box-shadow: none; border: 1px solid var(--gray-200); background: var(--gray-50);">
                    <div class="card-content">
                        <p style="color: var(--gray-700); line-height: 1.6;">
                            {{ $reparation->remarques ?: 'Aucune remarque particulière.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
