<?php
namespace App\Http\Controllers;
use App\Article;
use App\Tag;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;
class ArticlesController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth',['except' =>['index','show']]);
    }
    //
    public function index()
    {
      $articles = Article::latest('published_at')->published()->get();
      return view('articles.index', compact('articles'));
    }
    public function show(Article $article)
    {
      return view('articles.show', compact('article'));
    }
    public function create()
    {
      $tags = Tag::pluck('name', 'id');
      return view('articles.create',compact('tags'));
    }
    public function store(ArticleRequest $request)
    {
      $article = \Auth::user()->articles()->create($request->all());
      $article->tags()->attach($request->input('tag_list'));
      \Session::flash('Flash_message','記事を追加しました。');
      return redirect()->route('articles.index');
    }
    public function edit(Article $article)
    {
      $tags = Tag::pluck('name', 'id');
      return view('articles.edit',compact('article','tags'));
    }
    public function update(Article $article, ArticleRequest $request)
    {
      $article->update($request->all());
      $article->tags()->sync($request->input('tag_list', []));
      \Session::flash('flash_message','記事を更新しました。');
      return redirect()->route('articles.show', [$article->id]);
    }
    public function destroy(Article $article)
    {
      $article->delete();
      \Session::flash('flash_message', '記事を削除しました。');
      return redirect()->route('articles.index');
    }
}
