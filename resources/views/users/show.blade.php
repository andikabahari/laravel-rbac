@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('User Details') }}
                    <a href="{{ route('users') }}" class="btn btn-secondary float-right">{{ __('Back') }}</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input type="email" class="form-control" value="{{ $user->email }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="roles" class="col-md-4 col-form-label text-md-right">{{ __('Roles') }}</label>

                        <div class="col-md-6">
                            <select class="form-control" multiple readonly>
                                @foreach ($user->roles as $role)
                                    <option>{{ $role->title }}</option>
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
