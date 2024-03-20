<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

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
        return view('login');
    }


    public function blog_details(Post $post)
    {
        // Step 1: Check if the user is logged in
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Step 2: Check if the post price is null
        if (is_null($post->price)) {
            return view('blog-details', ['post' => $post]);
        }

        // Step 3: Check if the post is unlocked by the specific user
        if ($user->hasUnlockedPost($post->id)) {
            // If post is already unlocked, redirect to post detail page
            return view('blog-details', ['post' => $post]);
        }

        // Redirect to payment page
        return redirect()->route('payment-page', $post->slug);
    }



    public function model(Post $post)
{

    return view('model' , [
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
