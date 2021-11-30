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
                    <div class="card-header">Неверный пароль</div>
                    <div class="alert alert-danger" role="alert">
                        <h1>{{ $errors['password'] }}</h1>
                        <a href="{{ route('updateProfile') }}">Повторить ввод.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
