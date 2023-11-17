@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>

{!! Form::open(['url' => 'post/create']) !!}
  {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容']) !!}
  <button type="submit" class="btn btn-success pull-right">追加</button>
 {!! Form::close() !!}

@foreach ($posts as $post)


<div>
  <img src="/images/{{ $post->images }}">
  {{ $post->id }}
  {{ $post->posts }}
  {{ $post->created_at }}

  {!! Form::open(['url' => "post/edit"]) !!}
  {!! Form::input('hidden', 'id', $post->id) !!}
  {!! Form::input('text', 'upPost', $post->posts, ['required', 'class' => 'form-control']) !!}
    <button type="submit" class="btn btn-success pull-right">編集</button>
  {!! Form::close() !!}

  <a class="" href="/post/{{ $post->id }}/delete">削除</a>
</div>

@endforeach

@endsection
