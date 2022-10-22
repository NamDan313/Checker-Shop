<!DOCTYPE html>
<?php
require('login.php');
if (isset($_POST['username'])) {
    if(login($_POST['username'], $_POST['psw'])==""){
        echo '<script>alert("Wrong password")</script>';
    } 
    else{
        echo '<script>alert("Login successfully")</script>';
    }
}
?>
<?php
require('register_submit.php');
if (isset($_POST["username1"])) {
  Register($_POST["username1"], $_POST["psw1"], $_POST["repsw"], $_POST["phone"], $_POST["fullname"]);
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
<script src="index.js"></script>
<style>
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
    width: 50px;
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
</style>

<body class="w3-content" style="max-width:1200px" onload="reloadgiohang()">

  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
    <div class="w3-container w3-display-container w3-padding-16">
      <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
      <a href="index.php"><img src="Images/ANHNEN/logocheck.jpg" alt="LOGO" width="40%"></a>
    </div>
    <div class="w3-padding-64 w3-large w3-text-gray" style="font-weight:bold">

      <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align">
        Shirt <i class="fa fa-caret-down"></i>
      </a>
      <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
        <a href="T-shirt.php" class="w3-bar-item w3-button">T-Shirt</a>
        <a href="#" class="w3-bar-item w3-button">Hoodie</a>
        <a href="#" class="w3-bar-item w3-button">Sweater</a>
        <a href="Jacket.php" class="w3-bar-item w3-button">Jackets</a>
      </div>

      <a onclick="myAccFunc1()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align">
        Item <i class="fa fa-caret-down"></i>
      </a>
      <div id="demoAcc1" class="w3-bar-block w3-hide w3-padding-large w3-medium">
        <a href="#" class="w3-bar-item w3-button">Chain</a>
        <a href="#" class="w3-bar-item w3-button">Socks</a>
        <a href="#" class="w3-bar-item w3-button">Wallet</a>
      </div>

      <a href="#" class="w3-bar-item w3-white w3-button ">Pants</a>

    </div>
    <a href="#footer" class="w3-bar-item w3-button w3-padding">Contact</a>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newsletter').style.display='block'">Newsletter</a>
    <a href="#footer" class="w3-bar-item w3-button w3-padding">Subscribe</a>
  </nav>

  <!-- Top menu on small screens -->
  <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
    <div class="w3-bar-item w3-wide"><a href="index.php" class="w3-button">CHECKERVIET</div>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-10 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
  </header>

  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:250px">

    <!-- Push down content on small screens -->
    <div class="w3-hide-large" style="margin-top:83px"></div>

    <!-- Top header -->

    <header class="w3-container w3-xlarge">
      <p class="w3-left"><?= isLogined() ? 'Hi, ' . $_SESSION['username'] : 'Welcome' ?>


      <p class="w3-right ">

        <!-- Account icon -->
        <?php
        if (!isLogined()) {
        ?>
          <a href="javascript:void(0)" class="w3-bar-item w3-button  w3-right" onclick="w3_open()">
            <i onclick="document.getElementById('id01').style.display='block'" class="fa fa-user "></i>
          </a>
        <?php } else { ?>
          <a href="logout.php" class="w3-bar-item w3-button  w3-right" onclick="w3_open()">
            <i class="fa fa-sign-out "></i>
          </a>
        <?php
        }
        ?>


        <!-- Shopping icon -->
        <a href="javascript:void(0)" class="w3-bar-item w3-button  w3-right" onclick="w3_open()">
          <i onclick="document.getElementById('shoppingcart').style.display='block'" class="fa fa-shopping-cart "></i>
        </a>
        <!-- Find icon -->
      <form name="fromTim" method="GET" action="Search.php">
        <!-- Bottom Bar Start -->
        <div class="w3-bar-item  bottom-bar">
          <div class="w3-modal-find w3-padding-32 w3-right">
            <div class="search" class="w3-container  ">
              <button class="w3-bar-item w3-button  w3-right fa fa-search" type="submit" name="timkiem"></button>
              <input type="text" name="tukhoa" placeholder="Search for names.." title="Type in a name" id="find" required>
            </div>
          </div>
        </div>
      </form>
      </p>
      <div class=" " style="padding-top: 64px;padding-bottom: 32px;">
        Price
        <select name="price" id="price2" style="width: 125px;height: 40px;" onchange="reload1()">
          <option value="***"></option>
          <option value="000-099">0-99 </option>
          <option value="100-199">100-199</option>
          <option value="200-299">200-299</option>
          <option value="300">>300 </option>
        </select>
      </div>
      <script>
        <?php if (isset($_REQUEST['from'])) {

        ?>
          var price = "<?= $_REQUEST['from'] ?>" + '-' + "<?= $_REQUEST['to'] ?>";
          let element = document.getElementById("price2");
          console.log(price);
          element.value = price;
        <?php
        }
        ?>

        function reload1() {
          var pri = document.getElementById("price2");
          var valueprice = pri.value;
          var from = valueprice.substr(0, 3)
          var to1 = valueprice.substr(4, 3)

          window.location.href = "jacket.php?from=" + from + "&to=" + to1
        }
      </script>


      <!-- Bottom Bar End -->
      <!-- Shopping -->
      <div id="shoppingcart" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width: 900px">

          <div class="w3-container w3-padding-16 w3-light-grey">
            <span class=" cart-header ">Cart</span>
            <span onclick="document.getElementById('shoppingcart').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
          </div>

          <div class="cart-row w3-container">
            <span class="cart-item cart-header cart-column">Items</span>
            <span class="cart-price cart-header cart-column">Price</span>
            <span class="cart-quantity cart-header cart-column">Quantity</span>
          </div>

          <div class="cart-items w3-container">



          </div>
          <div class="cart-total">
            <strong class="cart-total-title">Total Price: $</strong>
            <span class="cart-total-price" id="price"></span>
          </div>
          <div class="w3-container w3-border-top w3-padding-24 ">
            <button onclick="<?= isLogined() ? "thanhtoan(document.getElementById('price').innerHTML)" : "document.getElementById('id01').style.display='block'" ?>" type="button" class="w3-button w3-red w3-transparent w3-right">Buy</button>
          </div>

        </div>
      </div>

      <!-- Account -->
      <!--login-->

      <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

          <div class="w3-center"><br>
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
            <h1>Log in</h1>
          </div>

          <form action='jacket.php' method="post" class="w3-container">
            <div class="w3-section">
              <label><b>User name</b></label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter User name" name="username" required value="checker">
              <label><b>Password</b></label>
              <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="psw" required value="12345">
              <input class="w3-button w3-block w3-black w3-section w3-padding" type="submit" value="Log in">
              <a class="w3-button w3-block w3-gray w3-section w3-padding" onclick="document.getElementById('id02').style.display='block'">Sign up</a>
              <input class="w3-check w3-margin-top " type="checkbox" checked="checked"> Remember me
            </div>
          </form>

          <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
            <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-grey">Cancel</button>
            <span class="w3-right w3-padding w3-hide-small">Forgot <a href="#">password?</a></span>
          </div>

        </div>
      </div>

       <!--Sign up-->
       <div id="id02" class="w3-modal w3-padding-24">
                <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

                    <div class="w3-center"><br>
                        <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                        <h1>Create account</h1>
                    </div>

                    <form class="w3-container" action="index.php" method="POST" name="signup" onsubmit="return kiemTraDuLieu()">
                        <div class="w3-section">

                            <label><b>Full name</b></label>
                            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Full name" name="fullname" required>
                            <label><b>Phone number</b></label>
                            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Phone number" name="phone" required>

                            <label><b>Sex: </b></label>
                            Male <input class="" type="radio" name="radsex" required>
                            Female <input class="" type="radio" name="radsex" required>

                            <br>

                            <label><b>Birthday:</b></label>
                            <input type="date" name="bday">

                            <br>
                            <label><b>Email:</b></label>
                            <br>
                            <input class="w3-input w3-border w3-margin-bottom" type="email" name="useremail" placeholder="Enter email">
                            <label><b>User name</b></label>
                            <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter User name" name="username1" required>
                            <label><b>Password</b></label>
                            <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Enter Password" name="psw1" id="psw1" required>
                            <label><b>Confirm password</b></label>
                            <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Confirm Password" name="repsw" id="repsw" required>

                        </div>


                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                            <button onclick="document.getElementById('id02').style.display='none',document.getElementById('price1').innerHTML=document.getElementById('price').innerHTML " type="button" class="w3-button w3-grey">Cancel</button>
                            <input class="w3-button  w3-black w3-right" name="submit" value="Submit" href="#" type="Submit" onclick="">
                        </div>

                </div>
                </form>
            </div>

            <!--check out-->
            <div id="checkout" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

          <div class="w3-center"><br>
            <span onclick="document.getElementById('checkout').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
            <h1>Checkout</h1>
          </div>
          <?php
          $con = createDBConnection();
          $sql = "SELECT * FROM khachhang WHERE userKH='" . $_SESSION['username'] . "'";
          $result = $con->query($sql);
          $row = $result->fetch_assoc()
          ?>
          <form class="w3-container">
            <div class="w3-section">
              <label><b>Full name</b></label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" value="<?= $row['hoTen'] ?>" name="adress" required disabled>
              <label><b>Phone number</b></label>
              <input class="w3-input w3-border w3-margin-bottom" type="tel" value="<?= $row['sdt'] ?>" name="tel" required disabled>
              <label><b>Adress</b></label>
              <input class="w3-input w3-border w3-margin-bottom" type="email" name="useraddress" id="useraddress" placeholder="Enter Adress" required>
              <label><b>Nation</b></label>
              <select name="nation">
                <option value="">Vietnam</option>
                <option value="">USA</option>
                <option value="">UK</option>
                <option value="">Spain</option>
              </select>
              <br>
              <label><b>Payments</b></label>
              <select name="nation">
                <option value="">Credit card</option>
                <option value="">Cash</option>
              </select>
            </div>
          </form>
          <div class="cart-total">
            <strong class="cart-total-title">Total Price: $</strong>
            <strong class="cart-total-price" id="price1"></strong>
          </div>

          <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
            <button onclick="document.getElementById('checkout').style.display='none'" type="button" class="w3-button w3-grey">Cancel</button>
            <button class="w3-button w3-red w3-right" name="Confirm" onclick="xulythanhtoan('<?= $_SESSION['username'] ?>')">Confirm</button>
          </div>

        </div>
      </div>
    </header>



    <script>
      var slideIndex = 0;
      showSlides();

      function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
          slideIndex = 1
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
      }
    </script>

    <div class="w3-container w3-text-grey" id="jeans">

    </div>


    <!-------------- Phan trang--------------->
    <?php
    $conn = createDbConnection();

    if (isset($_REQUEST['from'])) {
      $_SESSION['from'] = $_REQUEST['from'];
      $_SESSION['to'] = $_REQUEST['to'];
      if ($_SESSION['from'] == "***") {
        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
        $result = mysqli_query($conn, 'select count(*) as total from sanpham where maloaisp = 2');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 4;
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page) {
          $current_page = $total_page;
        } else if ($current_page < 1) {
          $current_page = 1;
        }

        // Tìm Start
        $start = ($current_page - 1) * $limit;

        // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách sản phẩm
        $result = mysqli_query($conn, "SELECT * FROM sanpham  where maloaisp = 2 LIMIT $start, $limit");
      } else if ($_SESSION['from'] == 300) {
        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
        $result = mysqli_query($conn, 'select count(*) as total from sanpham where maloaisp = 2 && giasp>=300');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 4;
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page) {
          $current_page = $total_page;
        } else if ($current_page < 1) {
          $current_page = 1;
        }

        // Tìm Start
        $start = ($current_page - 1) * $limit;

        // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách sản phẩm
        $result = mysqli_query($conn, "SELECT * FROM sanpham  where maloaisp = 2 && GIASP>=" .  $_SESSION['from'] . " LIMIT " . $start . "," . $limit);
      } else {
        // BƯỚC 2: TÌM TỔNG SỐ RECORDS
        $result = mysqli_query($conn, 'select count(*) as total from sanpham where maloaisp = 2 && giasp>=' .  $_SESSION['from'] . ' && GIASP<= ' . $_SESSION['to']);
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 4;
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page) {
          $current_page = $total_page;
        } else if ($current_page < 1) {
          $current_page = 1;
        }

        // Tìm Start
        $start = ($current_page - 1) * $limit;

        // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách sản phẩm
        $result = mysqli_query($conn, "SELECT * FROM sanpham  where maloaisp = 2 && GIASP>=" .  $_SESSION['from'] . " && GIASP<= " . $_SESSION['to'] . " LIMIT " . $start . "," . $limit);
      }
    } else {
      // BƯỚC 2: TÌM TỔNG SỐ RECORDS
      $result = mysqli_query($conn, 'select count(*) as total from sanpham where maloaisp = 2');
      $row = mysqli_fetch_assoc($result);
      $total_records = $row['total'];
      // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
      $limit = 4;
      // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
      // tổng số trang
      $total_page = ceil($total_records / $limit);
      // Giới hạn current_page trong khoảng 1 đến total_page
      if ($current_page > $total_page) {
        $current_page = $total_page;
      } else if ($current_page < 1) {
        $current_page = 1;
      }

      // Tìm Start
      $start = ($current_page - 1) * $limit;

      // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
      // Có limit và start rồi thì truy vấn CSDL lấy danh sách sản phẩm
      $result = mysqli_query($conn, "SELECT * FROM sanpham  where maloaisp = 2 LIMIT $start, $limit");
    }


    ?>

    <!-- Product grid -->
    <div class="w3-row w3-whitescale" id="myTable">
      <?php
      $conn = createDBConnection();
      if ($result) {
        while ($row = $result->fetch_assoc()) {

      ?>

          <div class="w3-col l3 s6">
            <div class="w3-container">
              <div class="w3-display-container">
                <img src="Images/T-shirt/<?= $row['hinhanhSP'] ?>" style="width:100%">
                <span class="w3-tag w3-display-topleft">Sale</span>
                <div class="w3-display-middle w3-display-hover">
                  <a href="javascript:void(0)" class="w3-bar-item  w3-right w3-white" onclick="showdetail('<?= $row['tenSP'] ?>','<?= $row['giaSP'] ?>','Images/T-shirt/<?= $row['hinhanhSP'] ?>','<?= $row['thongtinSP'] ?>','<?= $row['soluongtonkho'] ?>')">
                    <button class="w3-button w3-black"> Detail <i class=" fa fa-info-circle"></i></button>
                  </a>
                </div>
              </div>
              <p><?= $row['tenSP'] ?> <br><b>$<?= $row['giaSP'] ?></b></p>
            </div>
          </div>
          <!--BXD - ALEX OVERPRINT TEES/BLACK detail-->
          <div id="detail5" class="w3-modal  ">
            <div class="w3-modal-content  w3-card-4 w3-animate-zoom" style="max-width: 900px">

              <div class="w3-container w3-padding-16 w3-light-grey">
                <span class=" cart-header " id='ten'></span>
                <span onclick="document.getElementById('detail5').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
              </div>

              <div class="cart-row w3-container">
                <span class="cart-item cart-header cart-column">Items</span>
                <span class="cart-quantity cart-header cart-column">Infor</span>
              </div>

              <div class="cart-items w3-container">

                <div class="cart-row">

                  <div class="cart-item cart-column">
                    <img class="cart-item-image1" id='hinh' width="400" height="400">
                  </div>
                  <div class="cart-quantity cart-column">
                    <p id='mota'></p>

                  </div>

                </div>


                <div class="cart-total">
                  <strong class="cart-total-title">Price: $</strong>
                  <strong class="cart-total-price" id='gia1'></strong>
                  <div class="w3-left">
                    <strong class="cart-total-title">Size</strong>
                    <select name="size" id="" style="width: 80px;height: 50px;">
                      <option value="">S</option>
                      <option value="">M</option>
                      <option value="">L</option>
                      <option value="">XL</option>
                      <option value="">XXL</option>
                    </select>
                    <strong class="cart-total-title">Quantity of product:</strong>
                    <strong class="cart-total-title w3-text-red" id="sl"></strong>


                    </select>
                  </div>

                </div>


              </div>

              <div class="w3-container w3-border-top w3-padding-24 ">
                <button class="w3-button w3-red w3-transparent w3-right" onclick="<?= LogCard() ?>">Add to cart <i class="fa fa-shopping-cart"></i></button>
              </div>

            </div>
          </div>
        <?php } ?>




        <div class="w3-bar w3-center ">
          <?php
          // PHẦN HIỂN THỊ PHÂN TRANG
          // BƯỚC 7: HIỂN THỊ PHÂN TRANG
          // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
          if (isset($_REQUEST['from'])) {
            if ($current_page > 1 && $total_page > 1) {
              echo '<a href="jacket.php?page=' . ($current_page - 1) . '&from=' . $_SESSION['from'] . '&to=' . $_SESSION['to']  . '">Prev</a> | ';
            }

            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++) {
              // Nếu là trang hiện tại thì hiển thị thẻ span
              // ngược lại hiển thị thẻ a
              if ($i == $current_page) {
                echo '<span>' . $i . '</span> | ';
              } else {
                echo '<a href="jacket.php?page=' . $i . '&from=' . $_SESSION['from'] . '&to=' . $_SESSION['to'] . '">' . $i . '</a> | ';
              }
            }

            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1) {
              echo '<a href="jacket.php?page=' . ($current_page + 1) . '&from=' . $_SESSION['from'] . '&to=' . $_SESSION['to'] . '">Next</a> | ';
            }
          } else {
            if ($current_page > 1 && $total_page > 1) {
              echo '<a href="jacket.php?page=' . ($current_page - 1) . '">Prev</a> | ';
            }

            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++) {
              // Nếu là trang hiện tại thì hiển thị thẻ span
              // ngược lại hiển thị thẻ a
              if ($i == $current_page) {
                echo '<span>' . $i . '</span> | ';
              } else {
                echo '<a href="jacket.php?page=' . $i . '">' . $i . '</a> | ';
              }
            }

            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1) {
              echo '<a href="jacket.php?page=' . ($current_page + 1) . '">Next</a> | ';
            }
          }

          ?>
        </div>
      <?php } else {
        echo "
        <p style='padding-left: 15px'>Product was not found</p>";
      }
      ?>
    </div>
    <div class="w3-container">



      <!-- Subscribe section -->
      <div class="w3-container w3-black w3-padding-32">
        <h1>Subscribe</h1>
        <p>To get special offers and VIP treatment:</p>
        <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail" style="width:100%"></p>
        <button type="button" class="w3-button w3-red w3-margin-bottom">Subscribe</button>
      </div>

      <!-- Footer -->
      <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
        <div class="w3-row-padding">
          <div class="w3-col s4">
            <h4>Contact</h4>
            <p>Questions? Go ahead.</p>
            <form action="/action_page.php" target="_blank">
              <p><input class="w3-input w3-border" type="text" placeholder="Name" name="Name" required></p>
              <p><input class="w3-input w3-border" type="text" placeholder="Email" name="Email" required></p>
              <p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required></p>
              <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required></p>
              <button type="submit" class="w3-button w3-block w3-black">Send</button>
            </form>
          </div>

          <div class="w3-col s4">
            <h4>About</h4>
            <p><a href="#">About us</a></p>
            <p><a href="#">We're hiring</a></p>
            <p><a href="#">Support</a></p>
            <p><a href="#">Find store</a></p>
            <p><a href="#">Shipment</a></p>
            <p><a href="#">Payment</a></p>
            <p><a href="#">Gift card</a></p>
            <p><a href="#">Return</a></p>
            <p><a href="#">Help</a></p>
          </div>

          <div class="w3-col s4 w3-justify">
            <h4>Store</h4>
            <p><i class="fa fa-fw fa-map-marker"></i> Company Name</p>
            <p><i class="fa fa-fw fa-phone"></i> 0044123123</p>
            <p><i class="fa fa-fw fa-envelope"></i> ex@mail.com</p>
            <h4>We accept</h4>
            <p><i class="fa fa-fw fa-cc-amex"></i> Amex</p>
            <p><i class="fa fa-fw fa-credit-card"></i> Credit Card</p>
            <br>
            <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
            <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
            <i class="fa fa-snapchat w3-hover-opacity w3-large"></i>
            <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i>
            <i class="fa fa-twitter w3-hover-opacity w3-large"></i>
            <i class="fa fa-linkedin w3-hover-opacity w3-large"></i>
          </div>
        </div>
      </footer>

      <div class="w3-black w3-center w3-padding-24">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a></div>

      <!-- End page content -->
    </div>

    <!-- Newsletter Modal -->
    <div id="newsletter" class="w3-modal">
      <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
        <div class="w3-container w3-white w3-center">
          <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
          <h2 class="w3-wide">NEWSLETTER</h2>
          <p>Join our mailing list to receive updates on new arrivals and special offers.</p>
          <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
          <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('newsletter').style.display='none'">Subscribe</button>
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
      function reloadgiohang() {
        var ten = [];
        var hinh = [];
        var gia = [];
        var soluong = [];
        ten = <?php echo json_encode($_SESSION['cart']['ten']); ?>;
        hinh = <?php echo json_encode($_SESSION['cart']['hinhanh']); ?>;
        gia = <?php echo json_encode($_SESSION['cart']['gia']); ?>;
        soluong = <?php echo json_encode($_SESSION['cart']['soluongtonkho']); ?>;
        for (var i = 0; i < ten.length; i++) {
          reload(ten[i], gia[i], hinh[i], soluong[i])
        }
      }
    </script>
    <script src="IMGDEMO/jquery-2.1.4.min.js"></script>
</body>

</html>