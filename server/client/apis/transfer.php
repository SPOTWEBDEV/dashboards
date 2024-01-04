<?php

include('./dbconfig.php');

function generateRandomPIN()
{
         $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $pin = '';

         for ($i = 0; $i < 5; $i++) {
                  $randomIndex = rand(0, strlen($characters) - 1);
                  $pin .= $characters[$randomIndex];
         }

         return $pin;
}

$randomPIN = generateRandomPIN();




if (isset($_POST['from'])) {
         $allowedDomains = [
                  $domain . 'user/transfer/',
                  $domain . 'user/transfer/#',
                  $domain . 'user/transfer/index.php'
         ];
         if (in_array($_POST['from'], $allowedDomains)) {

                  if ($_POST['assign'] == 'insertTransfer') {
                           $id = $_POST['id'];
                           $account_number = $_POST['account_number'];
                           $account_name = $_POST['account_name'];
                           $amount = $_POST['amounts'];

                          
             


                           $inserted = mysqli_query($connection, "INSERT INTO `transfer_table`(`user`, `account_number`, `recipient_account_num`, `amount`, `opt`) VALUES ('$id','$account_number','$account_name','$amount','$randomPIN')");

                           if ($inserted) {
                                    echo $randomPIN;
                           }
                  }

                  if ($_POST['assign'] == 'optverification') {

                           $opt = $_POST['opt'];

                           $select_transfer_status = mysqli_query($connection, "SELECT `transfer_status`,`count` FROM `clients` WHERE `id`='$id'");
                           while ($row = mysqli_fetch_assoc($select_transfer_status)) {
                                    $transfer_status = $row['transfer_status'];
                                    $count = $row['count'];
                           }

                           if ($transfer_status == 1) {
                                    $select = mysqli_query($connection, "SELECT * FROM `transfer_table` WHERE `opt`='$opt'");
                                    if (mysqli_num_rows($select)) {
                                             $insert = mysqli_query($connection, "UPDATE `transfer_table` SET `opt_status`='1' WHERE `user`='$id'");
                                             echo "OPT_SUCCESSFULLY";
                                    } else {
                                             $count =  $count + 1;
                                             if ($count >= 3) {
                                                      echo "ACCOUNT_BANNER";
                                             } else {

                                                      $inserts = mysqli_query($connection, "UPDATE `clients` SET `count`='$count' WHERE `id`='$id'");
                                                      if ($inserts) {
                                                               echo "WRONG OPT";
                                                      }
                                             }
                                    }
                           } else {
                                    $count =  $count + 1;
                                    if ($count >= 3) {
                                             echo "ACCOUNT_BANNER";
                                    } else {

                                             $inserts = mysqli_query($connection, "UPDATE `clients` SET `count`='$count' WHERE `id`='$id'");
                                             if ($inserts) {
                                                      echo "WRONG OPT";
                                             }
                                    }
                           }
                  }
         }
}
