@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Item Details') }}
                    <a href="{{ route('items') }}" class="btn btn-secondary float-right">{{ __('Back') }}</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Item Name') }}</label>

                        <div class="col-md-6">
                            <input type="text" class="form-control" value="{{ $item->name }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                        <div class="col-md-6">
                            <textarea class="form-control" readonly>{{ $item->description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
