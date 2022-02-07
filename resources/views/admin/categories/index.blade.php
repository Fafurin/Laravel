@extends('layouts.main')

@section('title')
    {{__('labels.categories')}}
@endsection

@section('content')
    <div>
        <div class="h4"><a href = '{{ route('admin::categories::create') }}'>{{__('labels.create_category')}}</a></div>
        @forelse ($categories as $category)
            <div class="container">
                <div class="row justify-content-center">
                <div class="h4"><a href = '{{ route('categories::news', ['categoryId' => $category->id]) }}'>
                        {{ $category->title }}
                    </a></div>
                </div>
            </div>
            <p>
                <a class="btn btn-primary" href='{{ route('admin::categories::update', ['category' => $category->id]) }}'>{{__('labels.update')}}</a>
                <a class="btn btn-danger" href='{{ route('admin::categories::delete', ['id' => $category->id]) }}'>{{__('labels.delete')}}</a>
            </p>
        @empty
            <div>No categories</div>
        @endforelse
        <hr>
    </div>
@endsection


