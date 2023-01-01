<?php
session_start();
include "config.php";
$err="";
if(isset($_POST['submit'])){
  $phone=$_POST['phone'];
  $password=$_POST['password'];

  $sql = "SELECT * FROM riders WHERE phone='$phone' AND password='$password' OR username='$phone' AND password='$password'";
    $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            $_SESSION['loggedin_id']= $row['phone'];
                header("location:dashboard.php");
        }else{
    $err = '
    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
      <span class="font-medium">Error!</span> Invalid Login Details.
    </div>
    ';
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
  <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
  <style>
    .debug {
      border: 1px red solid;
    }
  </style>

<body>
    <nav class="bg-white px-2 sm:px-4 py-2.5 dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
            <div class="container flex flex-wrap items-center justify-between mx-auto">
                <a href="./" class="flex items-center">
                    <img src="./image/Kustride.png" class="h-6 mr-3 sm:h-9" alt="Flowbite Logo">
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">KUST Riders</span>
                </a>
                <div class="flex md:order-2">
                    <a href="login.php" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Login</a>
                        <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                    <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="./" class="block py-2 pl-3 pr-4 text-white bg-green-700 rounded md:bg-transparent md:text-green-700 md:p-0 dark:text-white" aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-green-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-green-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-green-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>






  <section class="min-h-screen mt-20">
    <div class="container px-6 pt-10 h-full">
      <div class="flex bg-green-500 justify-center items-center text-gray-800 rounded-lg shadow-xl bg-white max-w-3xl mx-auto">
        <div class="hidden md:block md:w-6/12 lg:w-7/12 mb-12 md:mb-0  ">
          <div class=" mb-6">
            <img src="image/Kustride.png" class="h-20 ml-32 sm:h-26  " alt="Logo" />
            <p class="text-white font-bold text-center text-3xl mt-6">WELCOME BACK</p>
            <div class="flex justify-center">
              <button  class="bg-white mx-auto justify-center text-green-500 px-2 py-2 text-2xl font-bold rounded mt-6"><a href="./sigin.html">Create Account</a> </button>
            </div>
          </div>
          
          
          <!-- <img src="./image/motro2.jpg" class="w-[300px] mx-auto border-radius-30%" alt="Phone image" /> -->
        </div>
        <div class="w-full md:w-6/12 lg:w-6/12 md:px-4 p-2 bg-green-200">
          <h1 class="text-center text-3xl font-bold mb-12 text-green-400 ">LOG IN</h1>
          <form action="login.php" method="post">
            <?php echo $err ?>
            <!-- Email input -->
            <div class="mb-6">
              <input type="text" name="phone" class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none" placeholder="Username or Phone Number" />
            </div>
            <!-- Password input -->
            <div class="mb-6">
              <input type="password" name="password" class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-green-600 focus:outline-none" placeholder="Password" />
            </div>

            <div class="flex justify-between items-center mb-6">
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-green-500 checked:border-green-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" id="exampleCheck3" checked />
                <label class="form-check-label inline" class=" text-center font-semibold mx-4 mb-0">OR</p>
                <label class="text-gray-800" for="exampleCheck2">Remember me</label>
              </div>
              <a href="#!"
                class="text-green-500 hover:text-green-300 duration-200 transition ease-in-out">Forgot
                password?</a>
            </div>

            <!-- Submit button -->
            <button type="submit" name="submit" class="inline-block px-7 py-3 bg-green-500 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-green-300 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out w-full" data-mdb-ripple="true" data-mdb-ripple-color="light"> Log in</button>

            <div class="flex items-center my-4 before:flex-1 before:border-t before:border-gray-300 before:mt-0.5 after:flex-1 after:border-t after:border-gray-300 after:mt-0.5">

          </form>
        </div>
      </div>
    </div>
  </section>

</body>
<script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>


</html>