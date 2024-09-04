@extends('layouts.app')

@section('title', $tag->name)

@section('header', $tag->name)

@section('content')
    <div>{{$tag->name}}</div>
    <div>{{$tag->description}}</div>

    <a href="{{ route('tags.destroy', $tag->uuid) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Удалить</a>
@endsection
