<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Fortnite', 'League of Legends', 'Counter-Strike: Global Offensive', 'Valorant',
            'Apex Legends', 'Overwatch', 'Dota 2', 'Rainbow Six Siege', 'Call of Duty: Warzone', 'PUBG'
        ];
        foreach ($categories as $categoryName) {
            ProductCategory::factory()->create([
                'name' => $categoryName
            ]);
        }

    }
}
