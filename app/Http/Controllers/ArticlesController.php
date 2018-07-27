<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    public function index()
    {
      $articles = Article::all();

      return view('articles.index',compact('articles'));
    }

    public function show($id)
    {
      return $id;
    }

    public function create()
    {
      return view('articles.create');
    }

    public function store()
    {
      $inputs = \Request::all();
      Article::create($inputs);
      return redirect('articles');
      
    }
}
