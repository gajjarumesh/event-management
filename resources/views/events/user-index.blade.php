@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <div class="row justify-content-md-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2>Available Events</h2>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Location</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Banner</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($events as $event)
                                    <tr>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->location }}</td>
                                        <td>{{ $event->start_date }}</td>
                                        <td>{{ $event->end_date }}</td>
                                        <td>
                                            @if ($event->banner_image)
                                                <img src="{{ asset('storage/' . $event->banner_image) }}" width="80">
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            @if ($event->users->contains(auth()->id()))
                                                <form action="{{ url('events/' . $event->id . '/unregister') }}"
                                                    method="POST" class="d-inline">
                                                    @csrf @method('DELETE')
                                                    <button class="btn btn-danger btn-sm">Unregister</button>
                                                </form>
                                            @else
                                                <form action="{{ url('events/' . $event->id . '/register') }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    <button class="btn btn-success btn-sm">Register</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No events available.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
