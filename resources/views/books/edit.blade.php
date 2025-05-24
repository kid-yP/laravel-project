<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Book</h2>

    <form method="POST" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title:</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title', $book->title) }}">
        </div>

        <div class="mb-3">
            <label>Author:</label>
            <input type="text" name="author" class="form-control" required value="{{ old('author', $book->author) }}">
        </div>

        <div class="mb-3">
            <label>Genre:</label>
            <input type="text" name="genre" class="form-control" required value="{{ old('genre', $book->genre) }}">
        </div>

        <div class="mb-3">
            <label>Publication Year:</label>
            <input type="number" name="publication_year" class="form-control" required value="{{ old('publication_year', $book->publication_year) }}">
        </div>

        <div class="mb-3">
            <label>Current Cover:</label><br>
            @if ($book->cover_page)
                <img src="{{ asset('storage/' . $book->cover_page) }}" alt="Cover" width="100">
            @else
                <em>No cover</em>
            @endif
        </div>

        <div class="mb-3">
            <label>Change Cover Page (optional):</label>
            <input type="file" name="cover_page" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Book</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
