<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Post;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $posts = Post::with('user')->orderBy('created_at', 'desc')->get();

        return Inertia::render('Dashboard', [
            'posts' => $posts,
        ]);
    }
}
