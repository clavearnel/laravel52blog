<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Illuminate\Support\Facades\Mail;
class IndexController extends Controller {
    public function index() {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        return view('pages.index')->withPosts($posts);
    }
    public function about() {
        return view('pages.about');
    }
    public function contact() {
        return view('pages.contact');
    }
    public function postContact($request) {
        $this->validate($request, [
            'email'   => 'required|email',
            'subject' => 'required|min:5',
            'message' => 'required|min:10',
        ]);
        $data = [
            'email'    => $request->email,
            'subject'  => $request->subject,
            'messages' => $request->message
        ];
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->from($data['email_from']);
            $message->to($data['email_to']);
            $message->subject($data['subject']);
        });
        flash()->overlay('You have successfully send a message', 'Success');

        return redirect()->url('/');
    }
    public function post($slug) {
        $post = Post::where('slug', '=', $slug)->first();

        return view('pages.post')->withPost($post);
    }
}
