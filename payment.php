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
            $id = $row['id'];
            $st = $row['st'];
        }
    }
    if($st === '1'){
        header("location:dashboard.php");
        ?>
        <script>
            window.location.href='dashboard.php'
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
                    <span class='font-semibold md:text-lg text-white'>Faruq Farex</span>
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
                            <form onsubmit(); return false(); class='flex flex-col w-full justify-between gap-1 items-center'>
                                <h3 class="mb-4 text-xl font-bold text-center text-gray-900 dark:text-white">
                                    Registration Payment
                                </h3>
                                <p class="text-sm">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                    Obcaecati, Lorem ipsum dolor sit, amet consectetur adipisicing
                                    elit. Obcaecati at animiLorem ipsum dolor sit, amet consectetur
                                    adipisicing elit. Obcaecati!p
                                </p>
                                <p class="mt-2">
                                    You are to pay
                                    <span class="font-bold text-green-500">
                                        ???5,500.00
                                    </span>
                                </p>
                            <input type="text" id="amount" name="amount" value="5500" class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5"placeholder="Amount" required>
                                <button type="button" onclick="payWithPaystack()" class="mt-5 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-12 rounded">
                                    Pay
                                </button>
                            </form>
                        </div>
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
                    <a href="dashboard.php"><i class='text-white fa fa-credit-card'></i></a>
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
    <script src="https://js.paystack.co/v1/inline.js"></script>

<script>
  function payWithPaystack(){

 document.cookie = "amount = " + document.getElementById("amount").value;
  var handler = PaystackPop.setup({
      key: 'pk_test_0ff1432465dd74912a4611ab331627725ed87907',
      email: 'kustriders@gmail.com',
      amount: document.getElementById("amount").value+"00",
      ref: '<?php echo mt_rand(00000000,12345678);?>', // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_country: "",
                display_city: "",
                display_id: ""
                 }
         ]
      },
      callback: function(response){
           window.location.replace("payment-verify.php?ref="+response.reference);
      },
      onClose: function(){
          alert('Top up canceled');
      }
    });
    handler.openIframe();
  }
</script>
</body>
</html>