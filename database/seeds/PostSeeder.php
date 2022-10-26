<?php

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categoryIds = Category::all()->pluck('id');
        $tags = [];

        for ($i = 0; $i < 300; $i++) {
            $post = new Post();
            $post->title = $faker->words(rand(5, 10), true);
            $post->content = $faker->paragraphs(rand(10, 20), true);
            $post->slug = Str::slug($post->title);
            $post->category_id = $faker->optional()->randomElement($categoryIds);

            $post->save();

            // provo a dare un senso ai tag relativamente alla categoria xD
            switch ($post->category_id) {
                case null:
                    $tags = [];
                    break;
                case '6':
                    $tags = [9, 10];
                    break;
                case '2':
                    $tags = [5, 6];
                    break;
                case '1':
                    $tags = [];
                    break;
                case '4':
                    $tags = [7, 8];
                    break;
                default:
                    $tags = [1, 2, 3, 4];
                    break;
            }

            $tagIds = array_splice($tags, rand(0, count($tags) - 1), rand(0, count($tags) - 1));
            // $tagIds = $tags->shuffle()->take(rand(0, count($tags) - 1))->all();

            $post->tags()->sync($tagIds);
        }
    }
}
