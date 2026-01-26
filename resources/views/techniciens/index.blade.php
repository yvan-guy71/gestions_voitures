@extends('layouts.app')

@section('title', 'Liste des Techniciens')

@section('content')
<div class="container">
    <div class="flex-between mb-6" style="margin-top: 2rem;">
        <div>
            <h2 class="section-title" style="text-align: left; margin-bottom: 0.5rem;">Nos Techniciens</h2>
            <p class="text-gray-500">L'équipe d'experts à votre service</p>
        </div>
        <a href="{{ route('techniciens.create') }}" class="btn btn-primary">
            <span>+</span> Ajouter un technicien
        </a>
    </div>

    @if($techniciens->isEmpty())
        <div class="empty-state">
            <div style="font-size: 3rem; margin-bottom: 1rem; color: var(--primary-color);"><i class="fas fa-user-cog"></i></div>
            <h3>Aucun technicien enregistré</h3>
            <p>Créez votre équipe technique pour gérer les réparations.</p>
            <a href="{{ route('techniciens.create') }}" class="btn btn-primary mt-4"><i class="fas fa-plus"></i> Ajouter un technicien</a>
        </div>
    @else
        <div class="grid-container">
            @foreach($techniciens as $technicien)
                <div class="modern-card">
                    <div class="card-image-header" style="background: linear-gradient(135deg, var(--success-color), #059669);">
                        <i class="fas fa-user-tie" style="font-size: 2.5rem;"></i>
                    </div>
                    <div class="card-content">
                        <div class="card-header-title">
                            {{ $technicien->prenom }} {{ $technicien->nom }}
                        </div>
                        <div class="card-subtitle">
                            <i class="fas fa-tools"></i> {{ $technicien->specialite }}
                        </div>

                        <div class="card-meta">
                            <a href="{{ route('techniciens.show', $technicien) }}" class="btn-link">
                                Voir profil <i class="fas fa-arrow-right"></i>
                            </a>
                            <div class="flex gap-2">
                                <a href="{{ route('techniciens.edit', $technicien) }}" class="btn-link" style="color: var(--gray-500);">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('techniciens.destroy', $technicien) }}" method="POST" class="inline-form" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce technicien ?');">
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
