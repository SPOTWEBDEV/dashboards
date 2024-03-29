<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 " aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-white ">
      <ul class="space-y-2 font-medium">
         <li>
            <a href="<?= $domain ?>user/dashboard/" class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100  group">
               <img width="27" height="27" src="https://img.icons8.com/ios-filled/50/health-data.png" alt="health-data" />
               <span class="flex-1 ms-3 whitespace-nowrap text-xl">Dashboard</span>
            </a>
         </li>
         <li>
            <a href="<?= $domain ?>user/profile/" class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100  group">
               <img width="27" height="27" src="https://img.icons8.com/ios-filled/50/user.png" alt="user" />
               <span class="flex-1 ms-3 whitespace-nowrap text-xl">Profile</span>
            </a>
         </li>
         <li>
            <a href="<?= $domain ?>user/setting/update/password/" class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100  group">
               <img width="27" height="27" src="https://img.icons8.com/ios-filled/50/settings.png" alt="settings" />
               <span class="flex-1 ms-3 whitespace-nowrap text-xl">Change password</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100 group">
               <img width="27" height="27" src="https://img.icons8.com/ios-filled/50/phonelink-lock.png" alt="phonelink-lock" />
               <span class="fflex-1 ms-3 whitespace-nowrap text-xl">Register verify app</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100  group">
               <img width="27" height="27" src="https://img.icons8.com/ios-filled/50/phonelink-erase.png" alt="phonelink-erase" />
               <span class="flex-1 ms-3 whitespace-nowrap text-xl">Reset verify app</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg  group">
               <img width="27" height="27" src="https://img.icons8.com/android/24/alarm-clock.png" alt="alarm-clock" />
               <span class="flex-1 ms-3 whitespace-nowrap text-xl">OTP Preference</span>
            </a>
         </li>
         <li>
            <a href="<?php echo $domain ?>user/transfer" class="flex items-center p-2 text-gray-900 rounded-lg ">
               <img width="27" height="27" src="https://img.icons8.com/android/24/money.png" alt="money" />
               <span class="flex-1 ms-3 whitespace-nowrap text-xl">Transfer</span>
            </a>
         </li>
         <li>
            <a href="<?php echo $domain ?>user/logout/" class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100  group" id="links_stuff">
               <img width="27" height="27" src="https://img.icons8.com/material-outlined/24/exit.png" alt="exit" />
               <span class="flex-1 ms-3 whitespace-nowrap text-xl">Logout</span>
            </a>
         </li>
      </ul>
   </div>
</aside>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>