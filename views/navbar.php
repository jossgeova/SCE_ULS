<nav class="navbar navbar-expand-lg " style="background-color: #165773;">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="./index.php"><b>SCE</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="btn btnModulosPrincipal" aria-current="page" href="./index.php">
                        <i class="fa-solid fa-house-laptop"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btnModulosPrincipal" aria-current="page" data-bs-toggle="modal" data-bs-target="#ModalModulosIndex">
                        <i class="fa-solid fa-table-list"></i>
                    </a>
                </li>
            </ul>
            <form class="d-flex" role="search" action="./index.php" method="POST">
                <input type="hidden" class="form-control me-2" value="1" name="off">
                <button class="btn btn-danger btn-sm" type="submit"><i class="fa-solid fa-right-from-bracket"></i></button>
            </form>
        </div>
    </div>
</nav>