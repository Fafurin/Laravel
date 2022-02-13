@extends('layouts.main')

@section('title')
    {{__('labels.create_profile')}}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="h4">{{__('labels.create_profile')}}</div>
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
            <form action="{{route('admin::profiles::save')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>{{__('labels.name')}}</label>
                    <input class="form-control" type="text" name="name"
                           value="{{$user->name ?? old('name')}}">
                </div>
                <div class="form-group">
                    <label>{{__('labels.email')}}</label>
                    <input class="form-control" type="email" name="email"
                           value="{{$user->email ?? old('email')}}">
                </div>

                <div class="form-group">
                    <label>{{__('labels.is_admin')}}</label>
                    <input class="form-check-input" type="checkbox" name="is_admin">
                </div>

                <div class="form-group">
                    <label>{{__('labels.password')}}</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="form-group">
                    <label>{{__('labels.confirm_password')}}</label>
                    <input class="form-control" type="password" name="confirm_password">
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="{{__('labels.save')}}">
                </div>
            </form>
        </div>
    </div>
@endsection
