@extends('layouts.app')

@section('title', 'Modifier une Réparation')

@section('content')
<div class="container">
    <div class="mb-6">
        <h2 class="page-title">Modifier une Réparation</h2>
        <p class="page-subtitle">Modifiez les informations de la réparation ci-dessous.</p>
    </div>

    <div class="card">
        <form action="{{ route('reparations.update', $reparation) }}" method="POST" class="card-body">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <div class="form-group">
                    <label for="vehicule_id" class="form-label">Véhicule *</label>
                    <select name="vehicule_id" id="vehicule_id" required
                        class="form-select @error('vehicule_id') error @enderror">
                        <option value="">Sélectionnez un véhicule</option>
                        @foreach($vehicules as $vehicule)
                            <option value="{{ $vehicule->id }}" {{ old('vehicule_id', $reparation->vehicule_id) == $vehicule->id ? 'selected' : '' }}>
                                {{ $vehicule->marque }} {{ $vehicule->modele }} - {{ $vehicule->immatriculation }}
                            </option>
                        @endforeach
                    </select>
                    @error('vehicule_id')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="technicien_id" class="form-label">Technicien *</label>
                    <select name="technicien_id" id="technicien_id" required
                        class="form-select @error('technicien_id') error @enderror">
                        <option value="">Sélectionnez un technicien</option>
                        @foreach($techniciens as $technicien)
                            <option value="{{ $technicien->id }}" {{ old('technicien_id', $reparation->technicien_id) == $technicien->id ? 'selected' : '' }}>
                                {{ $technicien->prenom }} {{ $technicien->nom }} - {{ $technicien->specialite }}
                            </option>
                        @endforeach
                    </select>
                    @error('technicien_id')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="date" class="form-label">Date *</label>
                    <input type="date" name="date" id="date" value="{{ old('date', $reparation->date->format('Y-m-d')) }}" required
                        class="form-input @error('date') error @enderror">
                    @error('date')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="duree_main_oeuvre" class="form-label">Durée main d'œuvre (heures) *</label>
                    <input type="number" name="duree_main_oeuvre" id="duree_main_oeuvre" value="{{ old('duree_main_oeuvre', $reparation->duree_main_oeuvre) }}" min="1" required
                        class="form-input @error('duree_main_oeuvre') error @enderror">
                    @error('duree_main_oeuvre')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group form-grid-full">
                    <label for="objet_reparation" class="form-label">Objet de la réparation *</label>
                    <textarea name="objet_reparation" id="objet_reparation" rows="4" required
                        class="form-textarea @error('objet_reparation') error @enderror">{{ old('objet_reparation', $reparation->objet_reparation) }}</textarea>
                    @error('objet_reparation')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('reparations.index') }}" class="btn btn-gray">
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
