<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
    <?php for ($page = 1; $page <= $numberOfPages; $page++) { ?>
        <li class="page-item">
            <a href="/tasks?page=<?= $page ?>&sortBy=<?= $_SESSION['sortBy'] ?>"
                class="page-link"><?= $page ?></a>
        </li>            
    <?php } ?>
    </ul>
</nav>