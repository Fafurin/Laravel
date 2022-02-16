@extends('layouts.main')

@section('title')
    News
@endsection

@section('content')
    <div><img src="{{ $item->image }}"></div>
    <div class="h1">{{ $item->title}}</div>
    <div class="h4">{{ $item->summary}}</div>
    <div>{{ $item->content}}</div>
    <a href="{{ $item->source }}" target="_blank">{{ $item->source }}</a>
    <div>{{ $item->publish_date}}</div>
@endsection


