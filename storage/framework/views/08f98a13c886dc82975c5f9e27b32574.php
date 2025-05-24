<!DOCTYPE html>
<html>
<head>
    <title>Bookstore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="text-center mb-4">📚 Bookstore Management</h2>

    <a href="<?php echo e(route('books.create')); ?>" class="btn btn-primary mb-3">➕Add New Book</a>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if($books->isEmpty()): ?>
        <p>No books available.</p>
    <?php else: ?>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php if($book->cover_page): ?>
                                <img src="<?php echo e(asset('storage/' . $book->cover_page)); ?>" alt="Cover" width="60">
                            <?php else: ?>
                                <em>No cover</em>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($book->title); ?></td>
                        <td><?php echo e($book->author); ?></td>
                        <td><?php echo e($book->genre); ?></td>
                        <td><?php echo e($book->publication_year); ?></td>
                        <td>
                            <a href="<?php echo e(route('books.edit', $book)); ?>" class="btn btn-sm btn-warning">Edit</a>

                            <form action="<?php echo e(route('books.destroy', $book)); ?>" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\PHP_Practice\bookstore_by_laravel\resources\views/books/index.blade.php ENDPATH**/ ?>