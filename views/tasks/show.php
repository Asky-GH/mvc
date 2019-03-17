<?php
$title = 'Tasks Page';
include 'views/layouts/header.php';
?>

<div class="container">
    <div class="alert alert-warning mb-5" role="alert">
        <div class="row">
            <div class="col">
                <div>
                    <a href="/tasks/create" class="btn btn-primary btn-lg">Create new task</a>
                </div>
            </div>
            
            <div class="col">
                <?php include 'views/partials/sorting.php'; ?>
            </div>                    
        </div>
    </div>            

    <?php include 'views/partials/tasks.php'; ?>

    <?php include 'views/partials/pagination.php'; ?>
</div>

<?php
include 'views/layouts/footer.php';
?>