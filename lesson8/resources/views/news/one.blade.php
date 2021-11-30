@extends('layouts.app')

@section('title', 'Новость')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if ($news)
                            <h2>{{ $news->title }}</h2>
                            <div class="card-img" style="background-image: url({{ $news->image ?? asset('storage/img/default.jpeg') }}); height: 100px;"></div>
                            @if (!$news->isPrivate)
                                <p>{{ $news->text}}</p>
                            @else
                                @if(\Illuminate\Support\Facades\Auth::user())
                                    <p>{{ $news->text}}</p>
                                @else
                                    Новость доступна только авторизованным пользователям.
                                @endif
                            @endif
                        @else
                            Нет новости с таким id
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
