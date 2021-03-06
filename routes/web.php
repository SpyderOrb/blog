<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //    $posts = [];
    //
    //    foreach ($files as $file) {
    //        $document = YamlFrontMatter::parseFile($file);
    //        $posts[]  = new Post(
    //            $document->title,
    //            $document->excerpt,
    //            $document->date,
    //            $document->body(),
    //            $document->slug,
    //        );
    //    }
    
    // Using array_map()
    
    //    $posts = array_map(function ($file) {
    //        $document = YamlFrontMatter::parseFile($file);
    //        return new Post(
    //            $document->title,
    //            $document->date,
    //            $document->excerpt,
    //            $document->body(),
    //            $document->slug,
    //        );
    //    }, $files);
    
    // Using collections
    
    //    $posts = collect(File::files(resource_path("posts")))
    //        ->map(fn($file) => YamlFrontMatter::parseFile($file))
    //        ->map(fn($document) => new Post(
    //            $document->title,
    //            $document->date,
    //            $document->excerpt,
    //            $document->body(),
    //            $document->slug,
    //        ));
    
    return view('posts', [
        'posts' => Post::all()
    ]);
});

Route::get('posts/{post}', function ($slug) {
    // Find a post by its slug and pass it to a view called "post"
    return view('post', [
        'post' => Post::find($slug)
    ]);
})
    ->where('post', '[A-Za-z_\-]+');
