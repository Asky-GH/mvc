<?php
$title = 'Sign In Page';
include 'layouts/header.php';
?>

<div>
    <h1>Please sign in</h1>

    <form action="/sign-in" method="post">
        <input type="text" name="username" placeholder="Username">

        <input type="password" name="password" placeholder="Password">

    <?php if (isset($error)) { ?>
        <p><?= $error ?></p>
    <?php } ?>

        <input type="submit" value="Sign In">
    </form>
</div>

<?php
include 'layouts/footer.php';
?>