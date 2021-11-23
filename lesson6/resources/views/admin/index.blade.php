@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Админка главная</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
