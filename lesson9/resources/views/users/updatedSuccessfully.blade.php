@extends('layouts.app')

@section('title', 'Профиль')

@section ('menu')
    @include('admin.menu')
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Успех</div>
                    <div>
                        <h1>Профиль успешно изменён.</h1>
                        <a href="{{ route('home') }}">Вернуться на главную.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
