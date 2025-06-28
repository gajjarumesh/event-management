<div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" name="title" value="{{ old('title', $event->title ?? '') }}" class="form-control @error('title') is-invalid @enderror" required>
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Location</label>
    <input type="text" name="location" value="{{ old('location', $event->location ?? '') }}" class="form-control @error('location') is-invalid @enderror" required>
    @error('location')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Start Date</label>
    <input type="date" name="start_date" value="{{ old('start_date', $event->start_date ?? '') }}" class="form-control @error('start_date') is-invalid @enderror" required>
    @error('start_date')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">End Date</label>
    <input type="date" name="end_date" value="{{ old('end_date', $event->end_date ?? '') }}" class="form-control @error('end_date') is-invalid @enderror" required>
    @error('end_date')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $event->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Banner Image</label>
    <input type="file" name="banner_image" class="form-control @error('banner_image') is-invalid @enderror">
    @error('banner_image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    
    @if(!empty($event) && $event->banner_image)
        <p>Current: <img src="{{ asset('storage/' . $event->banner_image) }}" width="100"></p>
    @endif
</div>
