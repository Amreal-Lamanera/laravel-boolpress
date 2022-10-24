<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public static function getUniqueSlugFromTitle($title)
    {
        $slug_base = Str::slug($title);
        $slug = $slug_base;
        // controllare che sia unico
        $post_exist = Post::where('slug', $slug)->first();
        $count = 1;
        while ($post_exist) {
            $slug = $slug_base . '-' . $count;
            $post_exist = Post::where('slug', $slug)->first();
            $count++;
        }

        return $slug;
    }
}
