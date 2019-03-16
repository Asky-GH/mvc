<?php
$title = 'Sign In Page';
include 'layouts/header.php';
?>

<div class="container">
    <h1>Sign in</h1>

    <form action="/sign-in" method="post">
        <div class="form-group">
            <label for="username">Username</label>

            <input type="text" name="username" class="form-control" id="username" 
                    placeholder="Enter username">
        </div>
        
        <div class="form-group">
            <label for="password">Password</label>

            <input type="password" name="password" class="form-control" id="password" 
                    placeholder="Enter password">
        </div>

    <?php if (isset($error)) { ?>
        <div class="text-danger">
            <?= $error ?>
        </div>
    <?php } ?>

        <button type="submit" class="btn btn-primary">Sign In</button>
    </form>
</div>

<?php
include 'layouts/footer.php';
?>