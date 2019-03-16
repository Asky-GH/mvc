<?php
$title = 'Edit Task Page';
include 'views/layouts/header.php';
?>

<div>
    <h1>Edit task</h1>

    <form action="/tasks/edit" method="post">
        <input type="hidden" name="id" value="<?= $task->getId() ?>">

        <input type="text" name="username" value="<?= $task->getUsername() ?>" disabled>

        <input type="text" name="email" value="<?= $task->getEmail() ?>" disabled>

        <textarea name="description" cols="30" rows="10"><?= $task->getDescription() ?></textarea>

        <label for="status">
            Completed
            <input type="checkbox" name="status" id="status" 
                    <?php if($task->getStatus()) { ?> checked <?php } ?> >
        </label>

        <input type="submit" value="Edit">
    </form>
</div>

<?php
include 'views/layouts/footer.php';
?>