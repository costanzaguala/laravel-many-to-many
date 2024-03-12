@extends('layouts.app')

@section('page-title', 'Project'.$type->name )

@php
    use Carbon\Carbon;
@endphp

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center mb-5">
                        {{ $type->name}}
                    </h1>

                    <div class="mb-5">
                        <h5>Version:</h5>
                        <p class="card-text">   
                            @if (!($type->version==null))
                                {{ $type->version }}
                        </p>     
                            @else
                                Empty field
                            @endif   
                    </div>
                    
                    <div class="mb-5">
                        <h5>Description:</h5>

                        @if (!($type->description==null))
                            {{ $type->description }}
                        @else                         
                            Empty field                        
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection