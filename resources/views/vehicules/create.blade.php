@extends('layouts.app')

@section('title', 'Ajouter un Véhicule')

@section('content')
<div class="container">
    <div class="mb-6">
        <h2 class="page-title">Ajouter un Véhicule</h2>
        <p class="page-subtitle">Remplissez le formulaire ci-dessous pour ajouter un nouveau véhicule.</p>
    </div>
    <div class="card">
        <form action="{{ route('vehicules.store') }}" method="POST" class="card-body">
            @csrf
            <div class="form-grid">
                <div class="form-group">
                    <label for="immatriculation" class="form-label">Immatriculation *</label>
                    <input type="text" name="immatriculation" id="immatriculation" placeholder="Veuillez respectez le format AB-1234..." value="{{ old('immatriculation') }}" required
                        class="form-input @error('immatriculation') error @enderror">
                    @error('immatriculation')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="marque" class="form-label">Marque *</label>
                    <input type="text" name="marque" id="marque" value="{{ old('marque') }}" required
                        class="form-input @error('marque') error @enderror">
                    @error('marque')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="modele" class="form-label">Modèle *</label>
                    <input type="text" name="modele" id="modele" value="{{ old('modele') }}" required
                        class="form-input @error('modele') error @enderror">
                    @error('modele')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="couleur" class="form-label">Couleur *</label>
                    <input type="text" name="couleur" id="couleur" value="{{ old('couleur') }}" required
                        class="form-input @error('couleur') error @enderror">
                    @error('couleur')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="annee" class="form-label">Année *</label>
                    <input type="number" name="annee" id="annee" value="{{ old('annee') }}" min="1900" max="{{ date('Y') + 1 }}" required
                        class="form-input @error('annee') error @enderror">
                    @error('annee')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kilometrage" class="form-label">Kilométrage *</label>
                    <input type="number" name="kilometrage" id="kilometrage" value="{{ old('kilometrage') }}" min="0" required
                        class="form-input @error('kilometrage') error @enderror">
                    @error('kilometrage')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="carrosserie" class="form-label">Carrosserie *</label>
                    <input type="text" name="carrosserie" id="carrosserie" value="{{ old('carrosserie') }}" required
                        class="form-input @error('carrosserie') error @enderror">
                    @error('carrosserie')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="energie" class="form-label">Énergie *</label>
                    <input type="text" name="energie" id="energie" value="{{ old('energie') }}" required
                        class="form-input @error('energie') error @enderror">
                    @error('energie')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="boite" class="form-label">Boîte *</label>
                    <input type="text" name="boite" id="boite" value="{{ old('boite') }}" required
                        class="form-input @error('boite') error @enderror">
                    @error('boite')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('vehicules.index') }}" class="btn btn-gray">
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
