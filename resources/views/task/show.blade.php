@extends('layouts.app')

@section('title', $task->name)

@section('header', $task->name)

@section('content')
    <div>
        <div>
            <table class="table table-bordered">
                <tr class="task_header">
                    <td><strong>Описание:</strong></td>
                    <td>{{$task->description}}</td>
                </tr>
                <tr>
                    <td><strong>Статус задачи:</strong></td>
                    <td>{{$task->status}}</td>
                </tr>
                <tr>
                    <td><strong>Метки:</strong></td>
                    <td>
                        <ul>
                            @foreach ($tags as $tag)
                                <li>
                                    <div>{{$tag->name}}</div>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <?php
    if ($task->creator_uuid === auth()->user()->uuid) {
        ?>
    <div>
        <a class="btn btn-primary" href="{{ route('tasks.edit', $task->uuid) }}" role="button" >Обновить статус</a>
        <a class="btn btn-primary" href="{{ route('tasks.destroy', $task->uuid) }}" role="button" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Удалить</a>
    </div>
    <?php
    }
    ?>
@endsection
