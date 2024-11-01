<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $articles = Article::where('is_confirm', 1)->latest()->limit(5)->get();
        $categories = Category::with(['articles' => function ($query) {
            $query->where('is_confirm', 1);
        }])->latest()->limit(5)->get();
            $articles = Article::where('is_confirm', 1)->latest()->limit(5)->get();
        
        $articleCount = Article::all()->count();
        $confirmedArticleCount = Article::where('is_confirm', 1)->count();
        $unconfirmedArticleCount = Article::where('is_confirm', 0)->count();

        if ($user->hasRole('writer')) {
            $confirmedArticleCount = Article::where('user_id', $user->id)->where('is_confirm', 1)->count();
            $unconfirmedArticleCount = Article::where('user_id', $user->id)->where('is_confirm', 0)->count();
            $articleCount = Article::where('user_id', $user->id)->where('published', true)->count();
            $categories = Category::with(['articles' => function ($query) use ($user) {
                $query->where('user_id', $user->id)->where('is_confirm', 1);
            }])
                ->has('articles')
                ->latest()
                ->limit(5)
                ->get();
            $articles = Article::where('user_id', $user->id)->where('is_confirm', 1)->latest()->limit(5)->get();
        }

        $categories->each(function ($category) {
            $category->total_articles = $category->articles->count();
        });

        return view('home', compact('articles', 'categories', 'articleCount', 'confirmedArticleCount', 'unconfirmedArticleCount'));
    }
}
