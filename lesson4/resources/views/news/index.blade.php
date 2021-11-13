@extends('layouts.app')

@section('title', 'Новости')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1>Новости</h1>
                        @forelse($news as $item)
                            <a href="{{ route('news.one', $item['id']) }}"> {{ $item['title'] }}</a><br>
                        @empty
                            <p>Нет новостей</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
