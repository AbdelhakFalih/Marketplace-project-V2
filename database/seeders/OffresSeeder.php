<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Offre;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OffresSeeder extends Seeder
{
    /**
     * Run the seeder.
     */
    public function run(): void
    {
        $faker = Faker::create('fr_FR'); // Use French locale for consistency
        $users = User::all()->pluck('id')->toArray();

        if (empty($users)) {
            // Create a default user if none exist
            $user = User::factory()->create();
            $users = [$user->id];
        }

        $offres = [
            [
                'user_id' => $faker->randomElement($users),
                'title' => 'Pommes Bio Gala',
                'category' => 'fruits',
                'description' => 'Pommes Gala biologiques cultivées par une coopérative de Meknès. Juteuses, sucrées et parfaites pour une collation ou des desserts.',
                'price' => 28.50,
                'quantity' => 15,
                'unit' => 'kg',
                'images' => json_encode(['offres/pommes_gala1.jpg', 'offres/pommes_gala2.jpg']),
                'origin' => 'Meknès, Maroc',
                'certification' => 'bio-ab',
                'status' => 'active',
                'available_until' => $faker->dateTimeBetween('now', '+3 months')->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $faker->randomElement($users),
                'title' => 'Carottes de Fès',
                'category' => 'legumes',
                'description' => 'Carottes fraîches et croquantes de la région de Fès, idéales pour les salades, soupes ou plats cuisinés. Cultivées sans pesticides.',
                'price' => 12.75,
                'quantity' => 25,
                'unit' => 'kg',
                'images' => json_encode(['offres/carottes1.jpg']),
                'origin' => 'Fès, Maroc',
                'certification' => 'ecocert',
                'status' => 'active',
                'available_until' => $faker->dateTimeBetween('now', '+2 months')->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $faker->randomElement($users),
                'title' => 'Quinoa Bio',
                'category' => 'cereales',
                'description' => 'Quinoa biologique cultivé par une coopérative de Casablanca. Riche en protéines et parfait pour des plats sains et nutritifs.',
                'price' => 45.00,
                'quantity' => 30,
                'unit' => 'kg',
                'images' => json_encode(['offres/quinoa1.jpg', 'offres/quinoa2.jpg']),
                'origin' => 'Casablanca, Maroc',
                'certification' => 'demeter',
                'status' => 'active',
                'available_until' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $faker->randomElement($users),
                'title' => 'Fromage de Chèvre Artisanal',
                'category' => 'produits-laitiers',
                'description' => 'Fromage de chèvre artisanal produit par une coopérative de Marrakech. Texture crémeuse et goût authentique, parfait pour les plateaux de fromages.',
                'price' => 50.00,
                'quantity' => 10,
                'unit' => 'piece',
                'images' => json_encode(['offres/fromage_chevre1.jpg']),
                'origin' => 'Marrakech, Maroc',
                'certification' => 'nature-progres',
                'status' => 'sold_out',
                'available_until' => $faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $faker->randomElement($users),
                'title' => 'Poulet Fermier Entier',
                'category' => 'viandes',
                'description' => 'Poulet fermier élevé en plein air par une coopérative de Rabat. Sans antibiotiques, idéal pour des plats familiaux savoureux.',
                'price' => 130.00,
                'quantity' => 8,
                'unit' => 'piece',
                'images' => json_encode(['offres/poulet1.jpg', 'offres/poulet2.jpg']),
                'origin' => 'Rabat, Maroc',
                'certification' => null,
                'status' => 'draft',
                'available_until' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Add 25 more offres with Faker
        for ($i = 0; $i < 25; $i++) {
            $category = $faker->randomElement(['fruits', 'legumes', 'cereales', 'produits-laitiers', 'viandes', 'autres']);
            $unit = $faker->randomElement(['kg', 'g', 'l', 'piece', 'botte', 'panier']);
            $certification = $faker->optional(0.7)->randomElement(['bio-ab', 'demeter', 'nature-progres', 'ecocert']);
            $status = $faker->randomElement(['active', 'inactive', 'sold_out', 'draft']);
            $images = $faker->boolean(80) ? json_encode([$faker->uuid . '.jpg', $faker->uuid . '.jpg']) : null;
            $available_until = $faker->optional(0.6, null)->dateTimeBetween('now', '+6 months');

            $offres[] = [
                'user_id' => $faker->randomElement($users),
                'title' => ucfirst($faker->words(2, true)) . ' ' . $category,
                'category' => $category,
                'description' => $faker->paragraph(3, true),
                'price' => $faker->randomFloat(2, 5, 200),
                'quantity' => $faker->numberBetween(1, 50),
                'unit' => $unit,
                'images' => $images,
                'origin' => $faker->optional(0.9)->city . ', Maroc',
                'certification' => $certification,
                'status' => $status,
                'available_until' => $available_until ? $available_until->format('Y-m-d') : null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        foreach ($offres as $offre) {
            Offre::create($offre);
        }
    }
}
