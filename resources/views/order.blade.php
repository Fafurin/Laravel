@extends('layouts.main')

@section('title')
    Order form
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="h4">Order form</div>
            {!! Form::open(['route' => 'order::create']) !!}
            <label class="form-label">First Name</label>
            <div class="form-group">
                {!! Form::text('firstName', '', ['class' => 'form-control']) !!}
            </div>
            <label class="form-label">Last Name</label>
            <div class="form-group">
                {!! Form::text('lastName', '', ['class' => 'form-control']) !!}
            </div>
            <label class="form-label">Phone</label>
            <div class="form-group">
                {!! Form::text('phone', '', ['class' => 'form-control']) !!}
            </div>
            <label class="form-label">E-mail</label>
            <div class="form-group">
                {!! Form::text('email', '', ['class' => 'form-control']) !!}
            </div>
            <label class="form-label">Order Information</label>
            <div class="form-group">
                {!! Form::textarea('orderInfo', '', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('send', ['class' => 'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection


