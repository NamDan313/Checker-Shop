<!DOCTYPE html>
<?php
require_once('login.php');
if (isset($_POST['admin'])) {
  adminlogin($_POST['admin'], $_POST['psw']);
}
?>
<html>
<title>CHECKERVIET</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="SOURCE.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="js/jquery-1.11.1.min.js"></script>
<style>
  /* cart */
  .cart-header {
    font-weight: bold;
    font-size: 1.25em;
    color: #333;
  }

  .cart-column {
    display: flex;
    align-items: center;
    border-bottom: 1px solid black;
    margin-right: 1.5em;
    padding-bottom: 10px;
    margin-top: 10px;
  }

  .cart-row {
    display: flex;
  }

  .cart-item {
    width: 45%;
  }

  .cart-price {
    width: 20%;
    font-size: 1.2em;
    color: #333;
  }

  .cart-quantity {
    width: 35%;
  }

  .cart-item-title {
    color: #333;
    margin-left: .5em;
    font-size: 1.0em;
  }

  .cart-item-image {
    width: 75px;
    height: auto;
    border-radius: 10px;
  }

  .btn-danger {
    color: white;
    background-color: #EB5757;
    border: none;
    border-radius: .3em;
    font-weight: bold;
  }

  .btn-danger:hover {
    background-color: #CC4C4C;
  }

  .cart-quantity-input {
    height: 34px;
    width: 100px;
    border-radius: 5px;
    border: 1px solid #56CCF2;
    background-color: #eee;
    color: #333;
    padding: 0;
    text-align: center;
    font-size: 1.2em;
    margin-right: 25px;
  }

  .cart-row:last-child {
    border-bottom: 1px solid black;
  }

  .cart-row:last-child .cart-column {
    border: none;
  }

  .cart-total {
    text-align: end;
    margin-top: 10px;
    margin-right: 10px;
  }

  .cart-total-title {
    font-weight: bold;
    font-size: 1.5em;
    color: black;
    margin-right: 20px;
  }

  .cart-total-price {
    color: #333;
    font-size: 1.5em;
  }

  .w3-sidebar a,
  form {
    font-family: "Roboto", sans-serif
  }

  body,
  h1,
  h2,
  h3,
  h4,
  h5,
  h6,
  .w3-wide {
    font-family: "Montserrat", sans-serif;
  }

  .panel-table .panel-body {
    padding: 0;
  }

  .panel-table .panel-body .table-bordered {
    border-style: none;
    margin: 0;
  }

  .panel-table .panel-body .table-bordered>thead>tr>th:first-of-type {
    text-align: center;
    width: 100px;
  }

  .panel-table .panel-body .table-bordered>thead>tr>th:last-of-type,
  .panel-table .panel-body .table-bordered>tbody>tr>td:last-of-type {
    border-right: 0px;
  }

  .panel-table .panel-body .table-bordered>thead>tr>th:first-of-type,
  .panel-table .panel-body .table-bordered>tbody>tr>td:first-of-type {
    border-left: 0px;
  }

  .panel-table .panel-body .table-bordered>tbody>tr:first-of-type>td {
    border-bottom: 0px;
  }

  .panel-table .panel-body .table-bordered>thead>tr:first-of-type>th {
    border-top: 0px;
  }

  .panel-table .panel-footer .pagination {
    margin: 0;
  }

  .panel-table .panel-footer .col {
    line-height: 34px;
    height: 34px;
  }

  .panel-table .panel-heading .col h3 {
    line-height: 30px;
    height: 30px;
  }

  .panel-table .panel-body .table-bordered>tbody>tr>td {
    line-height: 34px;
  }
</style>
<?php
require_once('login.php');
if (isLoginedAdmin()) {
?>

  <body class="w3-content" action="admin.php" style="max-width:1200px">

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
      <div class="w3-container w3-display-container w3-padding-16">
        <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
        <a href="#"><img src="Images/ANHNEN/logocheck.jpg" alt="LOGO" width="40%"></a>
      </div>
      <div class="w3-padding-64 w3-large w3-text-gray" style="font-weight:bold">
        
      </div>
    </nav>

    <!-- Top menu on small screens -->
    <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
      <div class="w3-bar-item w3-wide"><a href="demo.html" class="w3-button">CHECKERVIET</div>
      <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-10 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    </header>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:250px">

      <!-- Push down content on small screens -->
      <div class="w3-hide-large" style="margin-top:83px"></div>

      <!-- Top header -->
      <header class="w3-container w3-xlarge w3-padding-24">
        <p class="w3-left"><?php echo "Detail of Bill: ".$_REQUEST['madon']; ?></p>
        <p class="w3-right">

          

        </p>
      </header>

      <!--Admin-->
      <div class="w3-container  ">
        <div class="row">
          <div class="col-md-10 ">
            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h1 class="panel-title"><?php 
                    $conn=createDBConnection();
                    $sql = "SELECT hoTen FROM khachhang where userKH='".$_REQUEST['userKH']."'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    echo $row['hoTen']; ?></h1>
                  </div>

                </div>
              </div>
              <div class="panel-body">
                <?php
                $sql = "SELECT * FROM chitiethoadon where maDon=".$_REQUEST['madon'];
                if ($result = mysqli_query($conn, $sql)) {

                  if (mysqli_num_rows($result) > 0) {
                ?>
                    <table class="table table-striped table-bordered table-list">
                      <thead>
                        <tr>
                          <th>ID PRODUCT</th>
                          <th>NAME OF PRODUCT</th>
                          <th>QUANTITY</th>
                          <th>PRICE</th>
                          
                        </tr>

                      </thead>
                      <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                          <tr>
                            

                            <td class="hidden-xs"><?php echo $row['maSP'] ?></td>
                            <td><?php echo $row['tenSP'] ?></td>
                            <td><?php echo $row['soluong'] ?></td>
                            <td><?php echo $row['gia'] ?></td>


                          </tr>



                                
              </div>
            </div>
      <?php

                        }
                      }
                    }
      ?>

      </tbody>
      </table>
          </div>


        </div>
      </div>
    </div>
    </div>

    <script>
      // Accordion
      function myAccFunc() {
        var x = document.getElementById("demoAcc");
        if (x.className.indexOf("w3-show") == -1) {
          x.className += " w3-show";
        } else {
          x.className = x.className.replace(" w3-show", "");
        }
      }

      function myAccFunc1() {
        var x = document.getElementById("demoAcc1");
        if (x.className.indexOf("w3-show") == -1) {
          x.className += " w3-show";
        } else {
          x.className = x.className.replace(" w3-show", "");
        }
      }

      // Click on the "Jeans" link on page load to open the accordion for demo purposes
      document.getElementById("myBtn").click();


      // Open and close sidebar
      function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
      }

      function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
      }
    </script>
    <script>
      function myFunction(x) {
        x.classList.toggle("fa-unlock");
      }
    </script>
    <script src="IMGDEMO/jquery-2.1.4.min.js"></script>
  </body>
<?php
} else {
?>

  <body>

    <div class="w3-modal-content" style="max-width:600px">

      <div class="w3-center  "><br>
        <img src="Images/ANHNEN/logocheck.jpg" alt="" width="20%">
      </div>

      <form action='admin.php' method="post" class="w3-container">
        <div class="w3-section">
          <label><b>User name</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter User name" name="admin" required value="checker">
          <label><b>Password</b></label>
          <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="psw" required value="12345">
          <input class="w3-button w3-block w3-black w3-section w3-padding" type="submit" value="Log in">
          <input class="w3-check w3-margin-top " type="checkbox" checked="checked"> Remember me
        </div>
      </form>



    </div>

  </body>
<?php
}
?>


</html>