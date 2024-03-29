<?php

include('../../server/database.php');
include('../../server/config.php');
include('../../server/clients/authorization/index.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
       <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
       <script src="https://cdn.tailwindcss.com"></script>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> -->
       <link rel="stylesheet" href="../../assets/css/main.css">
</head>

<body>
       <style>
              * {
                     margin: 0;
                     padding: 0;
                     box-sizing: border-box;
              }

              section nav {
                     width: 300px;
              }

              /* section nav.active {
                     display: flex;
              } */

              section main {
                     width: calc(100% - 300px);
              }

              @media(max-width:770px) {
                     section main {
                            width: 100%;
                     }

              }
       </style>
       <?php include('../../layout/clients/nav.php ')  ?>
       <section class="flex w-full ">
              <?php include('../../layout/clients/sidenav.php')  ?>
              <main class="absolute right-0 ">
                     <header class="w-full flex flex-col gap-y-6 sm:flex-row items-center capitalize justify-between py-12 bg-white px-6 border-b-gray">
                            <h1 class="text-lg sm:text-2xl">financial Overview</h1>

                            <div class="btn flex gap-x-3">
                                   <button class="text-white background border-gray-600 rounded-lg py-2 px-3"> <i class="bi bi-wallet"></i> Add Deposit</button>
                                   <button class="text-white credit-card border-gray-600 rounded-lg py-2 px-3"> <i class="bi bi-send-exclamation text-white"></i> Make Transfer</button>
                            </div>
                     </header>
                     <section class="flex flex-col  lg:flex-row gap-x-6 gap-y-6  px-6 w-full py-2">
                            <div class="w-full lg:w-1/2">
                                   <div class="flex flex-col gap-y-6 sm:flex-row gap-x-4">
                                          <div class="h-fit flex flex-col py-4 w-full sm:w-[200px] ">
                                                 <p class="capitalize tracking-wide">total balance</p>
                                                 <span class="text-3xl tracking-wide">$<?php echo number_format($balance, 2, '.', ',')  ?></span>
                                                 <a href="" class="tracking-wide capitalize">view Statement <i class="bi bi-arrow-right-short"></i></a>
                                          </div>
                                          <div class="h-fit flex flex-col text-semibold py-4 w-full sm:w-[200px] ">
                                                 <p class="capitalize tracking-wide">Available balance</p>
                                                 <span class="text-3xl tracking-wide">$<?php echo number_format($balance, 2, '.', ',') ?></span>
                                                 <a class="capitalize tracking-wide" href="">Transfer Funds <i class="bi bi-arrow-right-short"></i></a>
                                          </div>
                                   </div>
                                   <div class="credit-card capitalize text-white w-full sm:w-[350px] bg-red-700 rounded py-2">

                                          <div class="flex items-center justify-between px-6">
                                                 <div>
                                                        <img src="" alt="">
                                                        <p></p>
                                                 </div>
                                                 <span class="text-xl text-semibold">$<?php echo number_format($balance, 2, '.', ',')  ?></span>
                                          </div>
                                          <div class="w-full mt-3  flex items-center justify-center">
                                                 <p class="bold text-lg"><?php echo $account_number ?></p>
                                          </div>
                                          <div class="mt-5 flex items-center justify-between px-6">
                                                 <div>
                                                        <p>account holder</p>
                                                        <p class="text-bold bold"><?php echo $fullname ?></p>
                                                 </div>
                                                 <div>
                                                        <p>Expires</p>
                                                        <p class="text-bold bold"><?php echo $expiry_date ?></p>
                                                 </div>
                                          </div>
                                   </div>
                            </div>
                            <aside class="w-full lg:w-1/2">
                                   <div class="w-full  p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8">
                                          <div class="flex items-center justify-between mb-4">
                                                 <h5 class="text-xl font-bold leading-none text-gray-900 ">Account Details
                                                 </h5>

                                          </div>
                                          <div class="flow-root">
                                                 <ul role="list" class="divide-y divide-gray-200 ">
                                                        <li class="py-3 sm:py-4">
                                                               <div class="flex items-center">

                                                                      <div class="flex-1 min-w-0 ms-4">
                                                                             <p class="text-sm font-medium text-gray-900 truncate ">
                                                                                    Account Name
                                                                             </p>

                                                                      </div>
                                                                      <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                                                                             <?php echo $fullname ?>
                                                                      </div>
                                                               </div>
                                                        </li>
                                                        <li class="py-3 sm:py-4">
                                                               <div class="flex items-center ">

                                                                      <div class="flex-1 min-w-0 ms-4">
                                                                             <p class="text-sm font-medium text-gray-900 truncate ">
                                                                                    Account Number
                                                                             </p>

                                                                      </div>
                                                                      <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                                                                             <?php echo $account_number ?>
                                                                      </div>
                                                               </div>
                                                        </li>
                                                        <li class="py-3 sm:py-4">
                                                               <div class="flex items-center">

                                                                      <div class="flex-1 min-w-0 ms-4">
                                                                             <p class="text-sm font-medium text-gray-900 truncate ">
                                                                                    Account Type
                                                                             </p>

                                                                      </div>
                                                                      <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                                                                             <?php echo $account_type ?>
                                                                      </div>
                                                               </div>
                                                        </li>
                                                        <li class="py-3 sm:py-4">
                                                               <div class="flex items-center ">

                                                                      <div class="flex-1 min-w-0 ms-4">
                                                                             <p class="text-sm font-medium text-gray-900 truncate ">
                                                                                    Balance
                                                                             </p>

                                                                      </div>
                                                                      <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                                                                             $<?php echo number_format($balance, 2, '.', ',')  ?>
                                                                      </div>
                                                               </div>
                                                        </li>
                                                        <li class="pt-3 pb-0 sm:pt-4">
                                                               <div class="flex items-center ">

                                                                      <div class="flex-1 min-w-0 ms-4">
                                                                             <p class="text-sm font-medium text-gray-900 truncate ">
                                                                                    Swift code
                                                                             </p>

                                                                      </div>
                                                                      <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                                                                             <?php echo $swift_code ?>
                                                                      </div>
                                                               </div>
                                                        </li>
                                                 </ul>
                                          </div>
                                   </div>

                            </aside>
                     </section>
                     <section class="w-full px-6 flex flex-col gap-y-4 py-4 mt-2">
                            <p>Transaction Table</p>
                            <div class="relative overflow-x-auto ">
                                   <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white ">
                                          <div>
                                                 <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 " type="button">
                                                        <span class="sr-only">Action button</span>
                                                        Action
                                                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                                        </svg>
                                                 </button>
                                                 <!-- Dropdown menu -->
                                                 <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                                                        <ul class="py-1 text-sm text-gray-700 " aria-labelledby="dropdownActionButton">
                                                               <li>
                                                                      <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Reward</a>
                                                               </li>
                                                               <li>
                                                                      <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Promote</a>
                                                               </li>
                                                               <li>
                                                                      <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Activate
                                                                             account</a>
                                                               </li>
                                                        </ul>
                                                        <div class="py-1">
                                                               <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Delete
                                                                      User</a>
                                                        </div>
                                                 </div>
                                          </div>
                                          <label for="table-search" class="sr-only">Search</label>
                                          <div class="relative">
                                                 <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                                        <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                                        </svg>
                                                 </div>
                                                 <input type="text" id="simple-search" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Search for users">
                                          </div>
                                   </div>
                                   <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                                          <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                                 <tr class="uppercase">
                                                        <th scope="col" class="p-4">
                                                               Transaction ID
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                               Beneficiary
                                                        </th>

                                                        <th scope="col" class="px-6 py-3">
                                                               amount
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                               Message
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                               Status
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                               Date
                                                        </th>
                                                 </tr>
                                          </thead>
                                          <tbody>


                                          </tbody>
                                   </table>
                            </div>

                     </section>
              </main>
       </section>


       <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

       <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->

       <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
       <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script> -->
       <script>
              var Tawk_API = Tawk_API || {},
                     Tawk_LoadStart = new Date();
              (function() {
                     var s1 = document.createElement("script"),
                            s0 = document.getElementsByTagName("script")[0];
                     s1.async = true;
                     s1.src = 'https://embed.tawk.to/659dc8678d261e1b5f5148d9/1hjo5dleq';
                     s1.charset = 'UTF-8';
                     s1.setAttribute('crossorigin', '*');
                     s0.parentNode.insertBefore(s1, s0);
              })();
       </script>
       <script>
              $(() => {

                     $.ajax({
                            url: "<?= $domain ?>server/clients/apis/getTransaction.php",
                            method: "GET",
                            data: {
                                   from: window.location.href
                            },
                            success(respone) {


                                   const data = JSON.parse('[' + respone.trim().replace(/}{/g, '},{') + ']');



                                   loadTable(data)

                                   document.querySelector("#simple-search").addEventListener('keyup', (event) => {
                                          const newdata = data.filter(str => str.account_name.includes(event.target.value) || str.account_number.includes(event.target.value));



                                          loadTable(newdata)
                                   })
                            },
                            error(error) {
                                   console.log(error);
                            }
                     })
              })

              function loadTable(data) {
                     document.querySelector('tbody').innerHTML = ''
                     if (data.length > 0) {
                            for (var i = 0; i < data.length; i++) {


                                   let status = '';
                                   if (data[i].status == 0) {
                                          status = "Pending..";
                                          statusmsg = "OTP Not Verifed";
                                   } else if (data[i].status == 1) {
                                          status = "Processing";
                                          statusmsg = "Transaction Processing..";
                                   } else if (data[i].status == 3) {
                                          status = "Declined";
                                          statusmsg = "Transaction Declined";
                                   } else if (data[i].status == 4) {
                                          status = "Approved";
                                          statusmsg = "Transaction Approved";
                                   }


                                   const html = ` <tr class="bg-white border-b  hover:bg-gray-50 ">
                                                <td class="w-4 p-4">
                                                               ${data[i].transaction_unique_code}
                                                        </td>
                                                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap ">
                                                               
                                                               <div class="ps-3">
                                                                      <div class="text-base font-semibold">${data[i].account_name}</div>
                                                                      <div class="font-normal text-gray-500">${data[i].account_number}
                                                                      </div>
                                                               </div>
                                                        </th>
                                                        <td class="px-6 py-4">
                                                               $${data[i].amount}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                               ${statusmsg}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                               <div class="flex items-center">
                                                                      <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div>
                                                                      ${status}
                                                               </div>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                               <a href="#" class="font-medium text-blue-600  hover:underline">${data[i].date}
                                                                      </a>
                                                        </td>
                                                        
                                            </tr>`;
                                   document.querySelector('tbody').insertAdjacentHTML("beforeend", html)
                            }
                     }
              }
       </script>

       <script>
              let client_nav = document.querySelector('#client-nav');
              let nav = document.querySelector('#click-client-nav');
              console.log(nav);
              nav.onclick = function() {

                     if (!client_nav.classList.contains('active')) {
                            client_nav.classList.remove('hidden')
                            client_nav.classList.add('active')
                     } else {
                            client_nav.classList.add('hidden')
                            client_nav.classList.remove('active')
                     }

                     
              }
       </script>
</body>

</html>