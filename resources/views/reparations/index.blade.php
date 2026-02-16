@extends('layouts.app')

@section('title', 'Liste des Réparations')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Interventions</h1>
        <p class="page-subtitle">Historique et réparations en cours sur vos véhicules.</p>
    </div>
    <a href="{{ route('reparations.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus"></i>
        <span>Ajouter une réparation</span>
    </a>
</div>

@if($reparations->isEmpty())
    <div class="empty-state">
        <div style="font-size: 3rem; margin-bottom: 1rem; color: var(--primary-color);">
            <i class="fas fa-wrench"></i>
        </div>
        <h3>Aucune réparation enregistrée</h3>
        <p>Commencez à suivre vos maintenances et interventions.</p>
        <a href="{{ route('reparations.create') }}" class="btn btn-primary mt-4">
            <i class="fas fa-plus"></i> Ajouter une réparation
        </a>
    </div>
@else
    <div class="dashboard-panel dashboard-panel-wide">
        <div class="panel-body">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Objet</th>
                        <th>Véhicule</th>
                        <th>Technicien</th>
                        <th>Date</th>
                        <th>Durée</th>
                        <th>Statut</th>
                        <th style="width: 1%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reparations as $reparation)
                        <tr>
                            <td>{{ $reparation->objet_reparation }}</td>
                            <td>{{ $reparation->vehicule->immatriculation ?? '' }}</td>
                            <td>{{ $reparation->technicien->prenom ?? '' }} {{ $reparation->technicien->nom ?? '' }}</td>
                            <td>{{ $reparation->date ? $reparation->date->format('d/m/Y') : '' }}</td>
                            <td>{{ $reparation->duree_main_oeuvre }} h</td>
                            <td>
                                <span class="status-badge status-pending">
                                    En cours
                                </span>
                            </td>
                            <td class="data-table-actions">
                                <a href="{{ route('reparations.show', $reparation) }}" class="btn btn-sm btn-gray">Détails</a>
                                <a href="{{ route('reparations.edit', $reparation) }}" class="btn btn-sm btn-secondary">Modifier</a>
                                <form action="{{ route('reparations.destroy', $reparation) }}" method="POST" class="inline-form" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette réparation ?');">
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
