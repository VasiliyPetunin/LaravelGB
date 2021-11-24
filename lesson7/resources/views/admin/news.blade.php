@extends('layouts.app')

@section('title', 'Создать новость')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1>Правка новостей</h1>
                        @forelse($news as $item)
                            <a href="{{ route('news.one', $item->id) }}"> {{ $item->title }}</a><br>
                            <div class="card-img" style="background-image: url({{ $item->image ?? asset('storage/img/default.jpeg') }}); height: 100px;"></div>
                            <form action="{{ route('admin.update', $item) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-light">Изменить</button>
                            </form>
                            <form action="{{ route('admin.delete', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-dark">Удалить</button>
                            </form>
{{--                            </form>--}}
                        @empty
                            <p>Нет новостей</p>
                        @endforelse
                        {{ $news->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
