@extends('layout')

@section('title', 'The zones of World of Warcraft')

@section('content')
<h1 class="title">The Zones of World of Warcraft</h1>

    <ul>
        @foreach($zones as $zone)
            <li>
                <a href="/index/{{ $zone->id }}">
                    <ul>
                        {{ $zone->name }}
                    </ul>
                </a>
            </li>
        @endforeach
    </ul>
@endsection
