@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-md-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1>Events</h1>
                            <a href="{{ route('events.create') }}" class="btn btn-primary">Create Event</a>
                        </div>
                    </div>
                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form id="filterForm" class="row g-3 mb-4">
                            <div class="col-md-4">
                                <input type="text" name="location" class="form-control" placeholder="Location"
                                    value="{{ request('location') }}">
                            </div>
                            <div class="col-md-3">
                                <input type="date" name="start_date" class="form-control"
                                    value="{{ request('start_date') }}">
                            </div>
                            <div class="col-md-3">
                                <input type="date" name="end_date" class="form-control"
                                    value="{{ request('end_date') }}">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary w-100">Filter</button>
                            </div>
                        </form>
                        <div id="eventsTable">
                            @include('events.partials.table', ['events' => $events])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on('submit', '#filterForm', function(e) {
            e.preventDefault();
            fetchEvents(1);
        });

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            fetchEvents(page);
        });

        function fetchEvents(page = 1) {
            let formData = $('#filterForm').serialize();
            $.ajax({
                url: "?page=" + page,
                data: formData,
                success: function(data) {
                    $('#eventsTable').html(data);
                }
            });
        }
    </script>
@endsection
