<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
class IndexController extends Controller {
    public function index() {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        return view('pages.index')->withPosts($posts);
    }
    public function about() {
        return view('pages.about');
    }
    public function post($slug) {
        $post = Post::where('slug', '=', $slug)->first();

        return view('pages.post')->withPost($post);
    }
}
