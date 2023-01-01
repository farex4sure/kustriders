<?php
include "config.php";
session_start();
$err="";
if(isset($_SESSION["loggedin_admin"])){
header("Location:dashboard.php");
                ?>
                <script type="text/javascript">
                  window.location.href="dashboard.php";
                </script>
                <?php

}
if(isset($_POST['submit'])){
    $phone=$_POST['phone'];
    $pwd=$_POST['password'];

if (empty($phone)) {
    $err="<div class='p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800' role='alert'>
                <span class='font-medium'>Error</span> Phone number or email address is required
              </div>";
    }else if(empty($pwd)){
        $err="<div class='p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800' role='alert'>
                <span class='font-medium'>Error</span> Password is required
              </div>";
    }else{
  
    $sql = "SELECT * FROM admins WHERE phone ='$phone' AND password='$pwd' or email='$phone' AND password='$pwd'";
    
    $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

                $_SESSION['loggedin_admin'] = $row['phone'];
                header("location:dashboard.php");
        }else{
                $err="<div class='p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800' role='alert'>
                <span class='font-medium'>Error</span> Incorrect Login Credentials
              </div>";
        
    }
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
    <title>Kust Riders | Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class='h-screen flex flex-col items-center font-bold'>
        <div class='flex w-full justify-center px-2 py-4 shadow bg-gray-100 bg-opacity-25'>
            <div class='w-32 md:w-44'>
                <img src="../image/Kustride.png" alt="">
            </div>
        </div>
        <div class='mb-6 w-full'>
            <div class='flex divide-x-2 w-full'>
                <span class='text-xl flex justify-center w-full py-3 bg-white text-green-600 bg-opacity-75 hover:bg-green-600 hover:bg-opacity-75 hover:text-green-50'>Admin Login</span>
                </div>
        </div>
        <div class='w-full max-w-5xl px-4'>
            <div>
                <form action="index.php" method="post">
                <?php echo $err ?>
                    <div class="mb-6">
                        <div class='flex items-center mb-2'>
                            <label for="phone-email" class="block text-sm font-medium text-gray-900 dark:text-gray-300 mr-auto">Mobile</label>
                        </div>
                        <input type="text" name="phone" class="bg-gray-50 border-b-2 border-gray-300 text-gray-900 text-sm md:rounded-lg focus:outline-none focus:ring-green-500 focus:border-green-500 block w-full p-2.5" placeholder="Email/Phone" required="">
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your password</label>
                        <input type="password" name="password" class="bg-gray-50 border-b-2 border-gray-300 text-gray-900 text-sm md:rounded-lg focus:outline-none focus:ring-green-500 focus:border-green-500 block w-full p-2.5" placeholder="Password" required="">
                    </div>
                    <div class="flex items-start mb-6">
                        <div class="flex items-center h-5 text-gray-700">
                            <a href="#" class="focus:green-600 hover:green-600">Forgot Password?</a>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Sign in</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>