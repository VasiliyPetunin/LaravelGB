@extends('layouts.app')

@section('title', 'Создать новость')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
{{--    @dd($errors)--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.create') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="newsTitle">Заголовок новости</label>
                                @if ($errors->has('title'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach($errors->get('title') as $error)
                                            {{ $error }}<br>
                                        @endforeach
                                    </div>
                                @endif
                                <input type="text" name="title" id="newsTitle" class="form-control" value="{{ old('title') }}">

                                <label for="newsCategory">Категория новости</label>
                                @if ($errors->has('category_id'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('category_id') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <select name="category_id" id="newsCategory" class="form-control">
                                    @foreach($categories as $item)
                                        <option
                                            @if ($item->id == old('category')) selected @endif
                                            value="{{ $item->id }}">{{ $item->title }}
                                        </option>
                                    @endforeach
                                </select>


                                <label for="newsText">Текст новости</label>
                                @if ($errors->has('text'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('text') as $error)
                                            {{ $error }}<br>
                                        @endforeach
                                    </div>
                                @endif
                                <textarea name="text" id="newsText" class="form-control">{{ old('text') }}</textarea>

                                <div class="form-check">

                                    <input
                                        @if (old('isPrivate')) checked @endif
                                        name="isPrivate" type="checkbox" value="1">
                                    <label for="newsPrivate">Приватная</label>
                                </div>
                            </div>

                            @if ($errors->has('image'))
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->get('image') as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                            <div class="form-group">
                                <input type="file" name="image">
                            </div>

                            <div class="form-group">
                                <input class="btn btn-outline-primary" type="submit" value="Добавить новость">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
