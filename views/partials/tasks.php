<div class="row">
<?php foreach ($tasks as $task) { ?>
    <div class="col">
        <div class="card mb-5">
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
                    <a href="/tasks/edit?id=<?= $task->getId() ?>"
                        class="float-right">Edit task</a>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
</div>