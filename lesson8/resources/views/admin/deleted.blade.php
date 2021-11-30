@extends('layouts.app')

@section('title', 'Новости')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <h1 class="display-3">Новость успешно удалена.</h1>
    <a href="{{ route('admin.crudNews') }}" class="link-primary">Вернуться на страницу правки новостей.</a>
@endsection
