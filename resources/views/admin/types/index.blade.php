@extends('layouts.app')

@section('page-title', 'Types')

@section('main-content')
{{-- importazione carbon --}}
@php
    use Carbon\Carbon;
@endphp


    <div class="row">
        <h1 class="text-center text-black">
            Types of projects
        </h1>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Version</th>
                                <th colspan="3" class="text-center"scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($types as $type)
                            <tr>
                                <th scope="row">{{ $type->name }}</th>
                                <td>
                                    @if (!($type->version==null))
                                    {{ $type->version }}
                                    @else 
                                    -
                                    @endif
                                </td>
                                <td class="d-flex justify-content-center">
                                    <ul>
                                        <a href="{{ route('admin.types.show', ['type' => $type->id]) }}" class="btn btn-xs btn-primary me-2">
                                            View
                                        </a>
                                    </ul>
                                    <ul>
                                        <a href="{{ route('admin.types.edit', ['type' => $type->id]) }}" class="btn btn-xs btn-warning me-2">
                                            Edit
                                        </a>
                                    </ul>
                                    <ul>
                                        <form onsubmit="return confirm('Are you sure you want to delete this?');"  action="{{ route('admin.types.destroy', ['type' => $type->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    Delete
                                                </button>
                                        </form>
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
@endsection