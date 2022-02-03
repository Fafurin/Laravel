@extends('layouts.main')

@section('title')
    Create news
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="h4">Create news</div>
            {!! Form::open(['route' => 'admin::news::save']) !!}
            <label class="form-label">Title</label>
            <div class="form-group">
                {!! Form::text('title', $news->title, ['class' => 'form-control']) !!}
            </div>
            <label class="form-label">Summary</label>
            <div class="form-group">
                {!! Form::text('summary', $news->summary, ['class' => 'form-control']) !!}
            </div>
            <label class="form-label">Category</label>
            <div class="form-group">
                {!! Form::select('category', array('1' => 'Coronavirus', '2' => 'Politics'), $news->category) !!}
            </div>
            <label class="form-label">Source</label>
            <div class="form-group">
                {!! Form::select('source', array('1' => 'http://altenwerth.info/', '2' => 'http://www.conn.com/fuga-cumque-est-et-culpa'), $news->source) !!}
            </div>
            <label class="form-label">Status</label>
            <div class="form-group">
                {!! Form::select('status', array('1' => 'Published', '2' => 'Moderation'), $news->status) !!}
            </div>
            <label class="form-label">Path to image</label>
            <div class="form-group">
                {!! Form::text('image', $news->image, ['class' => 'form-control']) !!}
            </div>
            <label class="form-label">Content</label>
            <div class="form-group">
                {!! Form::textarea('content', $news->content, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('send', ['class' => 'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection


