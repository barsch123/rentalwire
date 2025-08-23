<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog.blog');
    }

    public function show($slug){
        $content = Blogs::where('slug', $slug)->firstOrFail();
        $relatedBlogs = Blogs::inRandomOrder()->limit(4)->get();
        return view('blog.details', [
            'content' => $content,
            'relatedBlogs' => $relatedBlogs
        ]);
    }
}
