<nav class="navbar navbar-expand-lg navbar-light my-1">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="images/porsche-logo.png" alt="" width="50" class="d-inline-block align-text-center">
            PORSCHE COMPANY
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == "index") { ?>active<?php } ?>" href="index.php"><i class="bi bi-house"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == "history") { ?>active<?php } ?>" href="history.php"><i class="bi bi-bank"></i> Company</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == "product_list_for_customer") { ?>active<?php } ?>" href="product_list_for_customer.php"><i class="bi bi-car-front-fill"></i> List</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link <?php if ($page == "admin") { ?>active<?php } ?> dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-card-checklist"></i> Server
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="login.php">Log in</a></li>
                        <li><a class="dropdown-item" href="product_list_for_admin.php">list</a></li>
                        <li><a class="dropdown-item" href="product_add_form.php">Add</a></li>
                        <li><a class="dropdown-item" href="logout.php">Log out</a></li>

                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>