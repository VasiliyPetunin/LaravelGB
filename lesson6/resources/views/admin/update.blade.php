@extends('layouts.app')

@section('title', 'Создать новость')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')

{{--    TODO Реализовать форму обновления новости --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.update', $news) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="newsTitle">Заголовок новости</label>
                                <input type="text" name="title" id="newsTitle" class="form-control" value="{{ $news->title }}">

                                <label for="newsCategory">Категория новости</label>
                                <select name="category_id" id="newsCategory" class="form-control">
                                    @foreach($categories as $item)
                                        <option
                                            @if($item->id === $news->category_id) selected='selected' @endif
                                        value="{{ $item->id }}">{{ $item->title }}
                                        </option>
                                    @endforeach
                                </select>


                                <label for="newsText">Текст новости</label>
                                <textarea name="text" id="newsText" class="form-control">{{ $news->text }}</textarea>

                                <div class="form-check">

                                    <input
                                        @if ($news->isPrivate) checked @endif
                                    name="isPrivate" type="checkbox" value="1">
                                    <label for="newsPrivate">Приватная</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="file" name="image">
                            </div>

                            <div class="form-group">
                                <input class="btn btn-outline-primary" type="submit" value="Изменить новость">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
