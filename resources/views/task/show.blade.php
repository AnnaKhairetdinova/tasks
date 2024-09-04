@extends('layouts.app')

@section('title', $task->name)

@section('header', $task->name)

@section('content')
    <div>{{$task->description}}</div>
    <div>{{$task->status}}</div>

    <a href="{{ route('tasks.destroy', $task->uuid) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Удалить</a>
    <a href="{{ route('tasks.edit', $task->uuid) }}">Обновить статус</a>
@endsection
