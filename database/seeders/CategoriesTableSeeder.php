<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'          => 'Root',
            'description'   => 'This is the root category, don\'t delete this one',
            'parent_id'     => null,
            'menu'          => 0,
        ]);

        // factory(Category::class, 10)->create();
        Category::factory()->count(10)->create();
    }
}
