@extends('layouts.app')

@section('title', 'Ajouter un Technicien')

@section('content')
<div class="container">
    <div class="mb-6">
        <h2 class="page-title">Ajouter un Technicien</h2>
        <p class="page-subtitle">Remplissez le formulaire ci-dessous pour ajouter un nouveau technicien.</p>
    </div>

    <div class="card">
        <form action="{{ route('techniciens.store') }}" method="POST" class="card-body">
            @csrf

            <div class="form-grid">
                <div class="form-group">
                    <label for="nom" class="form-label">Nom *</label>
                    <input type="text" name="nom" id="nom" value="{{ old('nom') }}" required
                        class="form-input @error('nom') error @enderror">
                    @error('nom')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="prenom" class="form-label">Prénom *</label>
                    <input type="text" name="prenom" id="prenom" value="{{ old('prenom') }}" required
                        class="form-input @error('prenom') error @enderror">
                    @error('prenom')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group form-grid-full">
                    <label for="specialite" class="form-label">Spécialité *</label>
                    <input type="text" name="specialite" id="specialite" value="{{ old('specialite') }}" required
                        class="form-input @error('specialite') error @enderror">
                    @error('specialite')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('techniciens.index') }}" class="btn btn-gray">
                    Annuler
                </a>
                <button type="submit" class="btn btn-primary">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
