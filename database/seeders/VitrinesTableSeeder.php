<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Entreprise;
class VitrinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();

        Entreprise::create([
            'nom_entreprise' => $faker->company,
            'date_creation' => $faker->date,
            'domiciliation' => $faker->city,
            'siege_social' => $faker->address,
            'valeurs_fortes' => $faker->sentence,
            'nombre_implementations' => $faker->numberBetween(1, 10),
            'effectif' => $faker->numberBetween(10, 500),
            'fondateurs' => $faker->name,
            'chiffre_affaire' => $faker->numberBetween(10000, 1000000),
            'photos_locaux' => null,  // You can modify this part
            'logo' => null,  // You can modify this part
            'user_id' => 19
        ]);
    }
}
