@extends('layouts.app')

@section('title', 'Создать задачу')

@section('header', 'Создать задачу')

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

    <form class="row g-3" method="post" action="{{ route('task.store') }}">
        @csrf
        <div class="col-md-6">
            <label for="executor_uuid" class="form-label"><strong>Исполнитель:</strong></label>
            <select class="form-select" id="executor_uuid" name="executor_uuid">
                @foreach ($users as $user)
                    <option value="{{ $user->uuid }}">{{ $user->first_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label"><strong>Название:</strong></label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="col-md-6">
            <label for="description" class="form-label"><strong>Описание:</strong></label>
            <input type="text" class="form-control" id="description" name="description">
        </div>
        <div class="col-md-6">
            <label for="status" class="form-label"><strong>Статус:</strong></label>
            <select class="form-select" id="status" name="status">
                @foreach ($statuses as $status)
                    <option value="{{ $status->code }}">{{ $status->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="tag" class="form-label"><strong>Метки:</strong></label>
            <div>
                @foreach ($tags as $tag)
                        <div>
                            <label class="form-label">
                            <input type="checkbox" id="tag" name="tag" value="{{ $tag->uuid }}">
                            {{ $tag->name }}
                            </label>
                        </div>
                @endforeach
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Создать</button>
        </div>
    </form>
@endsection
