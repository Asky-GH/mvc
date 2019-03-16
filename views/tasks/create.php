<?php
$title = 'Create Task Page';
include 'views/layouts/header.php';
?>

<div>
    <h1>New task</h1>

    <form action="/tasks" method="post">
        <input type="text" name="username" placeholder="Username">

        <input type="text" name="email" placeholder="Email">

        <textarea name="description" cols="30" rows="10" placeholder="Description"></textarea>

        <input type="submit" value="Create">
    </form>
</div>

<?php
include 'views/layouts/footer.php';
?>