<?php
$title = 'Main Page';
include 'layouts/header.php';
?>

<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Welcome to Tasks application!</h1>

        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>

        <hr class="my-4">

        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>

        <a class="btn btn-primary btn-lg" href="/tasks" role="button">Get started</a>

    <?php if (! isset($_SESSION['user'])) { ?>
        <a class="btn btn-light btn-lg" href="pure-brook-55369.herokuapp.com/sign-in">Sign in</a>
    <?php } ?>
    </div>
</div>

<?php
include 'layouts/footer.php';
?>