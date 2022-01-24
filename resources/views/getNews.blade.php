@extends('layouts.main')

@section('title')
    News
@endsection

@section('content')
    <div>
            <div>{{ $news['title'] }}</div>
            <div>{{ $news['body'] }}</div>
    </div>
@endsection


