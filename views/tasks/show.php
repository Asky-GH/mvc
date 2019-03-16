<?php
$title = 'Tasks Page';
include 'views/layouts/header.php';
?>

<div class="container">
    <h1>Tasks</h1>

    <div class="alert alert-warning" role="alert">
        Sort by 

        <a href="/tasks?page=<?= $_SESSION['page'] ?>&sortBy=username" 
                style="text-decoration: none; color: white;">
            <button type="button" class="btn btn-info">Username</button>
        </a>

        <a href="/tasks?page=<?= $_SESSION['page'] ?>&sortBy=email" 
                style="text-decoration: none; color: white;">
            <button type="button" class="btn btn-info">Email</button>
        </a>

        <a href="/tasks?page=<?= $_SESSION['page'] ?>&sortBy=status_id" 
                style="text-decoration: none; color: white;">
            <button type="button" class="btn btn-info">Status</button>
        </a>
    </div>

    <div class="row" style="margin-bottom: 20px;">
    <?php foreach ($tasks as $task) { ?>
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $task->getUsername() ?></h5>

                    <h6 class="card-subtitle mb-2 text-muted"><?= $task->getEmail() ?></h6>

                    <p class="card-text"><?= $task->getDescription() ?></p>

                <?php if ($task->getStatusId() == 2) { ?>
                    <span class="badge badge-success">Complete</span>
                <?php } else { ?>
                    <span class="badge badge-danger">Incomplete</span>
                <?php } ?>

                    <?php if (isset($_SESSION['user'])) { ?>
                        <a href="/tasks/edit?id=<?= $task->getId() ?>">Edit task</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
        <?php for ($page = 1; $page <= $numberOfPages; $page++) { ?>
            <li class="page-item">
                <a href="/tasks?page=<?= $page ?>&sortBy=<?= $_SESSION['sortBy'] ?>"
                    class="page-link"><?= $page ?></a>
            </li>            
        <?php } ?>
        </ul>
    </nav>

    <a href="/tasks/create" style="text-decoration: none; color: white;">
        <button type="button" class="btn btn-primary">Create new task</button>
    </a>
</div>

<?php
include 'views/layouts/footer.php';
?>