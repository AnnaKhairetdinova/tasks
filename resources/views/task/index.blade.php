@extends('layouts.app')

@section('title', 'Задачи')

@section('header', 'Задачи')

@section('content')
    <div>
        <div style="display: flex;">
            <div>
                <a class="btn btn-primary" href="{{ route('task.create') }}" role="button" >Создать задачу</a>
            </div>
            <div style="margin-left: 20px">
                <select class="form-select" id="status" name="status" onchange="myFunction()">
                    <option selected>Статус</option>
                    @foreach ($statuses as $status)
                        <option value="{{ $status->code }}">{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>
            <script>
                const select = document.getElementById('status');
                const selectedValue = select.value;

                async function myFunction() {
                    const params = new URLSearchParams({ status: selectedValue }).toString();
                    await fetch(`http://127.0.0.1:8000/tasks?${params}`);
                }
            </script>
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
                    {{ $tasks->withQueryString()->links() }}
                </div>
            </div>
        @endif
    </div>
@endsection
