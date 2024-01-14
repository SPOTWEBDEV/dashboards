<?php

include('../../server/database.php');
include('../../server/admin/config/index.php');

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];


    if ($firstname == "" && $email == "" && $phone == "" && $country == "" && $address == "" && $city == "" && $zip == "") {
        echo 'empty';
    } else {
        $query = mysqli_query($connection, "INSERT INTO `clients`(`user_id`,`firstname`,`email`,`phone`,`country`,`address`,`city`,`zip`) VALUES('$id','$firstname','$email','$phone','$country','$address','$city','$zip')");

        if ($query) {
            echo 'inserted';
        } else {
            echo 'not inserted';
        }
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!-- Vertical Navbar -->
        <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 py-lg-0 navbar-light bg-light border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
            <div class="container-fluid">
                <!-- Toggler -->
                <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Brand -->
                <a class="navbar-brand py-lg-5 mb-lg-5 px-lg-6 me-0" href="#">
                    <!-- <img src="https://preview.webpixels.io/web/img/logos/clever-primary.svg" alt="..."> -->
                    <p class="text-2xl font-bold">Indusind Bank</p>
                </a>
                <!-- User menu (mobile) -->
                <div class="navbar-user d-lg-none">
                    <!-- Dropdown -->
                    <div class="dropdown">
                        <!-- Toggle -->
                        <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar-parent-child">
                                <img alt="Image Placeholder" src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar- rounded-circle">
                                <span class="avatar-child avatar-badge bg-success"></span>
                            </div>
                        </a>
                        <!-- Menu -->
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                            <a href="#" class="dropdown-item">Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Billing</a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidebarCollapse">
                    <!-- Form -->
                    <form class="mt-4 mb-3 d-none">
                        <div x-data="{focused: false}" :class="{ 'focused': focused }">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text border-end-0 rounded-left-pill" id="basic-addon1">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                                    </svg>
                                </span>
                                <input type="text" class="form-control border-left-0 ps-0 rounded-end-pill" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1" @focus="focused = !focused" @click.away="focused = false">
                            </div>
                        </div>
                    </form>
                    <!-- Navigation -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-house"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-bar-chart"></i> Analitycs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-chat"></i> Messages
                                <span class="badge bg-opacity-30 bg-primary text-primary rounded-pill d-inline-flex align-items-center ms-auto">6</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-bookmarks"></i> Collections
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-people"></i> Users
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="navbar-divider my-5 opacity-20">
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-4">
                        <li>
                            <span class="nav-link text-xs font-semibold text-uppercase text-muted ls-wide" href="#">
                                Teams
                            </span>
                        </li>
                        <li class="">
                            <a class="nav-link text-sm font-semibold" href="#">
                                <span class="w-2 h-2 rounded-circle me-3 bg-primary"></span>Marketing
                            </a>
                        </li>
                        <li class="">
                            <a class="nav-link text-sm font-semibold" href="#">
                                <span class="w-2 h-2 rounded-circle me-3 bg-warning"></span>Development
                            </a>
                        </li>
                        <li class="">
                            <a class="nav-link text-sm font-semibold" href="#">
                                <span class="w-2 h-2 rounded-circle me-3 bg-success"></span>Design
                            </a>
                        </li>
                        <li class="">
                            <a class="nav-link text-sm font-semibold" href="#">
                                <span class="w-2 h-2 rounded-circle me-3 bg-tertiary"></span>Social Media
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                <!-- Title -->
                                <h1 class="h2 mb-0 ls-tight">Indusind Bank</h1>
                            </div>
                            <!-- Actions -->
                            <div class="col-sm-6 col-12 text-sm-end">
                                <div class="mx-n1">
                                    <a href="#" class="btn d-inline-flex btn-sm btn-neutral mx-1">
                                        <span class=" pe-2">
                                            <i class="bi bi-pencil"></i>
                                        </span>
                                        <span>Edit</span>
                                    </a>
                                    <a href="#" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                        <span class=" pe-2">
                                            <i class="bi bi-plus"></i>
                                        </span>
                                        <span>Create</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Nav -->
                        <ul class="nav nav-tabs mt-4 overflow-x border-0">
                            <li class="nav-item ">
                                <a href="#" class="nav-link active">All files</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link font-regular">Shared</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link font-regular">File requests</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
            <!-- Main -->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-7 mx-auto">
                            <!-- Profile picture -->
                            <div class="card shadow border-0 mt-4 mb-10">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="avatar avatar-lg bg-warning rounded-circle text-white">
                                                    <img alt="..." src="https://images.unsplash.com/photo-1579463148228-138296ac3b98?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80">
                                                </a>
                                                <div class="ms-4">
                                                    <span class="h4 d-block mb-0">Julianne Moore</span>
                                                    <a href="#" class="text-sm font-semibold text-muted">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ms-auto">
                                            <button type="button" class="btn btn-sm btn-neutral">Upload</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Form -->
                            <div class="mb-5">
                                <h5 class="mb-0">Contact Information</h5>
                            </div>
                            <form method="POST" class="mb-6">
                                <div class="row mb-5">
                                    <div class="col-md-6" hidden>
                                        <div class="">
                                            <label class="form-label" for="id">Fullname</label>
                                            <input name="id" type="text" class="form-control" id="id">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="">
                                            <label class="form-label" for="first_name">Fullname</label>
                                            <input name="firstname" type="text" class="form-control" id="first_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="">
                                            <label class="form-label" for="email">Email</label>
                                            <input name="email" type="email" class="form-control" id="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-5">
                                    <div class="col-md-6">
                                        <div class="">
                                            <label class="form-label" for="phone_number">Phone number</label>
                                            <input name="phone" type="number" class="form-control" id="phone_number">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="">
                                            <label class="form-label" for="country">Country</label>
                                            <select name="country" class="form-select" id="country" placeholder="Your email" aria-label="Default select example">
                                                <option selected>Country</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="">
                                            <label class="form-label" for="address">Address</label>
                                            <input name="address" type="text" class="form-control" id="address">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="">
                                            <label class="form-label" for="city">City</label>
                                            <input name="city" type="text" class="form-control" id="city">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="">
                                            <label class="form-label" for="zip">ZIP</label>
                                            <input name="zip" type="tel" class="form-control" id="zip">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="check_primary_address" id="check_primary_address">
                                            <label class="form-check-label" for="check_primary_address">
                                                Make this my default address
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="button" class="btn btn-sm btn-neutral me-2">Cancel</button>
                                    <button name="submit" type="submit" class="btn btn-sm btn-primary">Save</button>
                                </div>
                            </form>
                            <hr class="my-10" />
                            <!-- Individual switch cards -->
                            <div class="row g-6">
                                <div class="col-md-6">
                                    <div class="card shadow border-0">
                                        <div class="card-body">
                                            <h5 class="mb-2">Public profile</h5>
                                            <p class="text-sm text-muted mb-6">
                                                Making your profile public means that anyone on the network will be able to find you.
                                            </p>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card shadow border-0">
                                        <div class="card-body">
                                            <h5 class="mb-2">Show my email</h5>
                                            <p class="text-sm text-muted mb-6">
                                                Showing your e-mail adresses means that anyone on the network will be able to find you.
                                            </p>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card shadow border-0">
                                        <div class="card-body d-flex align-items-center">
                                            <div>
                                                <h5 class="text-danger mb-2">Deactivate account</h5>
                                                <p class="text-sm text-muted">
                                                    Once you delete your account, there is no going back. Please be certain.
                                                </p>
                                            </div>
                                            <div class="ms-auto">
                                                <button type="button" class="btn btn-sm btn-danger">Deactivate</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

</body>

</html>