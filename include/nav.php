<nav class="navbar navbar-expand-lg sticky-top navbar-success bg-success">
    <div class="container-fluid">
        <a class="navbar-brand mb-0 p-2 text-white" href="/">Quran Web</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent" aria-controls="navContent" aria-expanded="false" aria-label="Toggle navigation">
            <img src="<?=$url;?>/static/icons/menu.svg" alt="Menu">
        </button>
        <div class="collapse navbar-collapse" id="navContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" href="https://github.com/farhanaliofficial/Quran/issues">Report a Issue</a>
                </li>
            </ul>
            <form class="d-flex" action="<?=$url;?>/search.php" method="GET">
                <input class="form-control me-2" value="<?php if(isset($_GET['q'])){echo $_GET['q'];}else{echo '';}?>" placeholder="Surah Name or Number..." type="search" aria-label="Search" name="q">
                <button class="btn btn-light" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
