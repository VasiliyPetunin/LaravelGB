@extends('layouts.app')

@section('title', 'Создать новость')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    @if(isset($error))
        @dd($error)
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1>Правка пользователей</h1>
                        @forelse($users as $user)
                            <h1> {{ $user->name }}</h1><br>
                            <div class="card-img" style="background-image: url({{ $item->avatar ?? asset('storage/img/default.jpeg') }}); height: 100px;"></div>
                            <form action="{{ route('admin.updateProfile', $user) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-light">Изменить</button>
                            </form>
                            <form action="{{ route('admin.deleteProfile', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-dark">Удалить</button>
                            </form>
                            <form action="{{ route('admin.changeAdminRights', $user) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-warning">
                                    @if($user->is_admin)
                                        Отобрать права администратора
                                    @else
                                        Наделить правами администратора
                                    @endif
                                </button>
                            </form>
                        @empty
                            <p>Нет зарегистрированных пользователей</p>

                        @endforelse
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
