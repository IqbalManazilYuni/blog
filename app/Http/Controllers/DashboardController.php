<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::count();
        $tags = Tag::count();
        $posts = Post::count();
        $users = User::count();
        return view('dashboard.index',[
            'categories' => $categories,
            'tags' => $tags,
            'posts' => $posts,
            'users' => $users
        ]);
    }
}
