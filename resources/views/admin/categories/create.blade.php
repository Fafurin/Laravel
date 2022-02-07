@extends('layouts.main')

@section('title')
    {{__('labels.create_category')}}
@endsection

@section('content')
    <div class="row justify-content-center">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="col-md-8">
            <div class="h4">{{__('labels.create_category')}}</div>
            {!! Form::open(['route' => 'admin::categories::save']) !!}
            @if($model->id)
                <input type="hidden" name="id" value="{{$model->id}}">
            @endif
            <div class="form-group">
                <label>{{__('labels.title')}}</label>
                {!! Form::text("title",$model->title ?? old('title'), ['class' => "form-control"]) !!}
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::submit(__('labels.save'), ['class' => 'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection


