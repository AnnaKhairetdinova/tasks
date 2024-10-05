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
            <label for="executor_uuid" class="form-label">Исполнитель</label>
            <select class="form-select" id="executor_uuid" name="executor_uuid">
                @foreach ($users as $user)
                    <option value="{{ $user->uuid }}">{{ $user->first_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Название</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="col-md-6">
            <label for="description" class="form-label">Описание</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>
        <div class="col-md-6">
            <label for="status" class="form-label">Статус</label>
            <select class="form-select" id="status" name="status">
                @foreach ($statuses as $status)
                    <option value="{{ $status->code }}">{{ $status->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Создать</button>
        </div>
    </form>
@endsection
