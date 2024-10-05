@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            Приветики-омлетики, {{ auth()->user()->first_name }}!
    </div>
</div>
@endsection
