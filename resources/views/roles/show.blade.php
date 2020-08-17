@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Role Details') }}
                    <a href="{{ route('roles') }}" class="btn btn-secondary float-right">{{ __('Back') }}</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{ $role->title }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                        <div class="col-md-6">
                            <textarea class="form-control" readonly>{{ $role->description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="roles" class="col-md-4 col-form-label text-md-right">{{ __('Roles') }}</label>

                        <div class="col-md-6">
                            <select class="form-control" multiple readonly>
                                @foreach ($role->permissions as $permission)
                                    <option>{{ $permission->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
