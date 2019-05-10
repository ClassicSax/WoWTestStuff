@extends('layout')

@section('content')
    <h1 class="title">{{ $zone->name }}</h1>

    <div class="content">
        {{$zone->description}}
    </div>
@endsection
