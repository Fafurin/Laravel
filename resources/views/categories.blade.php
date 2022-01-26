@extends('layouts.main')

@section('title')
    Categories
@endsection

@section('content')
    <div>
        @forelse ($categories as $item)
            <div><a href = '#'>{{ $item }}</a></div>
        @empty
            <div>No categories</div>
        @endforelse
    </div>
@endsection


