<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>TODO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="text-center mb-4">TODO</h1>

    
    <div class="card mb-4">
        <div class="card-body">
            <form action="<?php echo e(route('todos.add')); ?>" method="POST" class="d-flex gap-2">
                <?php echo csrf_field(); ?>
                <input type="text" name="title" class="form-control" placeholder="Nový úkol">
                <button class="btn btn-success">Přidat</button>
            </form>
        </div>
    </div>

    
    <div class="card">
        <div class="card-header">
            <strong>Seznam úkolů</strong>
        </div>
        <ul class="list-group list-group-flush">

            <?php $__empty_1 = true; $__currentLoopData = $todos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <li class="list-group-item">
                    <form action="<?php echo e(route('todos.edit', $id)); ?>" method="POST" class="d-flex gap-2">
                        <?php echo csrf_field(); ?>
                        <input type="text"
                               name="title"
                               value="<?php echo e($todo['title']); ?>"
                               class="form-control">
                        <button class="btn btn-primary btn-sm">Upravit</button>
                        <a href="<?php echo e(route('todos.delete', $id)); ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Smazat?');">Smazat</a>
                    </form>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <li class="list-group-item text-muted">Žádné úkoly...</li>
            <?php endif; ?>

        </ul>
    </div>
</div>

</body>
</html>
<?php /**PATH D:\Users\Adam.david\Desktop\todo\resources\views/todos.blade.php ENDPATH**/ ?>