@extends('layouts.app')

@section('page-title',  $project->title.' edit')

@section('main-content')
    <div class="row">
        <h1 class="text-center">
            Edit project: {{ $project->name }}
        </h1>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.projects.update', ['project' => $project->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Name of the project<span class="text-danger">*</span></label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" placeholder="Insert the name of the project" maxlength="255" required value="{{ old('name') }}">
                            @error('name')
                                 <div class="alert alert-danger">
                                     {{ $message }}
                                 </div>
                            @enderror
                         </div>
                        <div class="mb-3">
                           <label for="description" class="form-label">Description</label>
                           <textarea class="form-control" id="description" name="description" rows="3" placeholder="Insert a brief description of the project">{{ $project->description}}</textarea>
                           @error('description')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                           @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Technologies
                            </label>
                                <div>
                            @foreach ($technologies as $technology)
                                <div class="form-check form-check-inline">
                                    <input
                                        @if ($errors->any())
                                            {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}
                                        @else
                                            {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}
                                        @endif
                                        class="form-check-input"
                                        type="checkbox"
                                        id="technology-{{ $technology->id }}"
                                        name="technologies[]"
                                        value="{{ $technology->id }}">
                                    <label class="form-check-label" for="technology-{{ $technology->id }}">{{ $technology->title }}</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="mb-3">
                            <label for="creation-date" class="form-label">Date of project creation<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="creation-date" name="creation-date"  required value="{{ old('creation-date') }}">
                            @error('creation-date')
                                 <div class="alert alert-danger">
                                     {{ $message }}
                                 </div>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-warning w-100">
                                Edit
                            </button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
@endsection