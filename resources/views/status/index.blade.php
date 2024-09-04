@extends('layouts.app')

@section('title', 'Статусы')

@section('header', 'Статусы')

@section('content')
    @if (count($statuses) === 0)
        <div>
            Статусов нет
        </div>
    @else
        <table class="statuses">
            <thead>
            <tr class="status_header">
                <td>Имя</td>
                <td>Дата создания</td>
            </tr>
            </thead>
            <tbody>
            @foreach ($statuses as $status)
                <tr>
                    <td><a href="{{ route('statuses.show', $status->uuid) }}">{{$status->name}}</a></td>
                    <td>{{$status->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
