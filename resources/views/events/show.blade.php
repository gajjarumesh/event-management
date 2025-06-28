@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <div class="card">
                    @if ($event->banner_image)
                        <img src="{{ asset('storage/' . $event->banner_image) }}" class="card-img-top" alt="..."
                            width="300">
                    @endif

                    <div class="card-header">
                        <h1>{{ $event->title }}</h1>
                    </div>
                    <div class="card-body">
                        <p><strong>Location:</strong> {{ $event->location }}</p>
                        <p><strong>Start Date:</strong> {{ $event->start_date }}</p>
                        <p><strong>End Date:</strong> {{ $event->end_date }}</p>
                        <p><strong>Description:</strong> {{ $event->description }}</p>


                        <a href="{{ route('events.index') }}" class="btn btn-secondary mt-3">Back to Events</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
