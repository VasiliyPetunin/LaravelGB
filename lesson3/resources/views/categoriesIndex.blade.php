@extends('layouts.app')

@include('news.menu')

@section('content')
<h1>Categories:</h1>

<ul style="border-bottom: 1px solid black; padding-bottom: 5px;">

    @foreach($categories as $category)
            <li><a href="{{ route('categories.newsByCategory', $category['id']) }}">{{ $category['title'] }}</a></li>
    @endforeach

</ul>
@endsection
