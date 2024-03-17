@extends('layouts.app')

@section('page-title', 'Add-project')

@section('main-content')
    <div class="row">
        <h1 class="text-center">
            Add project
        </h1>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
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
                           <textarea class="form-control" id="description" name="description" rows="3" placeholder="Insert a brief description of the project">{{ old('description') }}</textarea>
                           @error('description')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                           @enderror
                        </div>
                        <div class="mb-3">
                            @foreach ($technologies as $technology)
                                <div class="form-check form-check-inline">
                                    <input
                                    {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}
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
                            <label for="cover_img" class="form-label">Upload project image</label>
                            <input class="form-control" type="file" id="cover_img" name="cover_img">
                            @error('cover_img')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                           <label for="creation_date" class="form-label">Date of project creation<span class="text-danger">*</span></label>
                           <input type="date" class="form-control" id="creation_date" name="creation_date"  required value="{{ old('creation_date') }}">
                           @error('creation_date')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                           @enderror
                        </div>
                        <div>
                           <button type="submit" class="btn btn-success w-100">
                                 + Add
                           </button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
@endsection