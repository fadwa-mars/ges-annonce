<?php
namespace Database\Seeders;

use App\Models\Annonce;
use Illuminate\Database\Seeder;

class AnnoncesTableSeeder extends Seeder
{
    public function run()
    {
        Annonce::create([
            'titre'       => 'Annonce 1',
            'description' => 'Description 1',
            'type'        => 'Appartement',
            'ville'       => 'Casablanca',
            'superficie'  => 100,
            'neuf'        => true,
            'prix'        => 500000.00,
            'photo'       => null,
        ]);

        Annonce::create([
            'titre'       => 'Annonce 2',
            'description' => 'Description 2',
            'type'        => 'Maison',
            'ville'       => 'Rabat',
            'superficie'  => 200,
            'neuf'        => false,
            'prix'        => 800000.00,
            'photo'       => null,
        ]);
    }
}