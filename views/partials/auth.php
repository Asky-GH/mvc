<?php if (! isset($_SESSION['user'])) { ?>
    <a class="ml-auto nav-link" href="/sign-in">Sign in</a>
<?php } else { ?>
    <a class="ml-auto navbar-item" href="#" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">Sign out</a>
    <form id="logout-form" method="post" style="display: none;" action="/sign-out">
        <input type="hidden" name="csrfToken" value="<?= $_SESSION['csrf'] ?>">
    </form>
<?php } ?>