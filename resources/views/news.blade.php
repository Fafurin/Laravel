@extends('layouts.main')

@section('title')
    News
@endsection

@section('content')
    <div>
        @forelse ($news as $item)
            <div class="container">
                        <div class="h4"><a href = '{{ route('categories::news::card', ['categoryId' => $item->category_id, 'newsId' => $item->id]) }}'>
                            {{ $item->title }}
                        </a></div>
                        <div>{{ $item->summary }}</div>
                        <a href="{{ $item->source }}" target="_blank">{{ $item->source }}</a>
            </div>
            <hr>
        @empty
            <div>No news</div>
        @endforelse
    </div>
@endsection


