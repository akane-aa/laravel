@extends('layout')

@section('content')
    <h1>{{ $article->title }}</h1>

    <hr/>

    <article>
        <div class="body">{{ $article->body }}</div>
    </article>

    @unless ($article->tags->isEmpty())
       <h5>Tags:</h5>
       <ul>
           @foreach($article->tags as $tag)
               <li>{{ $tag->name }}</li>
           @endforeach
       </ul>
   @endunless

    {{-- ログインしている時だけ表示 --}}
    @if (Auth::check())
    <br/>

    {!! link_to(action('ArticlesController@edit', [$article->id]), '編集', ['class' => 'btn btn-primary']) !!}

    <br/>
    <br/>

    {!! delete_form(['articles', $article->id]) !!}
    <!-- {!! Form::open(['method' => 'DELETE', 'url' => ['articles', $article->id]]) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!} -->
    @endif
@stop
