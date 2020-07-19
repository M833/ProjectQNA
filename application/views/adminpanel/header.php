<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.5/examples/dashboard/dashboard.css" type="text/css">

    <title>Admin Panel</title>
</head>

<body>

    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="<?= base_url() . 'admin/dashboard' ?>">Qna</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <form action="<?php echo base_url() . 'admin/dashboard/searchquestion'; ?>" method='post'>
            <input class="form-control form-control-dark w-100" type="text" name="searchquestion" placeholder="Search" aria-label="Search">
        </form>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="<?= base_url() . 'admin/login/logout' ?>">Sign out</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?= base_url() . 'admin/dashboard' ?>">
                                <span data-feather="home"></span>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() . 'admin/dashboard/addqu' ?>">
                                <span data-feather="home"></span>
                                Add Question <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() . 'admin/dashboard/viewqu' ?>">
                                <span data-feather="file"></span>
                                View Questions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() . 'admin/dashboard/viewansweraquestion' ?>">
                                <span data-feather="file"></span>
                                Answer a question
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url() . 'admin/dashboard/viewusers' ?>">
                                <span data-feather="file"></span>
                                View users
                            </a>
                        </li>


                    </ul>


                </div>
            </nav>