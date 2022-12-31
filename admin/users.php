<?php
session_start();
include "config.php";
$err="";
if(!isset($_SESSION['loggedin_admin'])){
    header("location:index.php");
}
$details = "SELECT * FROM admins WHERE phone='".$_SESSION['loggedin_admin']."'";
    $result = $conn->query($details);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // $id = $row['id'];
            $fname = $row['name'];
            // $st = $row['st'];
        }
    }
    if(isset($_POST['suspend'])){
        $uid=$_POST['uid'];
        $update=mysqli_query($conn,"UPDATE riders SET st='2' WHERE id='$uid'");
    
        $riders = "SELECT * FROM riders WHERE id='$uid'";
        $res = $conn->query($riders);
        if ($res->num_rows > 0) {
            while($row = $res->fetch_assoc()) {
                $rname = $row['fullname'];
            }
        }
        if($update == true){
            $err="<div class='p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800' role='alert'>
                    <span class='font-medium'>Success</span> $rname Has been suspended
                  </div>";
        }else{
            $err="<div class='p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800' role='alert'>
                    <span class='font-medium'>Error</span> Unable to suspend this rider
                  </div>";
        }
    
    }


    
    if(isset($_POST['revive'])){
        $uid=$_POST['uid'];
        $update=mysqli_query($conn,"UPDATE riders SET st='1' WHERE id='$uid'");
    
        $riders = "SELECT * FROM riders WHERE id='$uid'";
        $res = $conn->query($riders);
        if ($res->num_rows > 0) {
            while($row = $res->fetch_assoc()) {
                $rname = $row['fullname'];
            }
        }
        if($update == true){
            $err="<div class='p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800' role='alert'>
                    <span class='font-medium'>Success</span> $rname Has been revived
                  </div>";
        }else{
            $err="<div class='p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800' role='alert'>
                    <span class='font-medium'>Error</span> Unable to revive this rider
                  </div>";
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
                    <a href="dashboard.php" class='font-semibold md:text-lg text-white'><i class="fa fa-arrow-left"></i> Registered Riders</a>
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
                    
                    <div class="overflow-x-auto relative">
                        <?php echo $err ?>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        Fullname
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Phone
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Bike Brand
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Plate No.
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $detail = "SELECT * FROM riders WHERE st='1' OR st='2'";
                                $results = $conn->query($detail);
                                if ($results->num_rows > 0) {
                                    while($row = $results->fetch_assoc()) {
                                        $u_id = $row['id'];
                                        $fname = $row['fullname'];
                                        $phone = $row['phone'];
                                        $brand = $row['bike_brand'];
                                        $plate_no = $row['plate_no'];
                                        $st = $row['st'];
                            ?>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?php echo $fname ?>
                                    </th>
                                    <td class="py-4 px-6">
                                    <?php echo $phone ?>
                                    </td>
                                    <td class="py-4 px-6">
                                    <?php echo $brand ?>
                                    </td>
                                    <td class="py-4 px-6">
                                    <?php echo $plate_no ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="users.php" method="post">
                                            <div class="flex gap-2 items-center justify-between">
                                                <input class="hidden" name="uid" value="<?php echo $u_id ?>">   
                                                <?php
                                                if($st == '1'){
                                                ?>
                                                <button type="submit" name="suspend" class="text-green-500 lg:text-xl"><i class="fa fa-user-lock"></i></button>
                                                <?php
                                                }else{
                                                    ?>
                                                <button type="submit" name="revive" class="text-red-500 lg:text-xl"><i class="fa fa-user-lock"></i></button>
                                                    <?php
                                                }
                                                ?>
                                                <button type="submit" name="delete" class="text-red-600 lg:text-xl"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- BALANCE SECTION ENDS HERE -->
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
                    <a href="users.php"><i class='text-white fa fa-users'></i></a>
                </span>
                <span class='text-green-600 text-lg md:text-3xl'>
                    <a href="payment.php"><i class='text-white fa fa-credit-card'></i></a>
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