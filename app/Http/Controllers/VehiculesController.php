<?php

namespace App\Http\Controllers;

use App\Models\Vehicules;
use Illuminate\Http\Request;

class VehiculesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicules = Vehicules::latest()->get();
        return view('vehicules.index', compact('vehicules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehicules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'immatriculation' => 'required|string|max:255|unique:vehicules,immatriculation,|regex:/^[A-Z]{2}-[0-9]{4}$/',
            'marque' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'couleur' => 'required|string|max:255',
            'annee' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'kilometrage' => 'required|integer|min:0',
            'carrosserie' => 'required|string|max:255',
            'energie' => 'required|string|max:255',
            'boite' => 'required|string|max:255',
        ], [
            'immatriculation.required' => 'L\'immatriculation est obligatoire.',
            'immatriculation.unique' => 'Cette immatriculation existe déjà.',
            'immatriculation.regex' => 'Format d\'immatriculation invalide. Utilisez le format AA-1234.',
            'marque.required' => 'La marque est obligatoire.',
            'modele.required' => 'Le modèle est obligatoire.',
            'couleur.required' => 'La couleur est obligatoire.',
            'annee.required' => 'L\'année est obligatoire.',
            'annee.integer' => 'L\'année doit être un nombre.',
            'kilometrage.required' => 'Le kilométrage est obligatoire.',
            'kilometrage.integer' => 'Le kilométrage doit être un nombre.',
            'carrosserie.required' => 'La carrosserie est obligatoire.',
            'energie.required' => 'L\'énergie est obligatoire.',
            'boite.required' => 'La boîte est obligatoire.',
        ]);

        Vehicules::create($validated);

        return redirect()->route('vehicules.index')
            ->with('success', 'Véhicule créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicules $vehicule)
    {
        $vehicule->load('reparations.technicien');
        return view('vehicules.show', compact('vehicule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicules $vehicule)
    {
        return view('vehicules.edit', compact('vehicule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicules $vehicule)
    {
        $validated = $request->validate([
            'immatriculation' => 'required|string|max:255|unique:vehicules,immatriculation,' . $vehicule->id,
            'marque' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'couleur' => 'required|string|max:255',
            'annee' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'kilometrage' => 'required|integer|min:0',
            'carrosserie' => 'required|string|max:255',
            'energie' => 'required|string|max:255',
            'boite' => 'required|string|max:255',
        ], [
            'immatriculation.required' => 'L\'immatriculation est obligatoire.',
            'immatriculation.unique' => 'Cette immatriculation existe déjà.',
            'marque.required' => 'La marque est obligatoire.',
            'modele.required' => 'Le modèle est obligatoire.',
            'couleur.required' => 'La couleur est obligatoire.',
            'annee.required' => 'L\'année est obligatoire.',
            'annee.integer' => 'L\'année doit être un nombre.',
            'kilometrage.required' => 'Le kilométrage est obligatoire.',
            'kilometrage.integer' => 'Le kilométrage doit être un nombre.',
            'carrosserie.required' => 'La carrosserie est obligatoire.',
            'energie.required' => 'L\'énergie est obligatoire.',
            'boite.required' => 'La boîte est obligatoire.',
        ]);

        $vehicule->update($validated);

        return redirect()->route('vehicules.index')
            ->with('success', 'Véhicule modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicules $vehicule)
    {
        $vehicule->delete('id');

        return redirect()->route('vehicules.index')
            ->with('success', 'Véhicule supprimé avec succès.');
    }
}
