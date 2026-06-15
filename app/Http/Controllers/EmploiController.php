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
}




