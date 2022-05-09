<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $title = "Home";
        $articles = Article::with('user')->wherePublished(true)->latest()->get();
        return view('home',compact('title','articles'));
    }

    public function showArticle($id)
    {
        $article = Article::findOrFail($id);
        
        return view('article',compact('article'));
    }
}
