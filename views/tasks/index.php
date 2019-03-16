<?php
$title = 'Tasks Page';
include 'views/layouts/header.php';
session_start();
?>

<div>
    <h1>Tasks</h1>

    <ul>
    <?php foreach ($tasks as $task) { ?>
        <li><?= $task->getDescription() ?></li>
        <?php if (isset($_SESSION['user'])) { ?>
            <p>
                <a href="/tasks/edit?id=<?= $task->getId() ?>">Edit task</a>
            </p>
        <?php } ?>
    <?php } ?>
    </ul>

    <p>
        <a href="/tasks/create">Create new task</a>
    </p>
</div>

<?php
include 'views/layouts/footer.php';
?>