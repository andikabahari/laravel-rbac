@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Role List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-success mb-3" href="{{ route('create-role') }}">
                        {{ __('Add Role') }}
                    </a>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Description') }}</th>
                                    <th>{{ __('Permissions') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $role->title }}</td>
                                        <td>{{ $role->description }}</td>
                                        <td>{{ implode(', ', $role->permissions->pluck('title')->toArray()) }}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('show-role', $role->id) }}">
                                                {{ __('View') }}
                                            </a>
                                            <a class="btn btn-primary btn-sm" href="{{ route('edit-role', $role->id) }}">
                                                {{ __('Edit') }}
                                            </a>
                                            <form class="d-inline-block" action="{{ route('destroy-role', $role->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure?') }}');">
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
