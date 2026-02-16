@extends('layouts.app')

@section('title', 'Liste des Techniciens')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Techniciens</h1>
        <p class="page-subtitle">Votre équipe atelier et ses spécialités.</p>
    </div>
    <a href="{{ route('techniciens.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus"></i>
        <span>Ajouter un technicien</span>
    </a>
</div>

@if($techniciens->isEmpty())
    <div class="empty-state">
        <div style="font-size: 3rem; margin-bottom: 1rem; color: var(--primary-color);">
            <i class="fas fa-user-cog"></i>
        </div>
        <h3>Aucun technicien enregistré</h3>
        <p>Créez votre équipe technique pour suivre vos interventions.</p>
        <a href="{{ route('techniciens.create') }}" class="btn btn-primary mt-4">
            <i class="fas fa-plus"></i> Ajouter un technicien
        </a>
    </div>
@else
    <div class="dashboard-panel dashboard-panel-wide">
        <div class="panel-body">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Spécialité</th>
                        <th style="width: 1%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($techniciens as $technicien)
                        <tr>
                            <td>{{ $technicien->prenom }} {{ $technicien->nom }}</td>
                            <td>{{ $technicien->specialite }}</td>
                            <td class="data-table-actions">
                                <a href="{{ route('techniciens.show', $technicien) }}" class="btn btn-sm btn-gray">Profil</a>
                                <a href="{{ route('techniciens.edit', $technicien) }}" class="btn btn-sm btn-secondary">Modifier</a>
                                <form action="{{ route('techniciens.destroy', $technicien) }}" method="POST" class="inline-form" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce technicien ?');">
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
