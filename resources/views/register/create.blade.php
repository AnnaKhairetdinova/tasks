@extends('layouts.app')

@section('title', 'Регистрация')

@section('header', 'Регистрация')

@section('content')
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{ html()->modelForm($user, 'POST', route('register.store'))->open() }}
    {{  html()->label('Имя', 'first_name') }}
    {{  html()->input('text', 'first_name') }}
    {{  html()->label('Фамилия', 'second_name') }}
    {{  html()->input('text', 'second_name') }}
    {{  html()->label('Почта', 'email') }}
    {{  html()->input('text', 'email') }}
    {{  html()->label('Пароль', 'password') }}
    {{  html()->input('text', 'password') }}
    {{  html()->submit('Создать') }}
    {{ html()->closeModelForm() }}
@endsection
