<div class="dropdown float-right">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Sort by
    </button>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a href="/tasks?page=<?= $_SESSION['page'] ?>&sortBy=username" 
            class="dropdown-item">Username</a>
            
        <a href="/tasks?page=<?= $_SESSION['page'] ?>&sortBy=email" 
            class="dropdown-item">Email</a>

        <a href="/tasks?page=<?= $_SESSION['page'] ?>&sortBy=status_id" 
            class="dropdown-item">Status</a>
    </div>
</div>