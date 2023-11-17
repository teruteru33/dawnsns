@extends('layouts.login')

@section('content')



<!-- ユーザーname -->
{!! Form::open(['url' => 'profile/update']) !!}
<div>
  {{Form::label('username','UserName')}}
  {!! Form::input('text', 'username', Auth::user()->username, ['required', 'class' => 'form-control']) !!}
</div>
<div>
    {{Form::label('mailadress','MailAdress')}}
    {!! Form::input('text', 'mailadress', Auth::user()->mail, ['required', 'class' => 'form-control']) !!}
</div>
<div>
  {{Form::label('password','Password')}}
  {!! Form::input('text', 'password', '●●●●●●', ['required', 'class' => 'form-control', 'placeholder' => '']) !!}
</div>
<div>
  {{Form::label('newpassword','New Password')}}
  {!! Form::input('text', 'newpassword', null, ['class' => 'form-control']) !!}
</div>
<div>
  {{Form::label('bio','Bio')}}
  {!! Form::input('text', 'bio', Auth::user()->bio, [ 'class' => 'form-control']) !!}
</div>
<div>
  {{Form::label('iconimage','Icon Image')}}
  {!! Form::input('text', 'iconimaige', null, ['class' => 'form-control']) !!}
</div>




<button type="submit" class="btn btn-success pull-right">更新</button>

 {!! Form::close() !!}



@endsection
