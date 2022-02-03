@extends('layouts.main')

@section('title')
    News
@endsection

@section('content')

<!--    --><?php
//        dd($item);
//    ?>

    <div><img src="{{ $item->image }}"></div>
    <div class="h2">{{ $item->title}}</div>
    <div class="h4">{{ $item->summary}}</div>
    <div>{{ $item->content}}</div>
    <div>{{ $item->publish_date}}</div>
@endsection


