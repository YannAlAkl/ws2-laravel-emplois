<?php

namespace App\Http\Controllers\Admin;

use App\Models\Candidature;
use App\Models\OffreEmploi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class CandidatureController extends BaseController
{
    public function show()
    {
        $candidatures = Candidature::all();
        return view('candidatures.show', compact('candidatures'));
    }

    public function postuler($id)
    {
        $offreEmploi = OffreEmploi::findOrFail($id);
        return view('candidatures.postuler', compact('offreEmploi')); // corrigé: candisature → candidature
    }

    public function soumettreCandidature(Request $request, $id)
    {
        $offreEmploi = OffreEmploi::findOrFail($id);

        $request->validate([
            'prenom'    => 'required|string|max:255',
            'nom'       => 'required|string|max:255',
            'courriel'  => 'required|email|max:255', 
            'telephone' => 'nullable|regex:/(0)[0-9]{9}/',
            'message'   => 'nullable|string',
            'cv'        => 'required|file|mimes:pdf|max:2048',
        ]);

        $fichier  = $request->file('cv');
        $cvChemin = $fichier->store('cvs', '');

        $candidature = new Candidature();
        $candidature->offre_emploi_id   = $offreEmploi->id;
        $candidature->prenom            = $request->prenom;
        $candidature->nom               = $request->nom;
        $candidature->courriel          = $request->courriel;
        $candidature->telephone         = $request->telephone;
        $candidature->message           = $request->message;
        $candidature->cv_chemin         = $cvChemin;
        $candidature->cv_nom_original   = $fichier->getClientOriginalName();
        $candidature->cv_type_mime      = $fichier->getClientMimeType();
        $candidature->cv_taille         = $fichier->getSize();
        $candidature->statut            = 'recu'; // corrigé: status → statut
        $candidature->save();

        return redirect()->route('emploi.show')
            ->with('success', 'Candidature soumise avec succès.');
    }

    public function cv(int $id)
    {
        $candidature = Candidature::findOrFail($id);

        // Resolve the absolute path on the configured disk and return a download response.
        $path = Storage::disk('')->path($candidature->cv_chemin);

        return response()->download($path, $candidature->cv_nom_original);
    }
}
