 <div class="lg:w-[17%] h-screen rounded-r-[6px] hidden bg-sidenavbg lg:flex items-center p-1 flex-col">
     <a href="" class="btn btn-ghost text-xl text-center mt-3 text-white font-semibold font-popin">
         <i class='bx bx-recycle bx-flashing text-[27px]' style='color:#ffffff'></i>E-WASTE<i class='bx bx-recycle bx-flashing text-[27px]' style='color:#ffffff'></i>
     </a>
     <ul class="menu menu-sm w-full flex flex-col mt-9">
         <li>
             <a href="adminDashboard.php" id="btncstm1" class="mt-2 text-xs justify-start flex btn-sm btn-active btn-neutral rounded-md font-semibold font-popin">
                 <i data-lucide="candlestick-chart" class="mr-5 w-5 h-5"></i>
                 Home
             </a>
         </li>

         <li>
             <span class="menu-dropdown-toggle btn-sm bg-white text-xs justify-start flex rounded-md mt-2 font-semibold font-popin ">
                 <i class='bx bx-recycle text-[20px] mr-5'></i>
                 <span class="mr-5">E-waste </span>
             </span>

             <ul class="menu-dropdown">
                 <li class="mt-2">
                     <a href="donations.php" id="btncstm2" class="justify-start font-popin text-xs">
                         <i class='bx bx-category-alt mr-5 font-bold text-lg'></i>
                         Categories</a>
                 </li>
                 <li class="mt-2">
                     <a id="btnAddItem" class="rounded-md justify-start text-xs font-popin" onclick="addItemModal.showModal()">
                         <i class='bx bx-list-plus mr-5 font-bold text-lg'></i>
                         Add Items</a>
                 </li>
             </ul>
         </li>

         <li>
             <span class="menu-dropdown-toggle btn-sm flex bg-white text-xs justify-start mt-2 font-semibold font-popin ">
                 <i class='bx bx-gift text-[20px] mr-5'></i>
                 <span class="mr-5">Rewards </span>
             </span>
             <ul class="menu-dropdown">
                 <li class="mt-2">
                     <a href="redemption.php" id="btncstm2" class="justify-start text-xs font-popin">
                         <i class='bx bx-category-alt mr-5 font-bold text-lg'></i>
                         Redemption items</a>
                 </li>
                 <li class="">
                     <a id="btnAddItem" class="justify-start text-xs font-popin" onclick="addItemModal.showModal()">
                         <i class='bx bx-gift mr-5 font-bold text-lg'></i>
                         Add Items</a>
                 </li>
             </ul>
         </li>

     </ul>
 </div>