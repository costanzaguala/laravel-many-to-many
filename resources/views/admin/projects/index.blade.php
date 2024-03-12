@extends('layouts.app')

@section('page-title', 'Projects')

@section('main-content')
{{-- importazione carbon --}}
@php
    use Carbon\Carbon;
@endphp

    <div class="row">
        <h1 class="text-center">
            Projects created
        </h1>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Languages used</th>
                                <th scope="col">Start date</th>
                                <th colspan="3" class="text-center"scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr>
                                <th scope="row">{{ $project->name }}</th>
                                <td>{{ $project->type_id}}</td>
                                <td>
                                    {{ Carbon::createFromFormat('Y-m-d', $project->creation_date)->format('d-m-Y') }}
                                </td>
                                <td class="d-flex justify-content-center">
                                    <ul>
                                        <a href="{{ route('admin.projects.show', ['project' => $project->slug]) }}" class="btn btn-xs btn-primary me-2">
                                            View
                                        </a>
                                    </ul>
                                    <ul>
                                        <a href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}" class="btn btn-xs btn-warning me-2">
                                            Edit
                                        </a>
                                    </ul>
                                    <ul>
                                        <form onsubmit="return confirm('Are you sure you want to delete this?');"  action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}" method="POST">
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