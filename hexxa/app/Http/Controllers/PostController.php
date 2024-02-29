<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller

{
    public function home()
    {

        $post = Post::all();
        $categories = category::all();
        return view('index' ,compact('post','categories'));
    }


    public function show(Category $category)
    {
        return view('posts.show', ['category' => $category]);
    }


    public function travel()
    {
        return view('travel');
    }

    public function pricing()
    {

        return view('pricing');
    }


    public function team()
    {
        return view('team');
    }


    public function shop()
    {
        return view('shop');
    }

    public function contact_us()
    {
        return view('contact-us');
    }


    public function team_details()
    {
        return view('team-details');
    }

    public function login()
    {
        return view('logi');
    }

    public function registerr()
    {
        return view('registerr');
    }

    public function blog_details(Post $post)
    {
        // Eager load comments with the post
        $post = $post->load('comments');

        return view('blog-details', [
            'post' => $post
        ]);
    }




    public function index()
    {
        $perPage = 10;
        $posts = Post::paginate($perPage);
        return view('all-post', ['posts' => $posts]);
    }

}
