@extends('layouts.main')

@section('title')
    {{__('labels.news')}}
@endsection

@section('content')
    <div>
        <div class="h4"><a href = '{{ route('admin::news::create') }}'>{{__('labels.create_news')}}</a></div>
        @forelse ($news as $item)
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div><img src="{{ $item->icon }}"></div>
                    </div>
                    <div class="col">
                        <div class="h4"><a href = '{{ route('categories::news::card', ['categoryId' => $item->category_id, 'newsId' => $item->id]) }}'>
                            {{ $item->title }}
                        </a></div>
                        <div>{{ $item->category['title'] }}</div>
                        <div>{{ $item->summary }}</div>
                    </div>
                </div>
            </div>
            <p>
                <a class="btn btn-primary" href='{{ route('admin::news::update', ['news' => $item->id]) }}'>{{__('labels.update')}}</a>
                <a class="btn btn-danger" href='{{ route('admin::news::delete', ['id' => $item->id]) }}'>{{__('labels.delete')}}</a>
            </p>
        @empty
            <div>No news</div>
        @endforelse
        <hr>
        <div class="row justify-content-center">
            {{$news->links()}}
        </div>
    </div>
@endsection


