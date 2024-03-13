@extends('layouts.app')

@section('page-title', 'Technologies')

@section('main-content')
@php
    use Carbon\Carbon;
@endphp


    <div class="row">
        <h1 class="text-center text-black">
            Technologies used
        </h1>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th colspan="3" class="text-center"scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($technologies as $technology)
                            <tr>
                                <th scope="row">{{ $technology->title }}</th>
                                <td class="d-flex justify-content-center">
                                    <ul>
                                        <a href="{{ route('admin.technologies.show', ['technology' => $technology->slug]) }}" class="btn btn-xs btn-primary me-2">
                                            View
                                        </a>
                                    </ul>
                                    <ul>
                                        <a href="{{ route('admin.technologies.edit', ['technology' => $technology->slug]) }}" class="btn btn-xs btn-warning me-2">
                                            Edit
                                        </a>
                                    </ul>
                                    <ul>
                                        <form onsubmit="return confirm('Are you sure you want to delete this?');" action="{{ route('admin.technologies.destroy', ['technology' => $technology->id]) }}" method="POST">
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