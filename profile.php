<?php
session_start();
include "config.php";
if(!isset($_SESSION['loggedin_id'])){
    header("location:vendor_id.php");
}
$details = "SELECT * FROM riders WHERE phone='".$_SESSION['loggedin_id']."'";
            $result = $conn->query($details);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $name = $row["fullname"];
                    $phone = $row["phone"];
                }
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="js/jquery.min.js"></script>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anjima | Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
</head>
<body>
    <div class='flex h-screen flex-col'>
        
        <!-- HEADER STARTS HERE -->
        <header class='flex justify-center p-3 shadow mb-2 md:px-8 bg-green-500'>
            <div class='flex items-center w-full max-w-6xl'>
                <div class='flex text-white items-center gap-2 mr-auto'>
                    <a href="dashboard.php" class="text-white text-xl md:text-2xl lg:text-3xl font-bold"><span><i class="fa fa-arrow-left"></i></span></a>
                    <span>My Profile</span>
                </div>
            </div>
        </header>
        <!-- HEADER ENDS HERE -->

        <!-- MAIN STARTS HERE -->
        <main class='flex justify-center mb-auto h-full overflow-auto'>
            <div class='flex-flex-col h-full w-full max-w-6xl shadow px-3 md:px-5 lg:px-8 py-2'>
                <div class='flex flex-col w-full gap-3 px-3 py-4 rounded-lg'>
                    <div class="flex flex-col items-center bg-white bg-opacity-50 py-8 px-3 rounded-xl">
                        <div class="flex justify-center items-center py-4">
                            <div class="flex justify-center items-center rounded-full text-2xl md:text-3xl w-16 h-16 bg-green-600 text-green-50">
                                <img class="rounded-full object-cover h-full w-full" src="image/Kustride.png" alt="user_photo">
                            </div>
                        </div>
                        <div class="flex flex-col w-full items-center gap-4 pt-2 pb-4">
                            <span class="block w-full text-center text-black border-b pb-2">Hi, <span class="uppercase font-semibold"><?php echo $name ?></span></span>
                        </div>
                    </div>
                    <div class='flex flex-col divide-y border-t border-b rounded-md justify-start bg-white bg-opacity-50 py-2'>
                        <div class='flex items-center justify-between w-full py-3 px-3'>
                            <div class='flex items-center justify-center'>
                                <span>Full Name</span>
                            </div>
                            <div class='flex justify-end items-center text-sm text-black'>
                                <span class="truncate"><?php echo $name ?></span>
                            </div>
                        </div>
                        <div class='flex items-center justify-between w-full py-3 px-3'>
                            <div class='flex items-center justify-center'>
                                <span>Mobile Number</span>
                            </div>
                            <div class='flex justify-end items-center text-sm text-black'>
                                <span class="truncate"><?php echo $_SESSION['loggedin_id'] ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- <div class='flex flex-col divide-y border-t border-b rounded-md justify-start bg-white bg-opacity-50 py-2'>
                        <div class='flex items-center justify-between w-full py-3 px-3'>
                            <div class='flex items-center justify-center'>
                                <span>Receipient Name</span>
                            </div>
                            <div class='flex justify-end items-center font-semibold'>
                                <span class="truncate uppercase">Faruq Durotade Abiodun</span>
                            </div>
                        </div>
                        <div class='flex items-center justify-between w-full py-3 px-3'>
                            <div class='flex items-center justify-center'>
                                <span>Fee</span>
                            </div>
                            <div class='flex justify-end items-center font-semibold'>
                                <span class="truncate"><i class="fa fa-naira-sign"></i> 0.00</span>
                            </div>
                        </div>
                        <div class='flex items-center justify-between w-full py-3 px-3'>
                            <div class='flex items-center justify-center'>
                                <span>Total Payment Amount</span>
                            </div>
                            <div class='flex justify-end items-center font-semibold'>
                                <span class="truncate"><i class="fa fa-naira-sign"></i> 5,000.00</span>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>
        </main>
        <!-- MAIN ENDS HERE -->
        
        <!-- FOOTER STARTS HERE -->
        <footer class='flex w-full justify-center p-3 px-0 bg-opacity-25'>
            <div class='flex justify-around w-full max-w-5xl px-4 gap-3'>
                <button class='w-full py-1.5 md:py-2 lg:py-3 font-semibold text-green-600 bg-green-100 rounded-2xl border border-gray-00 text-lg md:text-3xl'>
                    <a href="edit_profile.php">Edit Profile</a>
                </button>
            </div>
        </footer>
        <!-- FOOOTER ENDS HERE -->
    </div>

    <!-- MODAL SECTION STARTS HERE -->
        <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-full h-full max-w-md p-4 md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                    </button>
                    <div class="p-6 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to log out?</h3>
                        <button data-modal-toggle="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>
                        <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- MODAL SECTION ENDS HERE -->
    
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>