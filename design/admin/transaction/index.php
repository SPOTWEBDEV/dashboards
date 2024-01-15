<?php

include('../../server/database.php');
include('../../server/admin/config/index.php');

// session_start();

if (isset($_SESSION['new_login_id'])) {

         $id = $_SESSION['new_login_id'];

         $select = mysqli_query($connection, "SELECT * FROM `admin` WHERE `id`='$id'");

         if ($select) {
                  if (mysqli_num_rows($select)) {
                           $row = mysqli_fetch_assoc($select);
                           $name = $row['name'];
                           $email = $row['email'];
                           $password = $row['password'];
                  }
         }
}


$clients = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `clients`"));
$pending_transfer = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `transfer` WHERE `status`=0"));
$accepted_transfer = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `transfer` WHERE `status`=1"));
$declined_transfer = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `transfer` WHERE `status`!=1 AND `status`!=0"));



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
                  <?php include('../../layout/admin/sidenav.php') ?>
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
                                             <!-- Card stats -->
                                             <div class="row g-6 mb-6">
                                                      <div class="col-xl-3 col-sm-6 col-12">
                                                               <div class="card">
                                                                        <div class="card-body">
                                                                                 <div class="row">
                                                                                          <div class="col">
                                                                                                   <span class="h6 font-semibold text-muted text-sm d-block mb-2">Clients</span>
                                                                                                   <span class="h3 font-bold mb-0"><?php echo $clients ?></span>
                                                                                          </div>
                                                                                          <div class="col-auto">
                                                                                                   <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                                                                                            <i class="bi bi-people"></i>
                                                                                                   </div>
                                                                                          </div>
                                                                                 </div>

                                                                        </div>
                                                               </div>
                                                      </div>
                                                      <div class="col-xl-3 col-sm-6 col-12">
                                                               <div class="card">
                                                                        <div class="card-body">
                                                                                 <div class="row">
                                                                                          <div class="col">
                                                                                                   <span class="h6 font-semibold text-muted text-sm d-block mb-2">Pending transfer</span>
                                                                                                   <span class="h3 font-bold mb-0"><?php echo $pending_transfer ?></span>
                                                                                          </div>
                                                                                          <div class="col-auto">
                                                                                                   <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">

                                                                                                            <i class="bi bi-credit-card"></i>
                                                                                                   </div>
                                                                                          </div>
                                                                                 </div>

                                                                        </div>
                                                               </div>
                                                      </div>
                                                      <div class="col-xl-3 col-sm-6 col-12">
                                                               <div class="card">
                                                                        <div class="card-body">
                                                                                 <div class="row">
                                                                                          <div class="col">
                                                                                                   <span class="h6 font-semibold text-muted text-sm d-block mb-2">Active transfer</span>
                                                                                                   <span class="h3 font-bold mb-0"><?php echo $accepted_transfer ?></span>
                                                                                          </div>
                                                                                          <div class="col-auto">
                                                                                                   <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                                                                                            <i class="bi bi-clock-history"></i>
                                                                                                   </div>
                                                                                          </div>
                                                                                 </div>

                                                                        </div>
                                                               </div>
                                                      </div>
                                                      <div class="col-xl-3 col-sm-6 col-12">
                                                               <div class="card">
                                                                        <div class="card-body">
                                                                                 <div class="row">
                                                                                          <div class="col">
                                                                                                   <span class="h6 font-semibold text-muted text-sm d-block mb-2">Declined transfer</span>
                                                                                                   <span class="h3 font-bold mb-0"><?php echo $declined_transfer ?></span>
                                                                                          </div>
                                                                                          <div class="col-auto">
                                                                                                   <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                                                                                            <i class="bi bi-minecart-loaded"></i>
                                                                                                   </div>
                                                                                          </div>
                                                                                 </div>

                                                                        </div>
                                                               </div>
                                                      </div>
                                             </div>
                                             <div class="card mb-7">
                                                      <div class="card-header">
                                                               <h5 class="mb-0">Applications</h5>
                                                      </div>
                                                      <div class="table-responsive">
                                                               <table class="table table-hover table-nowrap">
                                                                        <thead class="table-light">
                                                                                 <tr>
                                                                                          <th scope="col">Name</th>
                                                                                          <th scope="col">Date</th>
                                                                                          <th scope="col">Company</th>
                                                                                          <th scope="col">Offer</th>
                                                                                          <th scope="col">Meeting</th>
                                                                                          <th></th>
                                                                                 </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                                 <tr>
                                                                                          <td>
                                                                                                   <img alt="..." src="https://images.unsplash.com/photo-1502823403499-6ccfcf4fb453?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                                                                                   <a class="text-heading font-semibold" href="#">
                                                                                                            Robert Fox
                                                                                                   </a>
                                                                                          </td>
                                                                                          <td>
                                                                                                   Feb 15, 2021
                                                                                          </td>
                                                                                          <td>
                                                                                                   <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-1.png" class="avatar avatar-xs rounded-circle me-2">
                                                                                                   <a class="text-heading font-semibold" href="#">
                                                                                                            Dribbble
                                                                                                   </a>
                                                                                          </td>
                                                                                          <td>
                                                                                                   $3.500
                                                                                          </td>
                                                                                          <td>
                                                                                                   <span class="badge badge-lg badge-dot">
                                                                                                            <i class="bg-success"></i>Scheduled
                                                                                                   </span>
                                                                                          </td>
                                                                                          <td class="text-end">
                                                                                                   <a href="#" class="btn btn-sm btn-neutral">View</a>
                                                                                                   <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                                                                                            <i class="bi bi-trash"></i>
                                                                                                   </button>
                                                                                          </td>
                                                                                 </tr>
                                                                                 <tr>
                                                                                          <td>
                                                                                                   <img alt="..." src="https://images.unsplash.com/photo-1610271340738-726e199f0258?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                                                                                   <a class="text-heading font-semibold" href="#">
                                                                                                            Darlene Robertson
                                                                                                   </a>
                                                                                          </td>
                                                                                          <td>
                                                                                                   Apr 15, 2021
                                                                                          </td>
                                                                                          <td>
                                                                                                   <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-2.png" class="avatar avatar-xs rounded-circle me-2">
                                                                                                   <a class="text-heading font-semibold" href="#">
                                                                                                            Netguru
                                                                                                   </a>
                                                                                          </td>
                                                                                          <td>
                                                                                                   $2.750
                                                                                          </td>
                                                                                          <td>
                                                                                                   <span class="badge badge-lg badge-dot">
                                                                                                            <i class="bg-warning"></i>Postponed
                                                                                                   </span>
                                                                                          </td>
                                                                                          <td class="text-end">
                                                                                                   <a href="#" class="btn btn-sm btn-neutral">View</a>
                                                                                                   <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                                                                                            <i class="bi bi-trash"></i>
                                                                                                   </button>
                                                                                          </td>
                                                                                 </tr>
                                                                                 <tr>
                                                                                          <td>
                                                                                                   <img alt="..." src="https://images.unsplash.com/photo-1610878722345-79c5eaf6a48c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                                                                                   <a class="text-heading font-semibold" href="#">
                                                                                                            Theresa Webb
                                                                                                   </a>
                                                                                          </td>
                                                                                          <td>
                                                                                                   Mar 20, 2021
                                                                                          </td>
                                                                                          <td>
                                                                                                   <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-3.png" class="avatar avatar-xs rounded-circle me-2">
                                                                                                   <a class="text-heading font-semibold" href="#">
                                                                                                            Figma
                                                                                                   </a>
                                                                                          </td>
                                                                                          <td>
                                                                                                   $4.200
                                                                                          </td>
                                                                                          <td>
                                                                                                   <span class="badge badge-lg badge-dot">
                                                                                                            <i class="bg-success"></i>Scheduled
                                                                                                   </span>
                                                                                          </td>
                                                                                          <td class="text-end">
                                                                                                   <a href="#" class="btn btn-sm btn-neutral">View</a>
                                                                                                   <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                                                                                            <i class="bi bi-trash"></i>
                                                                                                   </button>
                                                                                          </td>
                                                                                 </tr>
                                                                                 <tr>
                                                                                          <td>
                                                                                                   <img alt="..." src="https://images.unsplash.com/photo-1612422656768-d5e4ec31fac0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                                                                                   <a class="text-heading font-semibold" href="#">
                                                                                                            Kristin Watson
                                                                                                   </a>
                                                                                          </td>
                                                                                          <td>
                                                                                                   Feb 15, 2021
                                                                                          </td>
                                                                                          <td>
                                                                                                   <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-4.png" class="avatar avatar-xs rounded-circle me-2">
                                                                                                   <a class="text-heading font-semibold" href="#">
                                                                                                            Mailchimp
                                                                                                   </a>
                                                                                          </td>
                                                                                          <td>
                                                                                                   $3.500
                                                                                          </td>
                                                                                          <td>
                                                                                                   <span class="badge badge-lg badge-dot">
                                                                                                            <i class="bg-dark"></i>Not discussed
                                                                                                   </span>
                                                                                          </td>
                                                                                          <td class="text-end">
                                                                                                   <a href="#" class="btn btn-sm btn-neutral">View</a>
                                                                                                   <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                                                                                            <i class="bi bi-trash"></i>
                                                                                                   </button>
                                                                                          </td>
                                                                                 </tr>
                                                                                 <tr>
                                                                                          <td>
                                                                                                   <img alt="..." src="https://images.unsplash.com/photo-1608976328267-e673d3ec06ce?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                                                                                   <a class="text-heading font-semibold" href="#">
                                                                                                            Cody Fisher
                                                                                                   </a>
                                                                                          </td>
                                                                                          <td>
                                                                                                   Apr 10, 2021
                                                                                          </td>
                                                                                          <td>
                                                                                                   <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-5.png" class="avatar avatar-xs rounded-circle me-2">
                                                                                                   <a class="text-heading font-semibold" href="#">
                                                                                                            Webpixels
                                                                                                   </a>
                                                                                          </td>
                                                                                          <td>
                                                                                                   $1.500
                                                                                          </td>
                                                                                          <td>
                                                                                                   <span class="badge badge-lg badge-dot">
                                                                                                            <i class="bg-danger"></i>Canceled
                                                                                                   </span>
                                                                                          </td>
                                                                                          <td class="text-end">
                                                                                                   <a href="#" class="btn btn-sm btn-neutral">View</a>
                                                                                                   <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                                                                                            <i class="bi bi-trash"></i>
                                                                                                   </button>
                                                                                          </td>
                                                                                 </tr>
                                                                                 <tr>
                                                                                          <td>
                                                                                                   <img alt="..." src="https://images.unsplash.com/photo-1502823403499-6ccfcf4fb453?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                                                                                   <a class="text-heading font-semibold" href="#">
                                                                                                            Robert Fox
                                                                                                   </a>
                                                                                          </td>
                                                                                          <td>
                                                                                                   Feb 15, 2021
                                                                                          </td>
                                                                                          <td>
                                                                                                   <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-1.png" class="avatar avatar-xs rounded-circle me-2">
                                                                                                   <a class="text-heading font-semibold" href="#">
                                                                                                            Dribbble
                                                                                                   </a>
                                                                                          </td>
                                                                                          <td>
                                                                                                   $3.500
                                                                                          </td>
                                                                                          <td>
                                                                                                   <span class="badge badge-lg badge-dot">
                                                                                                            <i class="bg-success"></i>Scheduled
                                                                                                   </span>
                                                                                          </td>
                                                                                          <td class="text-end">
                                                                                                   <a href="#" class="btn btn-sm btn-neutral">View</a>
                                                                                                   <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                                                                                            <i class="bi bi-trash"></i>
                                                                                                   </button>
                                                                                          </td>
                                                                                 </tr>
                                                                                 <tr>
                                                                                          <td>
                                                                                                   <img alt="..." src="https://images.unsplash.com/photo-1610271340738-726e199f0258?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                                                                                   <a class="text-heading font-semibold" href="#">
                                                                                                            Darlene Robertson
                                                                                                   </a>
                                                                                          </td>
                                                                                          <td>
                                                                                                   Apr 15, 2021
                                                                                          </td>
                                                                                          <td>
                                                                                                   <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-2.png" class="avatar avatar-xs rounded-circle me-2">
                                                                                                   <a class="text-heading font-semibold" href="#">
                                                                                                            Netguru
                                                                                                   </a>
                                                                                          </td>
                                                                                          <td>
                                                                                                   $2.750
                                                                                          </td>
                                                                                          <td>
                                                                                                   <span class="badge badge-lg badge-dot">
                                                                                                            <i class="bg-warning"></i>Postponed
                                                                                                   </span>
                                                                                          </td>
                                                                                          <td class="text-end">
                                                                                                   <a href="#" class="btn btn-sm btn-neutral">View</a>
                                                                                                   <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                                                                                            <i class="bi bi-trash"></i>
                                                                                                   </button>
                                                                                          </td>
                                                                                 </tr>
                                                                                 <tr>
                                                                                          <td>
                                                                                                   <img alt="..." src="https://images.unsplash.com/photo-1610878722345-79c5eaf6a48c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                                                                                   <a class="text-heading font-semibold" href="#">
                                                                                                            Theresa Webb
                                                                                                   </a>
                                                                                          </td>
                                                                                          <td>
                                                                                                   Mar 20, 2021
                                                                                          </td>
                                                                                          <td>
                                                                                                   <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-3.png" class="avatar avatar-xs rounded-circle me-2">
                                                                                                   <a class="text-heading font-semibold" href="#">
                                                                                                            Figma
                                                                                                   </a>
                                                                                          </td>
                                                                                          <td>
                                                                                                   $4.200
                                                                                          </td>
                                                                                          <td>
                                                                                                   <span class="badge badge-lg badge-dot">
                                                                                                            <i class="bg-success"></i>Scheduled
                                                                                                   </span>
                                                                                          </td>
                                                                                          <td class="text-end">
                                                                                                   <a href="#" class="btn btn-sm btn-neutral">View</a>
                                                                                                   <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                                                                                            <i class="bi bi-trash"></i>
                                                                                                   </button>
                                                                                          </td>
                                                                                 </tr>
                                                                                 <tr>
                                                                                          <td>
                                                                                                   <img alt="..." src="https://images.unsplash.com/photo-1612422656768-d5e4ec31fac0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                                                                                   <a class="text-heading font-semibold" href="#">
                                                                                                            Kristin Watson
                                                                                                   </a>
                                                                                          </td>
                                                                                          <td>
                                                                                                   Feb 15, 2021
                                                                                          </td>
                                                                                          <td>
                                                                                                   <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-4.png" class="avatar avatar-xs rounded-circle me-2">
                                                                                                   <a class="text-heading font-semibold" href="#">
                                                                                                            Mailchimp
                                                                                                   </a>
                                                                                          </td>
                                                                                          <td>
                                                                                                   $3.500
                                                                                          </td>
                                                                                          <td>
                                                                                                   <span class="badge badge-lg badge-dot">
                                                                                                            <i class="bg-dark"></i>Not discussed
                                                                                                   </span>
                                                                                          </td>
                                                                                          <td class="text-end">
                                                                                                   <a href="#" class="btn btn-sm btn-neutral">View</a>
                                                                                                   <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                                                                                            <i class="bi bi-trash"></i>
                                                                                                   </button>
                                                                                          </td>
                                                                                 </tr>
                                                                                 <tr>
                                                                                          <td>
                                                                                                   <img alt="..." src="https://images.unsplash.com/photo-1608976328267-e673d3ec06ce?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                                                                                   <a class="text-heading font-semibold" href="#">
                                                                                                            Cody Fisher
                                                                                                   </a>
                                                                                          </td>
                                                                                          <td>
                                                                                                   Apr 10, 2021
                                                                                          </td>
                                                                                          <td>
                                                                                                   <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-5.png" class="avatar avatar-xs rounded-circle me-2">
                                                                                                   <a class="text-heading font-semibold" href="#">
                                                                                                            Webpixels
                                                                                                   </a>
                                                                                          </td>
                                                                                          <td>
                                                                                                   $1.500
                                                                                          </td>
                                                                                          <td>
                                                                                                   <span class="badge badge-lg badge-dot">
                                                                                                            <i class="bg-danger"></i>Canceled
                                                                                                   </span>
                                                                                          </td>
                                                                                          <td class="text-end">
                                                                                                   <a href="#" class="btn btn-sm btn-neutral">View</a>
                                                                                                   <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                                                                                            <i class="bi bi-trash"></i>
                                                                                                   </button>
                                                                                          </td>
                                                                                 </tr>
                                                                        </tbody>
                                                               </table>
                                                      </div>
                                                      <div class="card-footer border-0 py-5">
                                                               <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
                                                      </div>
                                             </div>
                                    </div>
                           </main>
                  </div>
         </div>
</body>

</html>