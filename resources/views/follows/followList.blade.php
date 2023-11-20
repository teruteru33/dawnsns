@extends('layouts.login')
@section('content')

@foreach ($follows as $follow)
  <img src="storage/images/{{ $follow->images }}">
@endforeach

@foreach($posts as $posts)

<div>
  <img src="storage/images/{{ $posts->images }}">
{{ $posts-> username}}
{{ $posts->updated_at }}
</div>


<div>
{{ $posts->posts }}
</div>
@endforeach

@endsection
