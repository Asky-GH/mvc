<?php
$title = 'Edit Task Page';
include 'views/layouts/header.php';
?>

<div class="container">
    <h1>Edit task</h1>

    <form action="/tasks/edit" method="post">
        <input type="hidden" name="id" value="<?= $task->getId() ?>">

        <div class="form-group">
            <label for="username">Username</label>

            <input type="text" name="username" class="form-control" id="username" 
                    value="<?= $task->getUsername() ?>" readonly>
        </div>

        <div class="form-group">
            <label for="email">Email</label>

            <input type="text" name="email" class="form-control" id="email" 
                value="<?= $task->getEmail() ?>" readonly>
        </div>

        <div class="form-group">
            <label for="description">Description</label>

            <textarea name="description" class="form-control" id="description" 
                        rows="3" tabindex="1"><?= $task->getDescription() ?></textarea>
        </div>

        <div class="form-check">
            <input type="checkbox" name="status" id="status" class="form-check-input" 
                    <?php if ($task->getStatusId() === '2') { ?> checked <?php } ?>  tabindex="2">

            <label class="form-check-label" for="status">
                Completed
            </label>
        </div>

        <button type="submit" class="btn btn-primary" tabindex="3">Edit</button>
    </form>
</div>

<?php
include 'views/layouts/footer.php';
?>