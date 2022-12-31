<?php
session_start();
include "config.php";
if(!isset($_SESSION['loggedin_id'])){
    header("location:login.php");
}
$details = "SELECT * FROM riders WHERE phone='".$_SESSION['loggedin_id']."'";
    $result = $conn->query($details);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // $id = $row['id'];
            $fname = $row['fullname'];
            $st = $row['st'];
        }
    }
if($st === '0'){
    header("location:payment.php");
    ?>
    <script>
        window.location.href='payment.php'
    </script>
    <?php
}else{

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="js/jquery.min.js"></script>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kust Riders | Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
</head>
<body>
    <div class='flex h-screen flex-col'>

        <!-- HEADER STARTS HERE -->
        <header class='flex justify-center p-3 shadow mb-4 md:px-8 bg-green-500 shadow-lg'>
            <div class='flex items-center w-full max-w-6xl'>
                <div class='flex items-center gap-2 mr-auto'>
                    <div class='flex items-center justify-center w-8 h-8 md:w-12 md:h-12 rounded-full bg-green-100 object-cover overflow-hidden'>
                        <img class='h-full w-full' src="./image/Kustride.png" alt="">
                    </div>
                    <span class='font-semibold md:text-lg text-white'><?php echo $fname ?></span>
                </div>
    

                <!-- Dropdown menu -->
                <div id="dropdownDivider" class="hidden z-10 w-32 md:w-36 bg-white rounded divide-y divide-gray-100 shadow">
                    <ul class="px-[3px] text-sm text-gray-700" aria-labelledby="dropdownDividerButton">
                        <li>
                            <a href="cpass.php" class="flex justify-between items-center w-full text-xs py-2 px-1 hover:bg-gray-100">Change Password <i class="fa-solid fa-key text-green-600"></i></a>
                        </li>
                        <li>
                            <button type="button" data-modal-toggle="popup-modal" class="flex justify-between items-center w-full text-xs py-2 px-1 hover:bg-gray-100">Sign Out <i class="fa-solid fa-power-off text-red-500"></i></button>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- HEADER ENDS HERE -->

        <!-- MAIN STARTS HERE -->
        <main class='flex justify-center mb-auto h-full overflow-auto'>
            <div class='flex flex-col h-full w-full max-w-6xl shadow px-3 md:px-5 lg:px-8'>
                <div class='flex justify-center w-full rounded-lg py-1 md:mb-6 md:mt-4'>
                    <div class='w-32 md:w-44'>
                        <img class='' src="./image/Kustride.png" alt="">
                    </div>
                </div>
                <div class='flex flex-col h-full gap-y-3 mt-3'>
                    <!-- BALANCE SECTION STARTS HERE -->
                    <div class='flex w-full justify-between items-center px-3 py-2 md:py-4 md:px-6 bg-white bg-opacity-75'>
                        <div class='flex w-full gap-2'>
                            <div class='flex flex-col w-full justify-between gap-1 items-start'>
                                <p class='font-bold text-xl'>Last Payment</p>
                                <p class=''>20th Dec, 2022</p>
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded">
                                    View Details
                                </button>
                            </div>
                            <div class='flex flex-col w-full justify-between gap-1 items-end'>
                                <p class='font-bold text-xl'>Next Payment</p>
                                <p class=''>20th Dec, 2022</p>
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-7 rounded">
                                    Pay now
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- BALANCE SECTION ENDS HERE -->
                    
                    
                    
                    <!-- TRANSACTION HISTORY SECTION STARTS HERE -->
                        <div class='flex flex-col w-full h-full px-3 py-4 bg-white bg-opacity-75 rounded-lg'>
                            <a href="#">
                                <div class='flex items-center w-full mb-2 py-1'>
                                    <div class='flex items-center gap-1 mr-auto'>
                                        <h3 class='w-full text-sm md:text-lg font-semibold text-gray-600'>Transaction History</h3>
                                        <button class='text-green-600 text-sm'><i class='fa fa-refresh'></i></button>
                                    </div>
                                    <button class='text-sm text-green-600 capitalize'><span>see all </span><i class='fa fa-chevron-right'></i></button>
                                </div>
                            </a>
                        <!-- TRANSACTION DETAILS SECTION STARTS HERE -->
                        <div class='flex flex-col h-full border-t border-b'>
                        <?php
                        $fetch = mysqli_query($conn, "SELECT * FROM transaction WHERE receiver='".$_SESSION['loggedin_id']."' OR sender='".$_SESSION['loggedin_id']."' ORDER BY id DESC LIMIT 5");
                        if($fetch->num_rows > 0){
                            while($row = $fetch->fetch_assoc()){
                                $t_id=$row['id'];
                                $dt=$row['date'];
                                $dt=date("M d, Y", $dt);
                                $camount=$row['amt'];
                            
                                $sendto=$row['receiver'];
                                if ($row['receiver'] == $_SESSION['loggedin_id']){
                                    $sendto = $row['sender'];
                                }

                                $checkc=mysqli_query($conn, "SELECT * FROM riders WHERE phone='$sendto'");
                                
                                // get contact details
                                
                                while ($cc=mysqli_fetch_assoc($checkc)) {
                                    $cfullname=$cc['fullname'];
                                
                    }
                    if($_SESSION['loggedin_id']==$row['sender']) {
                        ?>
                            <!-- SENT TRANSFER SECTION STARTS HERE -->
                            <form action="dashboard.php" method="post" class="flex flex-col divide-y border-t border-b">
                                <button type="submit" name="submit" class='flex items-center justify-between w-full py-2 px-3 h-full'>
                                    <div class='flex gap-2 items-start'>
                                        <div class='text-red-500 pt-1 font-bold'><i class='fa fa-arrow-up'></i></div>
                                        <div class="flex flex-col">
                                            <div class='text-left font-semibold md:text-lg uppercase'><?php if($row['receiver'] === 'KUST'){ echo "KUST Riders Registration"; }else{echo $cfullname;} ?></div>
                                            <div class="text-left text-xs md:text-sm italic text-red-500 font-semibold">You sent <span><?php echo number_format($camount); ?> to <?php if($row['receiver'] === 'KUST'){ echo "KUST RIDERS WUDIL"; }else{echo $cfullname;} ?></span></div>
                                        </div>
                                    </div>
                                    <div class='flex flex-col justify-start items-center'>
                                        <span class='text-red-500 md:text-lg font-bold'><span class='text-sm md:text-lg font-bold'><i class='fa fa-naira-sign'></i></span><?php echo number_format($camount); ?></span>
                                        <span class='text-xs md:text-sm self-end'><?php echo $dt; ?></span>
                                    </div>
                                </button>
                            </form>
                            <!-- SENT TRANSFER SECTION ENDS HERE -->
                            <?php
                    }elseif($_SESSION['loggedin_id']==$row['receiver']){
                            ?>
                            <!-- RECEIVED TRANSFER SECTION STARTS HERE -->
                            <form action="dashboard.php" method="post" class="flex flex-col divide-y border-t border-b">
                            <button type="submit" name="submit2" class='flex items-center justify-between w-full py-2 px-3 h-full'>
                                <div class='flex gap-2 items-start'>
                                    <span class='text-green-500 pt-1 font-bold'><i class='fa fa-arrow-down'></i></span>
                                    <div class="flex flex-col">
                                        <span class='text-left font-semibold md:text-lg uppercase'>Faruq Faruq</span>
                                        <span class="text-left text-xs md:text-sm italic text-green-500 font-semibold">You received <span>200 from Umar Isah</span></span>
                                    </div>
                                </div>
                                <div class='flex flex-col justify-start items-center'>
                                    <span class='text-green-500 md:text-lg font-bold'><span class='text-sm md:text-lg font-bold'><i class='fa fa-naira-sign'></i></span>200</span>
                                    <span class='text-xs md:text-sm self-end'>June, 2022</span>
                                </div>
                            </button>
                            </form>
                            <!-- RECEIVED TRANSFER SECTION ENDS HERE -->
                            <?php
                    }else{
                        echo "error";
                    }
                    }
        }else{
        echo "No Any Transaction Yet";
        }
                            ?>
                        </div>
                        <!-- TRANSACTION DETAILS SECTION ENDS HERE -->

                        </div>
                    <!-- TRANSACTION HISTORY SECTION ENDS HERE -->
                    
                </div>
            </div>
        </main>
        <!-- MAIN ENDS HERE -->
        
        <!-- FOOTER STARTS HERE -->
        <footer class='flex w-full justify-center p-3 px-0 border-t border-1 bg-green-500'>
            <div class='flex justify-around w-full max-w-5xl'>
                <span class='text-green-600 text-lg md:text-3xl'>
                    <a href="dashboard.php"><i class='text-white fa fa-home'></i></a>
                </span>
                <span class='text-green-600 text-lg md:text-3xl'>
                    <a href="monthly.php"><i class='text-white fa fa-credit-card'></i></a>
                </span>
                <span class='text-green-600 text-lg md:text-3xl'>
                    <a href="dashboard.php"><i class='text-white fa fa-user'></i></a>
                </span>
                <span class='text-green-600 text-lg md:text-3xl'>
                    <button type="button" id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider"><i class='text-white fa fa-gear'></i></button>
                </span>
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
                        <a href="logout.php"><button data-modal-toggle="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button></a>
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