<?php

include_once('database/connection.php');
session_start();
$email = $_SESSION['email'];
if(!isset($_SESSION["email"])){
  header("location: index.php");
}
$query = "SELECT `name` FROM `admin_user` WHERE email = '$email'";
$Result = $con->query($query);
$result_row = $Result->fetch_array();

$name = $result_row[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Mala Gold</title>

  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<style>

.grid-container {
  display: grid;
  grid-template-columns: auto auto auto auto auto auto auto auto auto;
  grid-gap: 5px;
  background-color: #2196F3;
  padding: 5px;
}

.grid-container > div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  padding: 10px 0;
  font-size: 30px;
}
</style>
<body onload="preloaderRemover()">

    <div id="preoader" style="position: fixed;
        width: 100%;
        height: 100vh;
        background: #fff
        url('dist/img/preloader.gif')
        no-repeat center center;	
    z-index: 99999;"></div>

    

<?php

    if(isset($_POST['barcode_slip'])){
        echo '<div class="grid-container">';
        $counter = count($_POST["selectCheckBox"]);
        for($x=0; $x<$counter; $x++){
          $barcode = $_POST["selectCheckBox"][$x];
          echo '<div class="item1">
                  <img src="barcode/barcode.php?text='.$barcode.'&size=20&print=true" class="image" alt="barcode" width="140px" height="50px">
                </div>';
        }
        echo '</div>';


    }else{
        echo "<div style='color:red; text-align:center;'>Please select any product. Thank You!</div>";
    }


?>



<!-- Preloader remover -->
<script>
  function preloaderRemover(){
    document.getElementById("preoader").style.display = "none";
  }
</script>
</body>
</html>