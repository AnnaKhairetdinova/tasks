@extends('layouts.app')

@section('title', 'Метки')

@section('header', 'Метки')

@section('content')
    <?php
        if (auth()->user()->is_admin === 1) { ?>
            <div>
                <a class="btn btn-primary" href="{{ route('tag.create') }}" role="button" >Создать метку</a>
            </div>
        <?php } ?>

    @if (count($tags) === 0)
        <div>
            Меток нет
        </div>
    @else
        <table class="table table-hover">
            <thead>
            <tr class="tag_header">
                <td>Имя</td>
                <td>Дата создания</td>
            </tr>
            </thead>
            <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <?php
                    if (auth()->user()->is_admin === 1) { ?>
                        <td><a href="{{ route('tags.show', $tag->uuid) }}">{{$tag->name}}</a></td>
                    <?php } else { ?>
                        <td>{{$tag->name}}</td>
                    <?php } ?>

                    <td>{{$tag->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
