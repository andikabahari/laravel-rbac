@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Permission List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @can('create-permission', Auth::user())
                        <a class="btn btn-success mb-3" href="{{ route('create-permission') }}">
                            {{ __('Add Permission') }}
                        </a>
                    @endcan

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $permission->title }}</td>
                                        <td>
                                            @can('view-permission', Auth::user())
                                                <a class="btn btn-info btn-sm" href="{{ route('show-permission', $permission->id) }}">
                                                    {{ __('View') }}
                                                </a>
                                            @endcan
                                            @can('edit-permission', Auth::user())
                                                <a class="btn btn-primary btn-sm" href="{{ route('edit-permission', $permission->id) }}">
                                                    {{ __('Edit') }}
                                                </a>
                                            @endcan
                                            @can('delete-permission', Auth::user())
                                                <form class="d-inline-block" action="{{ route('destroy-permission', $permission->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure?') }}');">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm" type="submit">
                                                        {{ __('Delete') }}
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
