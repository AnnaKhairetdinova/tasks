@extends('layouts.app')

@section('title', 'Создать метку')

@section('header', 'Создать метку')

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

    {{ html()->modelForm($tag, 'POST', route('tag.store'))->open() }}
    {{  html()->label('Имя', 'name') }}
    {{  html()->input('text', 'name') }}
    {{  html()->label('Описание', 'description') }}
    {{  html()->input('text', 'description') }}
    {{  html()->submit('Создать') }}
    {{ html()->closeModelForm() }}
@endsection
