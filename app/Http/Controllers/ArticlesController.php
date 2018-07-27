<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    public function index()
    {
      $articles = Article::latest('published_at')->published()->get();

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

    public function store(Request $request)
    {
      $rules = [
            'title' => 'required|min:3',
            'body' => 'required',
            'published_at' => 'required|date',
      ];
      $this->validate($request, $rules);
      $inputs = \Request::all();
      Article::create($request->all());
      return redirect('articles');

    }
}
