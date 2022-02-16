@extends('layouts.main')

@section('title')
    News
@endsection

@section('content')
    <div>
        @forelse ($news as $item)
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div><img src="{{ $item->image }}" width="200" height="130"></div>
                    </div>
                    <div class="col">
                        <div class="h4">
                            <a href = '{{ route('categories::news::card', ['categoryId' => $item->category_id, 'newsId' => $item->id]) }}'>
                                {{ $item->title }}
                            </a>
                        </div>
                        <div>
                            <a href='{{ route('categories::news', ['categoryId' => $item->category_id,]) }}'>
                                {{ $item->category['title'] }}
                            </a>
                        </div>
                        <div>{{ $item->summary }}</div>
                    </div>
                </div>
            </div>
            <hr>
        @empty
            <div>No news</div>
        @endforelse
    </div>
    <div class="row justify-content-center">
        {{$news->links()}}
    </div>
@endsection
