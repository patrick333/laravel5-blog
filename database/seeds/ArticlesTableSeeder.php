<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ArticlesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $tagIds = \App\Tag::lists('id');
        $categoryIds = \App\Category::lists('id');

        foreach(range(1, 40) as $index)
        {
            $article = \App\Article::create([
                'title' => $faker->sentence,
                'body' => $faker->paragraph(20),

                'slug' => $faker->unique()->slug,
                'category_id' => $faker->randomElement($categoryIds),

                'created_at' => $faker->dateTimeThisYear(),
                'updated_at' => $faker->dateTimeThisYear(),
                'deleted_at' => $faker->optional(0.1)->dateTimeThisYear(),//0.1 to be null
            ]);

            $tags = $faker->randomElements($tagIds, 3);

            $article->tags()->sync($tags);
            //the method tags() is from the model class.

        }
    }

}