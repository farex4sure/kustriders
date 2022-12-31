<?php
session_start();

include "config.php";
$amt= $_COOKIE["amount"];
$secret_key=$_SESSION["loggedin_id"];
$owner=$_SESSION['loggedin_id'];
$result = array();
$generated_ref=$_GET["ref"];

mysqli_query($conn, "INSERT INTO refs (refcode) VALUES('$generated_ref')");
//check ref code

$checkref=mysqli_query($conn, "SELECT * FROM refs WHERE refcode= '".$generated_ref."' AND used='true'");

if(mysqli_num_rows($checkref) >0 ){
    $resf="<h2 class='text-danger'><b>Please complete your payment first!</b></h2>";
}
else{
    

//The parameter after verify/ is the transaction reference to be verified
$url = 'https://api.paystack.co/transaction/verify/'.$generated_ref;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt(
  $ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer sk_test_8bba9b54723a7e647c632111a92887ba50b8fc4d']
);
$request = curl_exec($ch);
curl_close($ch);

if ($request) {
               $result = json_decode($request,true);
              

}

if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success'))
 {
mysqli_query($conn, "UPDATE refs SET used='true' WHERE refcode='$generated_ref'");

$date=time();
$refid="T".date("Y_M_D_His_").rand(01111,99999);

    $payed=mysqli_query($conn, "INSERT INTO reg_payment (userid,amt,date)values('".$_SESSION["loggedin_id"]."','5500','$date')");
    $upd=mysqli_query($conn, "UPDATE riders SET st='1' WHERE phone='".$_SESSION["loggedin_id"]."'");
    $trans=mysqli_query($conn, "INSERT INTO transaction (sender,receiver,amt,refid,date)values('".$_SESSION["loggedin_id"]."','KUST','5500','$refid','$date')");
    $month=mysqli_query($conn, "INSERT INTO monthly_pay (userid,lastpay,nextpay,date)values('".$_SESSION["loggedin_id"]."','$date','','$date')");
}
$resf="
<h2 class='text-success'><b>You have successfully made your payment</h2>
<hr>
<h5>
<a href='dashboard.php'>back to dashoboard</a>
</h5>
</b>";

}
// else{
    
//  $resf="
// <h2 class='text-danger'><b>Please complete your payment!</h2>

// </b>";   
// }

?>

<!DOCTYPE html>
<html  >
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="../assets/images/favicon-128x128.png" type="image/x-icon">
  <title>Top up Confirmation | Anjima </title>
    </head>
  <body>
  <style type="text/css">



@import url('https://fonts.googleapis.com/css?family=Quicksand:400,700');

body {
     background-image: url("imgs/web-bg.jpg");
  height: 500px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  font-family:'Quicksand';
  font-style: normal;
  font-weight: 400;
  letter-spacing: 0;
}


</style>
    <style>
        .disclaimer {
    position: fixed;
    z-index: 9999999;
    bottom: 0;
    right: 0;
    border-top: 2px solid #ff5c62;
    text-align: center;
    font-size: 14px;
    font-weight: 400;
    background-color: #fff;
    padding: 5px 10px 5px 10px;
    display: none;
}
      </style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <script src="https://js.paystack.co/v1/inline.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

    <style>
        
         a{
         text-decoration:none !important;
         }
       
       
       
    </style>
   </head>

<body>
    
<div class="container">
<div class="row">
    <div class="col-lg-3"></div>
<div class="col-lg-6 col-md-12">
<div  style="margin-top:50px;">
    
<center>
    <?php
echo $resf;
?>
</center>

</div>
</div>
</div>
</div>
</div>

</body>
</html>