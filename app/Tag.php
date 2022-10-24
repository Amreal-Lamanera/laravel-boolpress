<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }

    public static function getUniqueSlugFromTitle($title)
    {
        $slug_base = Str::slug($title);
        $slug = $slug_base;
        // controllare che sia unico
        $tag_exist = Tag::where('slug', $slug)->first();
        $count = 1;
        while ($tag_exist) {
            $slug = $slug_base . '-' . $count;
            $tag_exist = Tag::where('slug', $slug)->first();
            $count++;
        }

        return $slug;
    }
}
