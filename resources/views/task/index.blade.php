@extends('layouts.app')

@section('title', 'Задачи')

@section('header', 'Задачи')

@section('content')
    <div>
        <a class="btn btn-primary" href="{{ route('task.create') }}">Создать задачу</a>
    </div>
    @if (count($tasks) === 0)
        <div>
            Задач нет
        </div>
    @else
        <div>
            <table class="table table-hover">
                <thead>
                <tr class="task_header">
                    <td>Статус</td>
                    <td>Название</td>
                    <td>Создатель</td>
                    <td>Исполнитель</td>
                    <td>Дата создания</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{$task->status}}</td>
                        <td><a href="{{ route('tasks.show', $task->uuid) }}">{{$task->name}}</a></td>
                        <td><a href="{{ route('users.show', $task->creator->uuid) }}">{{$task->creator->first_name}}</a></td>
                        <td><a href="{{ route('users.show', $task->executor->uuid) }}">{{$task->executor->first_name}}</a></td>
                        <td>{{$task->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                {{ $tasks->links() }}
            </div>
        </div>
    @endif
@endsection
