<!DOCTYPE html>
<html>
<head>
    <title>Add New Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Add New Book</h2>

    <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Title:</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label>Author:</label>
            <input type="text" name="author" class="form-control" required value="{{ old('author') }}">
        </div>

        <div class="mb-3">
            <label>Genre:</label>
            <input type="text" name="genre" class="form-control" required value="{{ old('genre') }}">
        </div>

        <div class="mb-3">
            <label>Publication Year:</label>
            <input type="number" name="publication_year" class="form-control" required value="{{ old('publication_year') }}">
        </div>

        <div class="mb-3">
            <label>Cover Page:</label>
            <input type="file" name="cover_page" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Add Book</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
