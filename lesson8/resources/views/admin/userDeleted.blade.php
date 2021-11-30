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
                    <div class="card-header"><p class="mb-0">Успех</p></div>
                    <div class="alert alert-success">
                        <h1 class="alert-heading">Профиль успешно удалён.</h1>
                        <a href="{{ route('admin.index') }}">Вернуться на главную админки.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
