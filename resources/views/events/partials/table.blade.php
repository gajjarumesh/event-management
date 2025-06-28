<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Location</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Banner</th>
            <th>Actions</th>
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
                    <a href="{{ route('events.show', $event) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('events.edit', $event) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('events.destroy', $event) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Are you sure?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No events found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{ $events->withQueryString()->links() }}
