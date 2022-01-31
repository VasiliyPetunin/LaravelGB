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
                    <div class="card-header alert alert-danger">
                        <p class="mb-0">Ошибка доступа</p>
                        <h1 class="alert-heading">Вы не можете лишить прав администратора самого себя!</h1>
                        <a href="{{ route('admin.crudUsers') }}">Назад.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

