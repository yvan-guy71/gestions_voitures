<?php

namespace App\Http\Controllers;

use App\Models\Reparations;
use App\Models\Vehicules;
use App\Models\Techniciens;
use Illuminate\Http\Request;

class ReparationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reparations = Reparations::with(['vehicule', 'technicien'])->latest()->get();
        return view('reparations.index', compact('reparations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicules = Vehicules::all();
        $techniciens = Techniciens::all();
        return view('reparations.create', compact('vehicules', 'techniciens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicule_id' => 'required|exists:vehicules,id',
            'technicien_id' => 'required|exists:techniciens,id',
            'date' => 'required|date',
            'duree_main_oeuvre' => 'required|integer|min:1',
            'objet_reparation' => 'required|string',
        ], [
            'vehicule_id.required' => 'Le véhicule est obligatoire.',
            'vehicule_id.exists' => 'Le véhicule sélectionné n\'existe pas.',
            'technicien_id.required' => 'Le technicien est obligatoire.',
            'technicien_id.exists' => 'Le technicien sélectionné n\'existe pas.',
            'date.required' => 'La date est obligatoire.',
            'date.date' => 'La date doit être valide.',
            'duree_main_oeuvre.required' => 'La durée de main d\'œuvre est obligatoire.',
            'duree_main_oeuvre.integer' => 'La durée doit être un nombre.',
            'duree_main_oeuvre.min' => 'La durée doit être au moins 1 heure.',
            'objet_reparation.required' => 'L\'objet de la réparation est obligatoire.',
        ]);

        Reparations::create($validated);

        return redirect()->route('reparations.index')
            ->with('success', 'Réparation créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reparations $reparation)
    {
        $reparation->load(['vehicule', 'technicien']);
        return view('reparations.show', compact('reparation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reparations $reparation)
    {
        $vehicules = Vehicules::all();
        $techniciens = Techniciens::all();
        return view('reparations.edit', compact('reparation', 'vehicules', 'techniciens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reparations $reparation)
    {
        $validated = $request->validate([
            'vehicule_id' => 'required|exists:vehicules,id',
            'technicien_id' => 'required|exists:techniciens,id',
            'date' => 'required|date',
            'duree_main_oeuvre' => 'required|integer|min:1',
            'objet_reparation' => 'required|string',
        ], [
            'vehicule_id.required' => 'Le véhicule est obligatoire.',
            'vehicule_id.exists' => 'Le véhicule sélectionné n\'existe pas.',
            'technicien_id.required' => 'Le technicien est obligatoire.',
            'technicien_id.exists' => 'Le technicien sélectionné n\'existe pas.',
            'date.required' => 'La date est obligatoire.',
            'date.date' => 'La date doit être valide.',
            'duree_main_oeuvre.required' => 'La durée de main d\'œuvre est obligatoire.',
            'duree_main_oeuvre.integer' => 'La durée doit être un nombre.',
            'duree_main_oeuvre.min' => 'La durée doit être au moins 1 heure.',
            'objet_reparation.required' => 'L\'objet de la réparation est obligatoire.',
        ]);

        $reparation->update($validated);

        return redirect()->route('reparations.index')
            ->with('success', 'Réparation modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reparations $reparation)
    {
        $reparation->delete('$id');

        return redirect()->route('reparations.index')
            ->with('success', 'Réparation supprimée avec succès.');
    }
}
