<?php
$title = 'Create Task Page';
include 'views/layouts/header.php';
?>

<div class="container">
    <h1>New task</h1>

    <form action="/tasks" method="post">
        <div class="form-group">
            <label for="username">Username</label>

            <input type="text" name="username" class="form-control" id="username" 
                    placeholder="Enter username">
        </div>

        <div class="form-group">
            <label for="email">Email</label>

            <input type="text" name="email" class="form-control" id="email" 
                    placeholder="Enter email">
        </div>

        <div class="form-group">
            <label for="description">Description</label>

            <textarea name="description" class="form-control" id="description" 
                        rows="3" placeholder="Enter description"></textarea>
        </div>

    <?php if (isset($error)) { ?>
        <div class="text-danger">
            <?= $error ?>
        </div>
    <?php } ?>
    
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

<?php
include 'views/layouts/footer.php';
?>