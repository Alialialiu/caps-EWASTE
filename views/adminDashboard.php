<!-- 
==============================================================================
Filename:        caps-Ewaste
Author:          Aljon Santoluma
Githuub:         Alialialiu
Email:           santolumaaljon@gmail.com
Creation Date:   2024-05-15
Last Modified:   2024-06-22
Version:         1.0.0
==============================================================================
Description:
    This script manages the Tech Recycle Management system called "E-waste".
    Students can donate electronic waste, which is recycled. Each item donated
    is assigned redeemable points. These points can be used to redeem school 
    supplies. The script manages the points system, including the donation 
    of e-waste and the redemption of items based on points.

Functionalities:
    - Register new e-waste donations.
    - Assign points to donated items.
    - Manage student point balances.
    - Allow students to redeem school supplies with their points.
    - Track redemption history and inventory of redeemable items.

Dependencies:
    - jquery
     -jquery ui
    - tailwind
     - daisyui
    - animate.css
    - lucide icons

Usage:
    To run this script, execute:
        npm run tw

License:
    This project is licensed under the MIT License.
============================================================================== 
-->
<?php
include '../database/conn.php';
session_start();
session_regenerate_id(true);
$ses_id = $_SESSION['usr_id'];
if (empty($ses_id)) {
    header('location: ../src/landing/index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <link rel="stylesheet" href="css/costum.css">
    <!-- icons -->
    <link rel="stylesheet" href="../node_modules/boxicons/css/boxicons.min.css">
    <script src="../node_modules/lucide/dist/umd/lucide.min.js"></script>
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="../plugin/jquery.js"></script>
    <title>admin</title>
</head>

<body>
    <div class="w-svw h-svh overflow-y-auto bg-mainbg flex">
        <!-- this is located in src/admin/navigations -->
        <?php include '../src/admin/components/navigations/home.php' ?>
        <div class="lg:w-[83%] w-full h-svh">
            <div class="w-auto  sticky top-0 z-40">
                <div class="navbar bg-transparent flex justify-between">
                    <div class="">
                        <button class="btn btn-sm mx-2 text-sm btn-ghost font-semibold font-popin" id="ctyAdd"><i class='bx bxs-dashboard'></i>Dashboard</button>
                    </div>
                    <div class="gap-2">
                        <div class="indicator">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <span class="badge badge-xs badge-primary indicator-item"></span>
                        </div>
                        <div class="dropdown dropdown-end px-0">
                            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                                <div class="w-10 rounded-full">
                                    <img alt="Tailwind CSS Navbar component" src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                                </div>
                            </div>
                            <ul tabindex="1" class="mt-3 z-10 p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                                <li>
                                    <a class="justify-between">
                                        Profile
                                        <span class="badge">New</span>
                                    </a>
                                </li>
                                <li><a>Settings</a></li>
                                <li><a href="php/logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <div class="max-lg:hidden flex">
                            <a class="btn btn-ghost text-sm p-1">Gorge Admin1</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- start contents here total donations total redemption -->
            <div class="lg:h-[90%] w-full overflow-x-auto">
                <!-- right content -->
                <div class=" w-full flex lg:flex-row p-2 lg:flex gap-2 ">
                    <div class="w-[70%] h-auto flex flex-col gap-2">
                        <div class=" h-20 flex flex-row justify-between">
                            <?php include "../src/admin/components/fetching/totalUsers.php" ?>
                            <?php include "../src/admin/components/fetching/pendingRedemptions.php" ?>
                            <?php include "../src/admin/components/fetching/pendingDonations.php" ?>
                            <?php include "../src/admin/components/fetching/totalRdmItems.php" ?>
                        </div>
                        <div class="w-full h-72 flex flex-row gap-2 card rounded-md p-2 bg-bgbox bg-[url('../src/img/dashbg1.svg')]">
                            <div class="flex w-[70%] h-full gap-2">
                                <?php include "../src/admin/components/fetching/topDonor.php" ?>
                                <?php include "../src/admin/components/fetching/recentDonator.php" ?>

                            </div>
                            <div class=" flex flex-col gap-2">
                                <div class="stats shadow rounded-md bg-bgbox">
                                    <div class="stat p-2">
                                        <div class="stat-figure text-bgtext">
                                            <i data-lucide="list-minus"></i>
                                        </div>
                                        <div class="stat-title text-[12px]">Total E-waste Categories</div>
                                        <div class="divide-y divide-bgtext">
                                            <div class="font-bold text-md">20</div>
                                            <div class="flex flex-row items-center gap-1">
                                                <div class="stat-desc text-[10px]">view</div><i data-lucide="eye" class="w-3 h-3 "></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="stats shadow rounded-md bg-bgbox">
                                    <div class="stat p-2">
                                        <div class="stat-figure text-bgtext">
                                            <i data-lucide="coins"></i>
                                        </div>
                                        <div class="stat-title text-[12px]">Total Points Earn</div>
                                        <div class="divide-y divide-bgdevider">
                                            <div class="font-bold text-md">1309</div>
                                            <div class="flex flex-row items-center gap-1">
                                                <div class="stat-desc text-[10px]">by all user's</div><i data-lucide="user" class="w-3 h-3 "></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="stats shadow rounded-md bg-bgbox">
                                    <div class="stat p-2">
                                        <div class="stat-figure text-bgtext">
                                            <i data-lucide="gift"></i>
                                        </div>
                                        <div class="stat-title text-[12px]">Total Redemption Items</div>
                                        <div class="divide-y divide-bgdevider">
                                            <div class="font-bold text-md">20</div>
                                            <div class="flex flex-row items-center gap-1">
                                                <div class="stat-desc text-[10px]">Add Items</div><i data-lucide="plus" class="w-3 h-3 "></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- left content Recent Activities-->
                    <div class="w-[30%] h-[500px] rounded-md p-2  bg-[url('../src/img/dashbg1.svg')]">
                        <div class=" flex gap-1 ">
                            <div class="font-popin p-1 font-light text-[15px]">Recent Activities</div>
                            <i data-lucide="history" class="w-6 h-6 text-bgtext"></i>
                        </div>
                        <div class="w-full card rounded-md flex justify-center bg-base-100 shadow">
                            <div class="overflow-x-auto backdrop-blur-sm bg-white/30]">
                                <table class="table table-xs">
                                    <!-- head -->
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Date</th>
                                            <th>Activity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- row 1 -->
                                        <tr>
                                            <th>1</th>
                                            <td class="font-light text-[10px]">04/20/24 12:00</td>
                                            <td class="font-light">Ashong Salongga Registered</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <dialog id="addItemModal" class="modal">
        <?php include 'components/dialogs/item.php' ?>
    </dialog>
    <script>
        lucide.createIcons();
    </script>
</body>

</html>
<script src="../src/admin/js/script.js"></script>