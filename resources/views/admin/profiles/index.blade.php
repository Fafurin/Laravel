@extends('layouts.main')

@section('title')
    {{__('labels.news')}}
@endsection

@section('content')
    <div>
        <div class="h4"><a href = '{{ route('admin::profiles::create') }}'>{{__('labels.create_profile')}}</a></div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @forelse ($users as $user)
            <div class="container">
{{--                        <div class="h4"><a href = '{{ route('categories::news::card', ['categoryId' => $item->category_id, 'newsId' => $item->id]) }}'>--}}
{{--                                {{ $item->title }}--}}
{{--                            </a></div>--}}
                        <div>{{ $user->name }}</div>
            </div>
            <p>
                <a class="btn btn-danger" href='{{ route('admin::profiles::delete', ['id' => $user->id]) }}'>{{__('labels.delete')}}</a>
            </p>
        @empty
            <div>No profiles</div>
        @endforelse
    </div>
@endsection


