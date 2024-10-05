@extends('layouts.app')

@section('title', $status->name)

@section('header', $status->name)

@section('content')
    <div>{{$status->name}}</div>

    <a href="{{ route('statuses.destroy', $status->uuid) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Удалить</a>
@endsection
