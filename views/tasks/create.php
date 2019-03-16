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

    <?php if (isset($errors)) { ?>
        <div class="text-danger">
            <ul>
            <?php foreach ($errors as $error) { ?>
                <li><?= $error ?></li>
            <?php } ?>
            </ul>
        </div>
    <?php } ?>
    
        <button type="submit" class="btn btn-primary" tabindex="4">Create</button>
    </form>
</div>

<?php
include 'views/layouts/footer.php';
?>