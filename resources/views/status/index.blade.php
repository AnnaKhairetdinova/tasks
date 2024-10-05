@extends('layouts.app')

@section('title', 'Статусы')

@section('header', 'Статусы')

@section('content')
    <?php
        if (auth()->user()->is_admin === 1) { ?>
            <div>
                <a class="btn btn-primary" href="{{ route('status.create') }}">Создать статус</a>
            </div>
        <?php } ?>

    @if (count($statuses) === 0)
        <div>
            Статусов нет
        </div>
    @else
        <table class="table table-hover">
            <thead>
            <tr class="status_header">
                <td>Имя</td>
                <td>Дата создания</td>
            </tr>
            </thead>
            <tbody>
            @foreach ($statuses as $status)
                <tr>
                    <?php
                    if (auth()->user()->is_admin === 1) { ?>
                        <td><a href="{{ route('statuses.show', $status->uuid) }}">{{$status->name}}</a></td>
                    <?php } else { ?>
                        <td>{{$status->name}}</td>
                    <?php } ?>

                    <td>{{$status->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
