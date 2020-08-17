@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Item List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @can('create-item', Auth::user())
                        <a class="btn btn-success mb-3" href="{{ route('create-item') }}">
                            {{ __('Add Item') }}
                        </a>
                    @endcan

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Description') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            @can('view-item', Auth::user())
                                                <a class="btn btn-info btn-sm" href="{{ route('show-item', $item->id) }}">
                                                    {{ __('View') }}
                                                </a>
                                            @endcan
                                            @can('edit-item', Auth::user())
                                                <a class="btn btn-primary btn-sm" href="{{ route('edit-item', $item->id) }}">
                                                    {{ __('Edit') }}
                                                </a>
                                            @endcan
                                            @can('delete-item', Auth::user())
                                                <form class="d-inline-block" action="{{ route('destroy-item', $item->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure?') }}');">
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
