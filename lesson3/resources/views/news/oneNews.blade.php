@extends('layouts.app')

@include('news.menu')

@section('content')
<h1>ONLY ONE NEWS!!!</h1><br>

<div style="display: flex; flex-flow: column nowrap; border: 1px solid black; width: 33%;">
    <h2>This is {{ $news['title'] }} which has happen recently!!!</h2>
    <img src="#" alt="some photo of an occasion">
    <p>{{ $news['text'] }}</p>
</div>

<a href="{{ route('news.index') }}">Get back to the other news</a>
@endsection
