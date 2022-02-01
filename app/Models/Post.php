<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Psy\TabCompletion\Matcher\FunctionDefaultParametersMatcher;

class Post
{
    public static function find($slug)
    {
        if (!file_exists($path = resource_path("/posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }

        // caching 
        return cache()->remember("posts.{$slug}", now()->addHour(1), fn () => file_get_contents($path));
    }

    public static function all()
    {
        $files = File::files(resource_path("/posts"));
        return array_map(fn($file) => $file->getContents(), $files);
    }
}
