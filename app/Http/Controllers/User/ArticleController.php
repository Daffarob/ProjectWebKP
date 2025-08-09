<?php

namespace App\Http\Controllers\User;

use App\Models\Article;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();
        return view('User.article', compact('articles')); // pastikan file-nya article/index.blade.php
    }

    public function show($id)
{
    $article = Article::findOrFail($id);
    return view('User.article.show', compact('article'));
}

}
