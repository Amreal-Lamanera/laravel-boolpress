<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Film', 'Serie TV', 'Cibo', 'Automobili', 'Informatica', 'Videogames'];
        sort($categories);
        foreach ($categories as $name) {
            $c = new Category();
            $c->name = $name;
            $c->slug = Str::slug($name);

            $c->save();
        }
    }
}
