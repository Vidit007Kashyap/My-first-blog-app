<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::where('navbar_status', '0')
            ->where('status', '0')
            ->get();

        $latestPosts = Post::where('status', 0)
            ->orderBy('created_at', 'DESC')
            ->get()
            ->take(10);

        return view('frontend.index', compact('categories','latestPosts'));
    }

    public function viewCategoryPost($categorySlug)
    {
        $category = Category::where('slug', $categorySlug)
            ->where('status', '0')
            ->first();

        if ($category) {
            $post = Post::where('category_id', $category->id)
                ->where('status', '0')
                ->paginate(10);

            return view('frontend.post.index', compact('post', 'category'));
        } else {
            return redirect('/');
        }
    }

    public function viewPost(string $categorySlug, string $postSlug)
    {
        $category = Category::where('slug', $categorySlug)
            ->where('status', '0')
            ->first();

        if ($category) {

            $post = Post::where('category_id', $category->id)
                ->where('slug', $postSlug)
                ->where('status', '0')
                ->first();

            $latestPosts = Post::where('category_id', $category->id)
                ->where('status', 0)
                ->orderBy('created_at', 'DESC')
                ->get()
                ->take(10);

            if ($post)
                return view('frontend.post.view', compact('post', 'latestPosts'));
            else
                return redirect('/');
        } else
            return redirect('/');
    }
}
