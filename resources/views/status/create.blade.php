@extends('layouts.app')

@section('title', 'Создать статус')

@section('header', 'Создать статус')

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

    {{ html()->modelForm($status, 'POST', route('status.store'))->open() }}
    {{  html()->label('Имя', 'name') }}
    {{  html()->input('text', 'name') }}
    {{  html()->label('Код статуса', 'code') }}
    {{  html()->input('text', 'code') }}
    {{  html()->submit('Создать') }}
    {{ html()->closeModelForm() }}
@endsection
