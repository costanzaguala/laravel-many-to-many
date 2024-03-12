@extends('layouts.app')

@section('page-title',  $type->title.'edit')

@section('main-content')
    <div class="row">
        <h1 class="text-center">
            Edit type: {{ $type->name }}
        </h1>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.types.update', ['type' => $type->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Name of type<span class="text-danger">*</span></label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" placeholder="Insert the name of type" maxlength="255" required value="{{ old('name') }}">
                            @error('name')
                                 <div class="alert alert-danger">
                                     {{ $message }}
                                 </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Insert a brief description">{{ old('description') }}</textarea>
                            @error('description')
                                 <div class="alert alert-danger">
                                     {{ $message }}
                                 </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                             <label for="version" class="form-label">Version<span class="text-danger">*</span></label>
                             <input type="text" class="form-control  @error('version') is-invalid @enderror" id="version" name="version" placeholder="Insert the version" maxlength="255" required value="{{ old('technologies') }}">
                             @error('version')
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