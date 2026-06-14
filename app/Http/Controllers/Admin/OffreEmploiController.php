<?php

namespace App\Http\Controllers\Admin;

use App\Models\Candidature;
use App\Models\OffreEmploi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class OffreEmploiController extends BaseController
{
    public function index()
    {
        $offreEmplois = OffreEmploi::withCount('candidatures')->get();
        return view('admin.offres.index', compact('offreEmplois'));
    }

    public function create()
    {
        return view('admin.offres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre'            => 'required|string|max:255',
            'entreprise'       => 'required|string|max:255',
            'ville'            => 'required|string|max:255',
            'type_emploi'      => 'required|string|max:255',
            'salaire'          => 'nullable|string|max:255',
            'description'      => 'required|string',
            'responsabilites'  => 'required|string',
            'exigences'        => 'required|string',
            'est_active'       => 'boolean',
            'date_publication' => 'nullable|date',
        ]);

        $offre = new OffreEmploi();
        $offre->titre            = $request->titre;
        $offre->entreprise       = $request->entreprise;
        $offre->ville            = $request->ville;
        $offre->type_emploi      = $request->type_emploi;
        $offre->salaire          = $request->salaire;
        $offre->description      = $request->description;
        $offre->responsabilites  = $request->responsabilites;
        $offre->exigences        = $request->exigences;
        $offre->est_active       = $request->boolean('est_active', true); // corrigé
        $offre->date_publication = $request->date_publication;
        $offre->save();

        return redirect()->route('admin.offres.index')
            ->with('success', 'Offre créée avec succès.');
    }

    public function edit($id)
    {
        $offreEmploi = OffreEmploi::findOrFail($id);
        return view('admin.offres.edit', compact('offreEmploi'));
    }

    public function update(Request $request, $id) // corrigé: ordre des paramètres (Request en premier)
    {
        $offreEmploi = OffreEmploi::findOrFail($id); // corrigé: find → findOrFail

        $request->validate([
            'titre'            => 'required|string|max:255',
            'entreprise'       => 'required|string|max:255',
            'ville'            => 'required|string|max:255',
            'type_emploi'      => 'required|string|max:255',
            'salaire'          => 'nullable|string|max:255',
            'description'      => 'required|string',
            'responsabilites'  => 'required|string',
            'exigences'        => 'required|string',
            'est_active'       => 'boolean',
            'date_publication' => 'nullable|date',
        ]);

        $offreEmploi->titre            = $request->titre;
        $offreEmploi->entreprise       = $request->entreprise;
        $offreEmploi->ville            = $request->ville;
        $offreEmploi->type_emploi      = $request->type_emploi;
        $offreEmploi->salaire          = $request->salaire;
        $offreEmploi->description      = $request->description;
        $offreEmploi->responsabilites  = $request->responsabilites;
        $offreEmploi->exigences        = $request->exigences;
        $offreEmploi->est_active       = $request->boolean('est_active'); // corrigé
        $offreEmploi->date_publication = $request->date_publication;
        $offreEmploi->save();

        return redirect()->route('admin.offres.index')
            ->with('success', 'Offre mise à jour.');
    }

    public function destroy($id)
    {
        $offreEmploi = OffreEmploi::findOrFail($id);
        $offreEmploi->delete();

        return redirect()->route('admin.offres.index')
            ->with('success', 'Offre supprimée.');
    }
}