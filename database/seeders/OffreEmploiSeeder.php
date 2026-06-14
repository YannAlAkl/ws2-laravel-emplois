<?php

namespace Database\Seeders;

use App\Models\OffreEmploi;
use Illuminate\Database\Seeder;

class OffreEmploiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    OffreEmploi::create([
        'titre'           => 'Développeur Web Junior',
        'entreprise'      => 'Microsoft',
        'ville'           => 'Washington',
        'type_emploi'     => 'Temps plein',
        'salaire'         => '55000',
        'description'     => 'Développement et maintenance d\'applications web.',
        'responsabilites' => 'Coder, tester et déployer des fonctionnalités.',
        'exigences'       => 'HTML, CSS, JavaScript, PHP, Laravel.',
        'est_active'      => true,
        'date_publication'=> '2026-06-01',
    ]);

    OffreEmploi::create([
        'titre'           => 'Analyste BDD',
        'entreprise'      => 'Microsoft',
        'ville'           => 'Montréal',
        'type_emploi'     => 'Temps plein',
        'salaire'         => '65000',
        'description'     => 'Gestion et optimisation des bases de données.',
        'responsabilites' => 'Modéliser, maintenir et optimiser les bases de données.',
        'exigences'       => 'SQL, MySQL, SQLite, expérience 2 ans.',
        'est_active'      => true,
        'date_publication'=> '2026-06-03',
    ]);

    OffreEmploi::create([
        'titre'           => 'Designer UI/UX',
        'entreprise'      => 'Adobe',
        'ville'           => 'Toronto',
        'type_emploi'     => 'Contractuel',
        'salaire'         => '70000',
        'description'     => 'Conception d\'interfaces utilisateur modernes.',
        'responsabilites' => 'Créer des maquettes, prototypes et guides de style.',
        'exigences'       => 'Figma, Adobe XD, expérience UX 3 ans.',
        'est_active'      => true,
        'date_publication'=> '2026-06-05',
    ]);
        }
    }
