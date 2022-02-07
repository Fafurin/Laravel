@extends('layouts.main')

@section('title')
    {{__('labels.create_news')}}
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
            <div class="h4">{{__('labels.create_news')}}</div>
            {!! Form::open(['route' => 'admin::news::save']) !!}
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
                <label>{{__('labels.summary')}}</label>
                {!! Form::text("summary",$model->summary ?? old('summary'), ['class' => "form-control"]) !!}
                @error('summary')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>{{__('labels.category')}}</label>
                {!! Form::select('category_id', $categories, $model->category_id, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <label>{{__('labels.source')}}</label>
                {!! Form::select('source_id', $sources, $model->source_id, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <label>{{__('labels.status')}}</label>
                {!! Form::select('status_id', $statuses, $model->status_id, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <label>{{__('labels.image')}}</label>
                {!! Form::text("image",$model->image ?? old('image'), ['class' => "form-control"]) !!}
            </div>

            <div class="form-group">
                <label>{{__('labels.content')}}</label>
                {!! Form::textarea("content",$model->content ?? old('content') ??"", ['class' => "form-control"]) !!}
                @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>{{__('labels.publish_date')}}</label>
                {!! Form::date('publish_date', $model->publish_date ?? old('publish_date'),
                        ['dataformatas' =>'Y-m-d', 'class' => 'form-control'] )
                !!}
                @error('publish_date')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::submit(__('labels.save'), ['class' => 'btn btn-success', 'dusk' => 'save-button']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection


