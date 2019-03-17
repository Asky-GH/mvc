<?php
$title = 'Create Task Page';
include 'views/layouts/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="alert alert-secondary" role="alert">
                <h1 class="mb-3">New task</h1>

                <form action="/tasks" method="post">
                    <input type="hidden" name="csrfToken" value="<?= $_SESSION['csrf'] ?>">
                    
                    <div class="form-group">
                        <label for="username">Username</label>

                        <input type="text" name="username" class="form-control" id="username" 
                                placeholder="Enter username" tabindex="1">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>

                        <input type="text" name="email" class="form-control" id="email" 
                                placeholder="Enter email" tabindex="2">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>

                        <textarea name="description" class="form-control" id="description" 
                                    rows="3" placeholder="Enter description" tabindex="3"></textarea>
                    </div>

                    <?php include 'views/partials/errors.php'; ?>

                    <button type="submit" class="btn btn-primary" tabindex="4">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include 'views/layouts/footer.php';
?>