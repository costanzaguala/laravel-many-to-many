
@extends('layouts.app')

@section('page-title', 'Projects with Technology: ' . $technology->title)

@section('main-content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center mb-5">
                    Projects with Technology: {{ $technology->title }}
                </h1>
                <ul>
                    @forelse ($technology->projects as $project)
                        <li>
                            <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">
                                {{ $project->name }}
                            </a>
                        </li>
                    @empty
                        <li>No projects found with this technology.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection