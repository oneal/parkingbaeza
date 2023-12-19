<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;

class Blog extends Controller
{
    public function singleBlog(Request $request, $slug)
    {
        $blog = Post::where('status', 'PUBLISHED')->where('slug', $slug)->first();
        $blogsLatest = Post::where('status', 'PUBLISHED')->orderBy('created_at', 'DESC')->paginate(4);
        if(isset($blog)){
            $home = false;
            return view('web.blog-single', [
                'blog' => $blog,
                'home' => $home,
                'blogsLatest' => $blogsLatest
            ]);
        }

        if(countPosts() > 0) {
            return redirect()->to('/blogs');
        } else {
            return redirect()->to('/');
        }

    }
}
