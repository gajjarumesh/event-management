@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h1>Edit Event</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            @include('events.partials.form', ['event' => $event])

                            <button class="btn btn-success">Update</button>
                            <a href="{{ route('events.index') }}" class="btn btn-secondary text-bg-dark">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
