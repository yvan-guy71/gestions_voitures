<?php

namespace App\Http\Controllers;

use App\Models\Techniciens;
use Illuminate\Http\Request;

class TechniciensController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $techniciens = Techniciens::latest()->get();
        return view('techniciens.index', compact('techniciens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('techniciens.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'specialite' => 'required|string|max:255',
        ], [
            'nom.required' => 'Le nom est obligatoire.',
            'prenom.required' => 'Le prénom est obligatoire.',
            'specialite.required' => 'La spécialité est obligatoire.',
        ]);

        Techniciens::create($validated);

        return redirect()->route('techniciens.index')
            ->with('success', 'Technicien créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Techniciens $technicien)
    {
        $technicien->load('reparations.vehicule');
        return view('techniciens.show', compact('technicien'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Techniciens $technicien)
    {
        return view('techniciens.edit', compact('technicien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Techniciens $technicien)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'specialite' => 'required|string|max:255',
        ], [
            'nom.required' => 'Le nom est obligatoire.',
            'prenom.required' => 'Le prénom est obligatoire.',
            'specialite.required' => 'La spécialité est obligatoire.',
        ]);

        $technicien->update($validated);

        return redirect()->route('techniciens.index')
            ->with('success', 'Technicien modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Techniciens $technicien)
    {
        $technicien->delete('id');

        return redirect()->route('techniciens.index')
            ->with('success', 'Technicien supprimé avec succès.');
    }
}
