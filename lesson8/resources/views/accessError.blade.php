@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ошибка доступа</div>
                        <div class="alert alert-danger" role="alert">
                            <h1>Вы не являетесь админом!</h1>
                            <a href="{{ route('home') }}" class="link">Вернуться на главную.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
