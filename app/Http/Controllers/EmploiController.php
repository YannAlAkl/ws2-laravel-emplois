<?php

namespace App\Http\Controllers;

use App\Models\OffreEmploi;
use App\Models\Candidature;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class EmploiController extends BaseController
{
    public function show()
    {
        $offreEmplois = OffreEmploi::all();
        return view('emplois.show', compact('offreEmplois'));
    }
    public function showEmploi($id){
        $emploi = OffreEmploi::findOrFail($id);
        return view('emplois.offreEmploi', compact('emploi'));
    }




//     public function adminCreate()
//     {
//         return view('admin.offres.create');
//     }

//     public function adminStore(Request $request)
//     {
//         $request->validate([
//             'titre' => 'required|string|max:255',
//             'entreprise' => 'required|string|max:255',
//             'ville' => 'required|string|max:255',
//             'type_emploi' => 'required|string|max:255',
//             'salaire' => 'nullable|string|max:255',
//             'description' => 'required|string',
//             'responsabilites' => 'required|string',
//             'exigences' => 'required|string',
//             'est_active' => 'boolean',
//             'date_publication' => 'nullable|date',
//         ]);

//         $offre = new OffreEmploi();
//         $offre->titre = $request->titre;
//         $offre->entreprise = $request->entreprise;
//         $offre->ville = $request->ville;
//         $offre->type_emploi = $request->type_emploi;
//         $offre->salaire = $request->salaire;
//         $offre->description = $request->description;
//         $offre->responsabilites = $request->responsabilites;
//         $offre->exigences = $request->exigences;
//         $offre->est_active = $request->est_active ?? true;
//         $offre->date_publication = $request->date_publication;
//         $offre->save();

//         return redirect()->route('admin.offres.index')
//             ->with('success', 'Offre créé avec succès.');
//     }

//     public function admimEdit($id)
//     {
//         $offreEmploi = OffreEmploi::findOrFail($id);
//         return view('admin.offres.edit', compact('offreEmploi'));
//     }

//     public function AdminUpdate($id, Request $request)
//     {
//         $offreEmploi = OffreEmploi::find($id);

//         $request->validate([
//             'titre' => 'required|string|max:255',
//             'entreprise' => 'required|string|max:255',
//             'ville' => 'required|string|max:255',
//             'type_emploi' => 'required|string|max:255',
//             'salaire' => 'nullable|string|max:255',
//             'description' => 'required|string',
//             'responsabilites' => 'required|string',
//             'exigences' => 'required|string',
//             'est_active' => 'boolean',
//             'date_publication' => 'nullable|date',
//         ]);

//         $offreEmploi->titre = $request->titre;
//         $offreEmploi->entreprise = $request->entreprise;
//         $offreEmploi->ville = $request->ville;
//         $offreEmploi->type_emploi = $request->type_emploi;
//         $offreEmploi->salaire = $request->salaire;
//         $offreEmploi->description = $request->description;
//         $offreEmploi->responsabilites = $request->responsabilites;
//         $offreEmploi->exigences = $request->exigences;
//         $offreEmploi->est_active = $request->est_active ?? true;
//         $offreEmploi->date_publication = $request->date_publication;
//         $offreEmploi->save();

//         return redirect()->route('admin.offres.index')->with('success', 'Offre mise à jour');
//     }

//     public function adminDestroy($id)
//     {
//         $offreEmploi = OffreEmploi::findOrFail($id);
//         $offreEmploi->delete();

//         return redirect()->route('admin.offres.index')
//             ->with('success', 'offre supprimée');
//     }

//    public function adminCandidatures($id)
//    {
//        $offreEmploi  = OffreEmploi::findOrFail($id);
//         $candidatures = Candidature::all()->where('offre_emploi_id', $id);
//         return view('admin.offres.candidatures', compact('offreEmploi', 'candidatures'));
//     }
 }


