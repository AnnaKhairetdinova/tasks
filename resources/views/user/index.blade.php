@extends('layouts.app')

@section('title', 'Список пользователей')

@section('header', 'Список пользователей')

@section('content')
    @if (count($users) === 0)
        <div>
            Пользователей нет
        </div>
    @else
            <table class="table table-hover">
                <thead>
                <tr class="user_header">
                    <td>Имя</td>
                    <td>Фамилия</td>
                    <td>Почта</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td><a href="{{ route('users.show', $user->uuid) }}">{{$user->first_name}}</a></td>
                        <td>{{$user->second_name}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                {{ $users->links() }}
            </div>
    @endif
@endsection
