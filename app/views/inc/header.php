<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= SITENAME ?></title>
    <!-- <link rel="stylesheet" href="<? URLROOT ?>/css/style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Nunito:ital,wght@1,200&family=Poppins:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,200&family=Poppins:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">


</head>
<body>
<nav style="background-color: #0275d8
;"  class="navbar navbar-expand-lg  px-lg-3 py-lg-2 shadow-sm sticky-top ">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">taskboard</a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <?php if(isset($_SESSION['user_id'])) : ?>
            <a class="nav-link active"  href="<?= URLROOT ?>/tasks/index">Tasks</a>
            <?php else : ?>
            <?php endif;?>
            </li>
        </ul>
        <?php if(isset($_SESSION['user_id'])) : ?>

            <div class="d-flex" >
                <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2"><a class="nav-link me-2" href="<?= URLROOT ?>/users/logout">Logout</a></button>
            </div>

            <?php else : ?>

        <div class="d-flex" >
            <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2"><a class="nav-link me-2" href="<?= URLROOT ?>/users/login">Login</a></button>
            <button type="button" class="btn btn-outline-dark shadow-none" ><a class="nav-link me-2" href="<?= URLROOT ?>/users/register">Register</a></button>
        </div>

        <?php endif;?>

        </div>
    </div>
    </nav>
    
