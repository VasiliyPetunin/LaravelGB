@extends('layouts.app')

@include('news.menu')

@section('content')
    @if(!$news)
        <h1>ID OF CATEGORY IS NOT CORRECT OR THERE IS NO ANY AVAILABLE NEWS!</h1>
    @else
        @foreach($news as $item)
            <div style="display: flex; flex-flow: column nowrap; border: 1px solid black; width: 33%;">
                <h2>Today {{ $item['title'] }} happen!!!</h2>
                <img src="#" alt="some photo of an occasion">
                <p>{{ $item['text'] }}</p>
                <a href="{{ route('news.oneNews', $item['id']) }}" target="_blank">Go to this news</a>
            </div>
        @endforeach
    @endif

    <br> <br> <br> <br> <br> <br> <br><a href="{{ route('news.addNews') }}">Add the news!</a>
@endsection
