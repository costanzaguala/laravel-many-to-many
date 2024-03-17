@extends('layouts.app')

@section('page-title', 'Projects'.$project->name )

@php
    use Carbon\Carbon;
@endphp

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success mb-5">
                        Project: {{ $project->name}}
                    </h1>
                    @if ($project->cover_img != null)
                    <div class="my-3">
                        <img src="{{ asset('storage/'.$project->cover_img) }}" style="max-width: 500px;">
                    </div>
                    @endif
                    <div class="mb-5">
                        <h5>Description:</h5>

                        <p class="card-text"> {{ $project->description}}</p>         
                    </div>
                    
                    <div class="mb-5">
                        <h5>Tecnologies used:</h5>
                        <ul>
                            @if (!($project->type==null))
                            {{ $project->type->name}}
                            @else 
                            -
                            @endif
                        </ul>
                    </div>

                    <div class="mb-5">
                        <h5> Date of creation of the project:</h5>

                        <p class="card-text"> {{ Carbon::createFromFormat('Y-m-d', $project->creation_date)->format('d-m-Y') }}</p>         
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection