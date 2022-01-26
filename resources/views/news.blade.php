@extends('layouts.main')

@section('title')
    News
@endsection

@section('content')
    <div>
        @forelse ($news as $id => $item)
            <div><a href = '{{ route('categories::news', ['id' => $id]) }}'>{{ $item['title'] }}</a></div>
        @empty
            <div>No news</div>
        @endforelse
    </div>
@endsection


