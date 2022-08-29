<!doctype html>
<html class="no-js h-100" lang="">
<!-- Mirrored from www.radiustheme.com/demo/html/newsedge/newsedge/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Feb 2020 08:41:57 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>NewsEdge | Home 1</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="d-flex flex-column h-100">
<div id="preloader"></div>
<?php
if (isset($error['username'])) { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo $error['username'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } else if (isset($error['password'])) { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo $error['password'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } else if (isset($error['fullName'])) { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo $error['fullName'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } else if (isset($error['username_exist'])) { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo $error['username_exist'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php }
?>
<?php
if (isset($errorLogin['username'])) { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo $errorLogin['username'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } else if (isset($errorLogin['password'])) { ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo $errorLogin['password'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php }
?>
<div class="wrapper">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-auto">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="./?controller=home">M<b style="color: #0F9E5E">Wood</b>S</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>

            </ul>
            <form class="d-flex" method="post">
                <input class="form-control me-2" type="search" name="searchValue" placeholder="Product name" aria-label="Search">
                <button class="btn btn-outline-success" type="submit" name="search">Search</button>
            </form>

            <ul class="navbar-nav mb-2 mb-lg-0">
                <?php
                if (!empty($_SESSION['user'])) { ?>
                    <li>
                        <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#signup">
                            <i class="fa fa-user" aria-hidden="true"></i><?= $_SESSION['user']['fullname'] ?>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-link">
                            <a href="?controller=cartController">
                                Cart
                            </a>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-link">
                            <a href="?controller=logout">
                                Logout
                            </a>
                        </button>
                    </li>
                <?php } else { ?>
                    <li>
                        <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#signup">
                            <i class="fa fa-user" aria-hidden="true"></i>Sign up
                        </button>
                    </li>

                    <li>
                        <a href="?controller=login">
                        <button type="button" class="btn btn-link" >
                            <i class="fa fa-user" aria-hidden="true"></i>Sign in
                        </button>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

</div>