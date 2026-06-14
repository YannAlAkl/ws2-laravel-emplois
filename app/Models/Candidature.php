<?php

namespace App\Models;

use App\Models\OffreEmploi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    //
    use HasFactory;
     protected $fillable = ["offre_emploi_id","prenom","nom","courriel","telephone","message",
     "cv_chemin","cv_nom_original","cv_type_mime","cv_taille","statut","timestamps"];
     public function offreEmploi(){
        return $this->belongsTo(OffreEmploi::class);
     }
}
