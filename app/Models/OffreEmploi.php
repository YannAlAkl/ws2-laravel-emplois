<?php

namespace App\Models;

use App\Models\Candidature;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffreEmploi extends Model
{
     use HasFactory;

     protected $fillable = [
         'titre',
         'entreprise',
         'ville',
         'type_emploi',
         'salaire',
         'description',
         'responsabilites',
         'exigences',
         'est_active',
         'date_publication',
     ];

     public function candidatures()
     {
         return $this->hasMany(Candidature::class);
     }
}
