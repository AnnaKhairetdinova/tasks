@extends('layouts.app')

@section('title', $tag->name)

@section('header', $tag->name)

@section('content')
    <div>{{$tag->description}}</div>
    <div>
        <a class="btn btn-primary" href="{{ route('tags.destroy', $tag->uuid) }}" role="button" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Удалить</a>
    </div>
@endsection
