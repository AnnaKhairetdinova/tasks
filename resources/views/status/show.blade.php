@extends('layouts.app')

@section('title', $status->name)

@section('header', $status->name)

@section('content')
    <div>{{$status->code}}</div>
    <div>
        <a class="btn btn-primary" href="{{ route('statuses.destroy', $status->uuid) }}" role="button" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Удалить</a>
    </div>
@endsection
