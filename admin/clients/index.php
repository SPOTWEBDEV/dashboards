<?php
include('../../server/database.php');
// include('../../server/admin/authorization/index.php');
?>
<!-- <a href="../../server/"></a> -->



<!DOCTYPE html>
<html lang="en">

<head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Document</title>
         <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
         <script src="https://cdn.tailwindcss.com"></script>
         <link rel="preconnect" href="https://fonts.googleapis.com">
         <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
         <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300&display=swap" rel="stylesheet">
</head>

<body>
         <div class="antialiased bg-gray-50 dark:bg-gray-900">
                  <?php include('../../layout/admin/navbar.php')  ?>

                  <!-- Sidebar -->

                  <?php include('../../layout/admin/sidenav.php')  ?>
                  <!-- <a href="../../"></a> -->

                  <main class="p-4 md:ml-64 h-auto pt-20">

                           <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-fit mb-4">


                                    <div class="relative overflow-x-auto">

                                             <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
                                                      <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                                                               <!-- Start coding here -->
                                                               <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                                                                        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                                                                                 <div class="w-full md:w-1/2">
                                                                                          <form class="flex items-center">
                                                                                                   <label for="simple-search" class="sr-only">Search</label>
                                                                                                   <div class="relative w-full">
                                                                                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                                                                                     <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                                                                              <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                                                                                                     </svg>
                                                                                                            </div>
                                                                                                            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                                                                                                   </div>
                                                                                          </form>
                                                                                 </div>
                                                                                 <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                                                                          <button type="button" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                                                                                   <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                                                                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                                                                                   </svg>
                                                                                                   Add product
                                                                                          </button>

                                                                                 </div>
                                                                        </div>
                                                                        <div class="overflow-x-auto">
                                                                                 <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                                                          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                                                                   <tr>
                                                                                                            <th scope="col" class="px-4 py-3">#</th>
                                                                                                            <th scope="col" class="px-4 py-3">Name</th>
                                                                                                            <th scope="col" class="px-4 py-3">Email</th>
                                                                                                            <th scope="col" class="px-4 py-3">
                                                                                                                     <span class="">Actions</span>
                                                                                                            </th>
                                                                                                   </tr>
                                                                                          </thead>
                                                                                          <tbody>


                                                                                          </tbody>
                                                                                 </table>
                                                                        </div>
                                                                        <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                                                                                 <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                                                                          Showing
                                                                                          <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                                                                                          of
                                                                                          <span class="font-semibold text-gray-900 dark:text-white">1000</span>
                                                                                 </span>
                                                                                 <ul id="paginationContainer " class="inline-flex items-stretch -space-x-px">
                                                                                          <li class="prevButton">
                                                                                                   <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                                                                            <span class="sr-only">Previous</span>
                                                                                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                                                                     <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                                                                            </svg>
                                                                                                   </a>
                                                                                          </li>

                                                                                          <div class="pagination-list flex items-center">

                                                                                          </div>


                                                                                          <li class="nextButton">
                                                                                                   <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                                                                            <span class="sr-only">Next</span>
                                                                                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                                                                     <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                                                                                            </svg>
                                                                                                   </a>
                                                                                          </li>
                                                                                 </ul>
                                                                        </nav>
                                                               </div>
                                                      </div>
                                             </section>
                                    </div>


                           </div>


                  </main>
         </div>

         <script>
                  $(() => {

                           $.ajax({
                                    url: "<?= $domain ?>/server/admin/api/getAllUser.php",
                                    method: "GET",
                                    data: {
                                             from: window.location.href
                                    },
                                    success(respone) {
                                             console.log(respone);

                                             const data = JSON.parse('[' + respone.trim().replace(/}{/g, '},{') + ']');
                                             console.log(data);
                                             loadTable(data)

                                             document.querySelector("#simple-search").addEventListener('keyup', (event) => {
                                                      const newdata = data.filter(str => str.name.includes(event.target.value) || str.email.includes(event.target.value));

                                                      console.log(newdata);

                                                      loadTable(newdata)
                                             })
                                    },
                                    error(error) {
                                             console.log(error);
                                    }
                           })
                  })


                  let currentPage = 1;


                  // const paginationContainer = document.querySelector('#pagination');
                  const pagination = document.querySelector('.pagination-list')

                  function loadTable(data) {
                           const itemsPerPage = 5;
                           const startIndex = (currentPage - 1) * itemsPerPage;
                           const endIndex = startIndex + itemsPerPage;
                           const paginatedData = data.slice(startIndex, endIndex);
                           document.querySelector('tbody').innerHTML = '';
                           paginatedData.forEach((data, index) => {

                                    const html = ` <tr class="border-b dark:border-gray-700">
                                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">${index + 1}</th>
                                                <td class="px-4 py-3">${data.name}</td>
                                                <td class="px-4 py-3">${data.email}</td>
                                                <td class="px-4 py-3"><button class="border-2 py-2 px-4 ">Delete</button></td>
                                            </tr>`;
                                    document.querySelector('tbody').insertAdjacentHTML("beforeend", html)
                           });

                           function updatePagination() {
                                    pagination.innerHTML = '';
                                    const totalPages = Math.ceil(data.length / itemsPerPage);
                                    console.log(totalPages);
                                    // Clear previous pagination controls

                                    for (let i = 1; i <= totalPages; i++) {
                                             const link = `<li>
                                                <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">${i}</a>
                                            </li>`;

                                             pagination.insertAdjacentHTML("beforeend", link);

                                    }
                                    document.querySelector('.prevButton').addEventListener('click', function() {
                                             if (currentPage > 1) {
                                                      currentPage--;
                                                      loadTable();
                                                      updatePagination();
                                             }
                                    });
                                    document.querySelector('.nextButton').addEventListener('click', function() {
                                             if (currentPage < totalPages) {
                                                      currentPage++;
                                                      loadTable();
                                                      updatePagination();
                                             }
                                    });
                           }
                           updatePagination()






                  }
         </script>

</body>

</html>