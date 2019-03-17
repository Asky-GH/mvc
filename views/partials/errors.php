<?php if (isset($errors)) { ?>
    <div class="text-danger">
        <ul>
        <?php foreach ($errors as $error) { ?>
            <li><?= $error ?></li>
        <?php } ?>
        </ul>
    </div>
<?php } ?>