@extends('layouts.app')

@section('title', 'Метки')

@section('header', 'Метки')

@section('content')
    @if (count($tags) === 0)
        <div>
            Меток нет
        </div>
    @else
        <table class="tags">
            <thead>
            <tr class="tag_header">
                <td>Имя</td>
                <td>Дата создания</td>
            </tr>
            </thead>
            <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <td><a href="{{ route('tags.show', $tag->uuid) }}">{{$tag->name}}</a></td>
                    <td>{{$tag->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
