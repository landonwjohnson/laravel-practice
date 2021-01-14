<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];
        $faker = Faker::create();
        foreach(range(1, 5) as $index){
            $categories[] = [
                'name' => $faker->text(20),
                'created_at' => now(),
                'updated_at' => now(),

            ];
        }

        DB::table('categories')->insert($categories);
    }
}
