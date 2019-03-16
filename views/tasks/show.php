<?php
$title = 'Tasks Page';
include 'views/layouts/header.php';
?>

<div class="container">
    <h1>Tasks</h1>

    <a href="/tasks?page=<?= $_SESSION['page'] ?>&sortBy=username">Sort by username</a>
    <a href="/tasks?page=<?= $_SESSION['page'] ?>&sortBy=email">Sort by email</a>
    <a href="/tasks?page=<?= $_SESSION['page'] ?>&sortBy=status_id">Sort by status</a>

<?php for ($page = 1; $page <= $numberOfPages; $page++) { ?>
    <a href="/tasks?page=<?= $page ?>&sortBy=<?= $_SESSION['sortBy'] ?>"><?= $page ?></a>
<?php } ?>

    <?php foreach ($tasks as $task) { ?>
        <div>
            <p>Username: <?= $task->getUsername() ?></p>

            <p>Email: <?= $task->getEmail() ?></p>

            <p>Description: <?= $task->getDescription() ?></p>

            <p>Status: 
        <?php if ($task->getStatusId() === '1') { echo 'Incomplete'; } else { echo 'Complete'; } ?>
            </p>

        <?php if (isset($_SESSION['user'])) { ?>
            <p>
                <a href="/tasks/edit?id=<?= $task->getId() ?>">Edit task</a>
            </p>
        <?php } ?>
        </div>
    <?php } ?>

    <p>
        <a href="/tasks/create">Create new task</a>
    </p>
</div>

<?php
include 'views/layouts/footer.php';
?>