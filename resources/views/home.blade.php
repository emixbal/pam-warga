@extends('layout')

@section('title', $page['title'])

@section('content')
    <div class="row">
        <hr>
        {{ $role }}
        <hr>
    </div>
@endsection
