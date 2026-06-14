<?php

use App\Http\Controllers\Admin\CandidatureController;
use App\Http\Controllers\EmploiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// GET	/	Accueil ou redirection vers /emplois
// GET	/emplois	Liste publique des offres actives
Route::get('/emploi', [EmploiController::class,'show'])
->name('emploi.show');

// GET	/emplois/{offreEmploi}	Détail public d’une offre
Route::get('/emplois/{offreEmploi}', [EmploiController::class,'showEmploi'])
->name('offreEmploi');

// GET	/emplois/{offreEmploi}/postuler	Formulaire de candidature
Route::get('/emplois/{offreEmploi}/postuler', [CandidatureController::class,'postuler'])
->name('candidature.show');

// POST	/emplois/{offreEmploi}/postuler	Enregistrement d’une candidature avec CV
Route::post('/emplois/{offreEmploi}/postuler', [CandidatureController::class,'soumettreCandidature'])
->name('candidature.store');

// GET	/admin/offres	Liste admin des offres avec nombre de candidatures

// GET	/admin/offres/create	Formulaire de création d’une offre

// POST	/admin/offres	Enregistrement d’une offre

// GET	/admin/offres/{offreEmploi}/edit	Formulaire de modification

// PUT/PATCH	/admin/offres/{offreEmploi}	Mise à jour d’une offre

