@extends('layouts.app')

@section('title', $user->name)

@section('header', $user->name)

@section('content')
    <div>{{$user->first_name}}</div>
    <div>{{$user->second_name}}</div>
    <div>{{$user->email}}</div>
@endsection
