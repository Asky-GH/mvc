<?php
$title = 'Sign In Page';
include 'layouts/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="alert alert-secondary" role="alert">
                <h1 class="mb-3">Sign in</h1>

                <form action="/sign-in" method="post">
                    <input type="hidden" name="csrfToken" value="<?= $_SESSION['csrf'] ?>">
                    
                    <div class="form-group">
                        <label for="username">Username</label>

                        <input type="text" name="username" class="form-control" id="username" 
                                placeholder="Enter username" tabindex="1">
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>

                        <input type="password" name="password" class="form-control" id="password" 
                                placeholder="Enter password" tabindex="2">
                    </div>

                    <?php include 'views/partials/errors.php'; ?>

                    <button type="submit" class="btn btn-primary" tabindex="3">Sign In</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include 'layouts/footer.php';
?>