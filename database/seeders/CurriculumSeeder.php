<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curriculum;
use Faker\Factory as Faker;

class CurriculumSeeder extends Seeder
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

        // Change the number in the loop to specify how many fake records you want to create
        for ($i = 0; $i < 10; $i++) {
            Curriculum::create([
                'user_id' => 19, // Replace with the user ID range
                'nom' => $faker->lastName,
                'prenom' => $faker->firstName,
                'ville_domiciliation' => $faker->city,
                'metier_recherche' => $faker->jobTitle,
                'pretentions_salariales' => $faker->randomElement(['25/30 ke', '30/35 ke', '35/40 ke']),
                'annees_experience' => $faker->numberBetween(1, 10),
                'niveau' => $faker->randomElement(['débutant', 'intermédiaire', 'confirmé']),
                'niveau_etudes' => $faker->randomElement(['Bac', 'Bac+2', 'Bac+3', 'Bac+5']),
                'valeurs' => json_encode([
                    'key1' => $faker->word,
                    'key2' => $faker->word,
                    'key3' => $faker->word,
                    // Add more keys and values as needed
                ]),
            ]);
        }
    }
}
