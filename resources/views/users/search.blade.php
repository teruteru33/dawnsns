@extends('layouts.login')

@section('content')






{!! Form::open(['url' => 'user/search']) !!}
  {!! Form::input('text', 'searchUser', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー検索']) !!}
  <button type="submit" class="btn btn-success pull-right">追加</button>
 {!! Form::close() !!}

@if($username = null)
 検索ワード,{{ $username }}
@endif

@foreach ($users as $user)
<div>
  <img src="/images/{{ $user->images }}">
  {{ $user->username}}
  {{ $user->created_at }}


  @if($following->contains($user->id))
    {!! Form::open(['url' => 'del/follow']) !!}
      <input name="id" type="hidden" value="{{$user->id}}">
      <button type="submit" class="btn btn-success pull-right">フォロー外す</button>
    {!! Form::close() !!}
  @else
    {!! Form::open(['url' => 'add/follow']) !!}
      <input name="id" type="hidden" value="{{$user->id}}">
      <button type="submit" class="btn btn-success pull-right">フォローする</button>
    {!! Form::close() !!}

  @endif
</div>
@endforeach




@endsection
