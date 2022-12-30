<?php
session_start();
include "config.php";
$err="";

if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$uname=$_POST['uname'];
	$phone=$_POST['phone'];
	$gender=$_POST['gender'];
	$occupation=$_POST['occupation'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	$brand=$_POST['brand'];
	$plate_no=$_POST['plate_no'];
	$address=$_POST['address'];
	$date=time();

	if($password !== $cpassword){
		$err = '
    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
      <span class="font-medium">Error!</span> Password do not match.
    </div>
    ';
	}else{
			$_SESSION['name']=$name;
			$_SESSION['uname']=$uname;
			$_SESSION['phone']=$phone;
			$_SESSION['gender']=$gender;
			$_SESSION['occupation']=$occupation;
			$_SESSION['password']=$password;
			$_SESSION['cpassword']=$cpassword;
			$_SESSION['brand']=$brand;
			$_SESSION['plate_no']=$plate_no;
			$_SESSION['address']=$address;
			$_SESSION['date']=$date;
			header("location:gurantor.php");
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>sing in</title>
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css"
		/>
		<link
			rel="stylesheet"
			href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css"
		/>
		<style>
			.debug {
				border: 1px red solid;
			}
		</style>
	</head>

	<body
		style="
			background-image: url(./image/s5.jpg);
			background-repeat: no-repeat;
			background-size: cover;
		"
	>
		<nav
			class="p-3 border-gray-200 rounded bg-green-300 dark:bg-gray-800 dark:border-gray-700"
		>
			<div
				class="container flex flex-wrap items-center justify-between mx-auto"
			>
				<a href="#" class="flex items-center">
					<img src="image/Kustride.png" class="h-8 mr-6 sm:h-10" alt="Logo" />
					<span
						class="self-center text-xl font-semibold whitespace-nowrap dark:text-white"
					></span>
				</a>
				<button
					data-collapse-toggle="navbar-solid-bg"
					type="button"
					class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
					aria-controls="navbar-solid-bg"
					aria-expanded="false"
				>
					<span class="sr-only">Open main menu</span>
					<svg
						class="w-6 h-6"
						aria-hidden="true"
						fill="currentColor"
						viewBox="0 0 20 20"
						xmlns="http://www.w3.org/2000/svg"
					>
						<path
							fill-rule="evenodd"
							d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
							clip-rule="evenodd"
						></path>
					</svg>
				</button>
				<div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
					<ul
						class="flex flex-col mt-4 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700"
					>
						<li>
							<a
								href="./dashbord.html"
								class="block py-2 pl-3 pr-4 text-green-500 bg-green-500 rounded md:bg-transparent md:text-green-500 md:p-0 md:dark:text-white dark:bg-blue-600 md:dark:bg-transparent"
								aria-current="page"
								>Home</a
							>
						</li>
						<li>
							<a
								href="#"
								class="block py-2 pl-3 pr-4 text-green-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
								>Services</a
							>
						</li>
						<li>
							<a
								href="./payment.html"
								class="block py-2 pl-3 pr-4 text-green-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
								>Payment</a
							>
						</li>
						<li>
							<a
								href="#"
								class="block py-2 pl-3 pr-4 text-green-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
								>Contact</a
							>
						</li>
						<li>
							<a
								href="./Login.html"
								class="block py-2 pl-3 pr-4 text-green-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
								>Login</a
							>
						</li>
						<li>
							<a
								href="./sigin.html"
								class="block py-2 pl-3 pr-4 text-green-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
								>Sign up</a
							>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="flex justify-center mt-20 md:w-1/2 mx-auto">
			<div class="block p-6 rounded-lg shadow-lg mb-4 bg-green-300 mx-4 w-full">
				<div class="w-full flex flex-col h-full items-center mt-16">
					<h1 class="text-center text-3xl font-bold mb-8 text-white">
						SIGN UP
					</h1>

					<form action="signup.php" method="post" class="w-full flex md:px-20 flex-col">
						<?php echo $err ?>
						<div class="mb-6 items-center">
							<label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
								Full name
							</label>
							<input type="name" name="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required/>
						</div>
						<div class="mb-6 items-center">
							<label for="uname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
								User name
							</label>
							<input type="uname" name="uname" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
						</div>
						<div class="mb-6">
							<label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
								Phone
							</label>
							<input type="phone" name="phone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required/>
						</div>
						<div class="mb-6">
							<div class="mb-3 xl:w-full">
								<label for="Gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
								<select name="gender" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
									<option selected></option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						</div>
						<div class="mb-6 items-center">
							<label for="occupation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
								Occupation
							</label>
							<input type="occupation" name="ocupation" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required/>
						</div>
						<div class="mb-6">
							<label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
								Password
							</label>
							<input type="password" name="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required/>
						</div>
						<div class="mb-6">
							<label for="cpassword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
								Confirm password
							</label>
							<input type="password" name="cpassword" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required/>
						</div>
						<div class="mb-6">
							<label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
								Bike brand
							</label>
							<input type="brand" name="brand" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required/>
						</div>
						<div class="mb-6">
							<label for="Plate number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
								Plate number
							</label>
							<input type="text" name="palte_no" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required/>
						</div>
						<div class="mb-6">
							<label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
								address
							</label>
							<textarea type="address" name="address" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required></textarea>
						</div>
						<button type="submit" name="submit" class="text-white bg-green-500 hover:bg-green-200 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
							Next
						</button>
					</form>
				</div>
			</div>
		</div>
	</body>
	<script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
</html>
