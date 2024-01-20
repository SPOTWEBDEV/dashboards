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
} else {
    header('location: ../login/');
}

if (isset($_GET['id']) && isset($_GET['user_id']) && isset($_GET['loan'])) {
    $id = $_GET['id'];
    $user_id = $_GET['user_id'];
    $loan = $_GET['loan'];


    $fetch = mysqli_query($connection, "SELECT `balance` FROM `clients` WHERE `id`='$user_id'");
    if (mysqli_num_rows($fetch)) {
        while ($row = mysqli_fetch_assoc($fetch)) {
            $balance = $row['balance'];
        }
        $sum = $balance + $loan;
        $credit = mysqli_query($connection, "UPDATE `clients` SET `balance`='$sum' WHERE `id`='$user_id'");
        if ($credit) {
            $query = mysqli_query($connection, "UPDATE `transfer` SET `status`=4 WHERE `id`='$id'");
            if ($query) {
                header('location: ./index.php');
            }
        }
    }
}

// if (isset($_GET['pending'])) {
//     $pending  = $_GET['pending'];


//     $statement = "UPDATE `loan` SET `status`=1 WHERE `id`='$pending'";
//     $query = mysqli_query($connection, $statement);

//     if ($query) {
//         header('location: ./index.php');
//     } else {
//         echo 'could not work';
//     }
// }

if (isset($_GET['decline'])) {
    $decline = $_GET['decline'];

    $statement = "UPDATE `loan` SET `status` = 2 WHERE `id`='$decline'";
    $update = mysqli_query($connection, $statement);

    if ($update) {
        header('location: ./index.php');
    } else {
        echo '<script>alert("not available")</script>';
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
                                <a href="<?php echo $domain ?>admin/loan/" class="nav-link active">Loan</a>
                            </li>
                            <li class="nav-item ">
                                <a href="<?php echo $domain ?>admin/loan/pending" class="nav-link font-regular">Pending Loan</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $domain ?>admin/loan/approved" class="nav-link font-regular">Approved loan</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $domain ?>admin/loan/declined" class="nav-link font-regular">Declined loan</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
            <!-- Main -->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <!-- Card stats -->
                    <div class="card mb-7">
                        <div class="card-header w-100 d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Request Loan</h5>

                            <div class=" mb-3 w-30">
                                <input type="text" class="form-control loan_inputs" id="floatingInput" placeholder="Search">

                            </div>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Payback</th>
                                        <th scope="col">Reason</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>


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


    <script>
        $(() => {
            $.ajax({
                url: '<?php echo $domain ?>' + 'server/admin/apis/getPendingLoan.php',
                method: "GET",
                data: {
                    from: window.location.href
                },
                success: function(respone) {
                    const data = JSON.parse('[' + respone.trim().replace(/}{/g, '},{') + ']');
                    loadTable(data)

                    document.querySelector(".loan_inputs").addEventListener('keyup', (event) => {
                        const newdata = data.filter(str => str.amount.includes(event.target.value) || str.reason.includes(event.target.value) || str.payback.includes(event.target.value));



                        loadTable(newdata)
                    })

                },
                error: function(error) {
                    console.log(error);
                }
            })
        })

        function loadTable(data) {
            document.querySelector('tbody').innerHTML = ''
            if (data.length > 0) {
                for (var i = 0; i < data.length; i++) {



                    const html = ` <tr class="bg-white border-b  hover:bg-gray-50 ">
                                                <td class="w-4 p-4">
                                                               ${i + 1}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                               ${data[i].amount}
                                                        </td>
                                                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap ">
                                                               
                                                               <div class="ps-3">
                                                                      
                                                                      <div class="font-normal text-gray-500">${data[i].payback}
                                                                      </div>
                                                               </div>
                                                        </th>
                                                        <td class="px-6 py-4">
                                                               ${data[i].reason}
                                                        </td>
                                                        
                                                        <td class="px-6 py-4">
                                                        <time class="timeago" datetime="${data[i].date}"></time>
                                                               
                                                        </td>
                                                        <td>

                                                    <a href="./index.php?id=${data[i].id}&user_id=${data[i].user_id}&loan=${data[i].loan}">
                                                        <button class="btn d-inline-flex btn-sm btn-primary mx-1" style="background: green; ">Approve</button>
                                                    </a>

                                                    <a href="./index.php?decline=${data[i].id}">
                                                        <button class="btn d-inline-flex btn-sm btn-primary mx-1" style="background: red; ">Decline</button>
                                                    </a>
                                                </td>

                                                        
                                            </tr>`;
                    document.querySelector('tbody').insertAdjacentHTML("beforeend", html)
                    jQuery(document).ready(function() {
                        jQuery("time.timeago").timeago();
                    });
                }
            }
        }
    </script>
</body>

</html>