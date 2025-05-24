<!DOCTYPE html>
<html>
<head>
    <title>Add New Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Add New Book</h2>

    <form method="POST" action="<?php echo e(route('books.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label>Title:</label>
            <input type="text" name="title" class="form-control" required value="<?php echo e(old('title')); ?>">
        </div>

        <div class="mb-3">
            <label>Author:</label>
            <input type="text" name="author" class="form-control" required value="<?php echo e(old('author')); ?>">
        </div>

        <div class="mb-3">
            <label>Genre:</label>
            <input type="text" name="genre" class="form-control" required value="<?php echo e(old('genre')); ?>">
        </div>

        <div class="mb-3">
            <label>Publication Year:</label>
            <input type="number" name="publication_year" class="form-control" required value="<?php echo e(old('publication_year')); ?>">
        </div>

        <div class="mb-3">
            <label>Cover Page:</label>
            <input type="file" name="cover_page" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Add Book</button>
        <a href="<?php echo e(route('books.index')); ?>" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\PHP_Practice\bookstore_by_laravel\resources\views/books/create.blade.php ENDPATH**/ ?>