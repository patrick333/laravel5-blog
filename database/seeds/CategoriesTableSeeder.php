<?php

use Faker\Factory as Faker;  //Faker is namespace, not a folder

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        //the category 0
        \App\Category::create([
            'name' => $faker->word,
            'slug' => $faker->slug,
            'parent_id' => '0',
            'created_at' => $faker->dateTimeThisYear(),
            'updated_at' => $faker->dateTimeThisYear(),
        ]);

        foreach(range(1, 5) as $index)
        {
            $categoryIds = \App\Category::whereParentId('0')->lists('id');
            //note the usage of where...

            \App\Category::create([
                'name' => $faker->unique()->word,
                'slug' => $faker->unique()->slug,
                'parent_id' => $faker->optional(0.5, '0')->randomElement($categoryIds),
                'created_at' => $faker->dateTimeThisYear(),
                'updated_at' => $faker->dateTimeThisYear(),
            ]);
        }

    }

}