@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-success mb-3" href="{{ route('create-user') }}">
                        {{ __('Add User') }}
                    </a>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Role') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ implode(', ', $user->roles->pluck('title')->toArray()) }}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('show-user', $user->id) }}">
                                                {{ __('View') }}
                                            </a>
                                            <a class="btn btn-primary btn-sm" href="{{ route('edit-user', $user->id) }}">
                                                {{ __('Edit') }}
                                            </a>
                                            <form class="d-inline-block" action="{{ route('destroy-user', $user->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure?') }}');">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-sm" type="submit">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
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
