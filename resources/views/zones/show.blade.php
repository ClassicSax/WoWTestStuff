@extends('layout')

@section('content')
    <h1 class="title">{{ $zone->name }}</h1>

    <div class="content">
        {{$zone->description}}
    </div>
        @foreach ($bosses as $boss)
            <h1 class="title">{{$boss->name}}</h1>
            <div class="content">
                {{$boss->description}}
            </div>
         @endforeach


@endsection
