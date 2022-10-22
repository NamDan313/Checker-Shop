<!DOCTYPE html>
<?php
require_once('login.php');
?>

<?php

if (isset($_POST['Insert'])) {
    $conn = createDbConnection();
    $sql = "select * from sanpham where tenSP='" . $_REQUEST['name'] . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo '<script>alert("This name has existed, add product failed")</script>';
        $result->free_result();
    } else {
        $sql = "select * from sanpham where hinhanhSP='" . $_FILES["myFile"]["name"] . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo '<script>alert("This image has existed, add product failed")</script>';
            $result->free_result();
        } else {
            $sql1 = "select maloaiSP from loaisanpham where loaiSP='" . $_REQUEST['typeSP'] . "'";
            $result = $conn->query($sql1);
            $row = $result->fetch_assoc();
            $maloaiSP = $row['maloaiSP'];
            $pname = $_FILES["myFile"]["name"];
            $tname = $_FILES['myFile']['tmp_name'];
            $uploaddir = "Images/T-shirt/" . $pname;
            move_uploaded_file($tname, $uploaddir);
            $sql = sprintf(
                "INSERT INTO sanpham (maloaiSP,thongtinSP,tenSP,giaSP,hinhanhSP,soluongtonkho) 
                        VALUES ( '%s','%s', '%s', '%s' ,'%s','%s')",
                $maloaiSP,
                $_REQUEST['bio'],
                $_REQUEST['name'],
                $_REQUEST['gia'],
                $pname,
                $_REQUEST['quantitySP']
            );
            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("Insert successfully!")</script>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
           
        }
    }
    
    $conn->close();
}
?>
<?php

if (isset($_POST['Update'])) {
    $conn = createDbConnection();
    $sql = "select * from sanpham where tenSP='" . $_REQUEST['ten'] . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0 && $_REQUEST['ten']!=$_REQUEST['oldname']) {
        echo '<script>alert("This name has existed, update failed")</script>';
        $result->free_result();
    }
    else {
        
    $sql1 = "select maloaiSP from loaisanpham where loaiSP='" . $_REQUEST['loaiSP'] . "'";
    $result = $conn->query($sql1);
    $row = $result->fetch_assoc();
    $maloaiSP = $row['maloaiSP'];
    if ($_FILES["hinh"]["name"] != "") {
        $sql = "select * from sanpham where hinhanhSP='" . $_FILES["hinh"]["name"] . "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo '<script>alert("This image has existed, update failed")</script>';
            $result->free_result();
        } 
        else{
            $pname = $_FILES["hinh"]["name"];
        $tname = $_FILES['hinh']['tmp_name'];
        $_REQUEST['imagehere1'] = $pname;
        $uploaddir = "Images/T-shirt/" . $pname;
        move_uploaded_file($tname, $uploaddir);
        $sql = sprintf(
            "UPDATE sanpham 
                SET tenSP = '%s', giaSP='%s', hinhanhSP='%s', thongtinSP='%s' ,maloaiSP='%s',soluongtonkho='%s'
                WHERE tenSP = '%s'",
            $_REQUEST['ten'],
            $_REQUEST['gia1'],
            $_REQUEST['imagehere1'],
            $_REQUEST['mota'],
            $maloaiSP,
            $_REQUEST['soluongSP'],
            $_REQUEST['oldname']
        );
        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Update successfully!")</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        }
        
    } else {
        $sql = sprintf(
            "UPDATE sanpham 
                SET tenSP = '%s', giaSP='%s', thongtinSP='%s' ,maloaiSP='%s',soluongtonkho='%s'
                WHERE tenSP = '%s'",
            $_REQUEST['ten'],
            $_REQUEST['gia1'],
            $_REQUEST['mota'],
            $maloaiSP,
            $_REQUEST['soluongSP'],
            $_REQUEST['oldname']
        );
        var_dump($sql);
        if ($conn->query($sql) === TRUE) {
            echo "The record updated successfully";
            header("Location:Productmanagement.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
}
?>
<?php
if (isset($_REQUEST['Delete'])) {
    $conn = createDbConnection();
    $sql = sprintf("DELETE FROM sanpham  WHERE tenSP = '%s'", $_REQUEST['ten']);
    var_dump($sql);
    if ($conn->query($sql) === TRUE) {
        echo "Deleted successfully";
        header("Location:Productmanagement.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<html>
<title>CHECKERVIET</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="SOURCE.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-------------- Paging--------------->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script src="admin.js"></script>

<style>
    .w3-sidebar a {
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

    /* Paging */
    .pagination>li>a {
        background-color: white;
        color: black
    }

    .page-item.active .page-link {
        background-color: black;
        border-color: black
    }

    .pagination>li>a:focus,
    .pagination>li>a:hover,
    .pagination>li>span:focus,
    .pagination>li>span:hover {
        color: red;
        background-color: #eee;
        border-color: #ddd;
    }

    .pagination>.active>a {
        color: white;
        background-color: black;
        border: solid 1px black;
    }

    .pagination>.active>a:hover {
        background-color: black;
        border: solid 1px black;
    }
</style>
<?php
if (isLoginedAdmin()) {
?>

    <body class="w3-content" style="max-width:1200px">

        <!-- Sidebar/menu -->
        <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
            <div class="w3-container w3-display-container w3-padding-16">
                <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
                <a href="#"><img src="Images/ANHNEN/logocheck.jpg" alt="LOGO" width="40%"></a>
            </div>
            <div class="w3-padding-64 w3-large w3-text-gray" style="font-weight:bold">
                <a href="admin.php" class="w3-button w3-block w3-white w3-left-align">Bill management</a>
                <a href="T-shirt.php" class="w3-bar-item w3-button w3-light-grey">Product management</a>
            </div>

        </nav>

        <!-- Top menu on small screens -->
        <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
            <div class="w3-bar-item w3-padding-24 w3-wide"><a href="#" class="w3-button">CHECKERVIET</div>
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
        </header>

        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:250px">

            <!-- Push down content on small screens -->
            <div class="w3-hide-large" style="margin-top:83px"></div>

            <!-- Top header -->
            <header class="w3-container w3-xlarge w3-padding-24">
                <p class="w3-left">Hi admin</p>
                <p class="w3-right">

                    <!-- Log out icon -->
                    <a href="logoutadmin.php" class="w3-bar-item w3-button  w3-right">
                        <i class="fa fa-sign-out  "></i>
                    </a>

            </header>

            <!--Add button-->
            <div class="col col-xs-6 text-right">
                <button type="button" class="btn btn-sm btn-primary btn-create " id="nutthemsanpham" onclick="document.getElementById('themsp').style.display='block',themsp()">&#43; Add
                    product</a></button>
            </div>

            <br>



            <!--insert product-->
            <div id="themsp" class="w3-modal">
                <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

                    <div class="w3-center"><br>
                        <span onclick="document.getElementById('themsp').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>

                    </div>

                    <form class="w3-container" id="f7" action="Productmanagement.php" method="post" onsubmit="" enctype="multipart/form-data">
                        <ul>
                            <li>
                                <b><label for="name">Enter name of product</label></b>
                                <input class="w3-input w3-input w3-border w3-margin-bottom " type="text" id="tenSP" name="name" maxlength="100" required>
                            </li>
                            <li>
                                <b><label for="email">Enter price of product</label></b>
                                <input class="w3-input w3-input w3-border w3-margin-bottom " type="number" id="giaSP" name="gia" maxlength="100" required>
                            </li>
                            <li>
                                <b><label for="url">New image</label></b><br>
                                <input class="w3-margin-bottom " type="file" name="myFile" id="myFile" onchange="return fileValidation()" required>
                                <img src="" alt="" style="width:100px" id="imagehere">
                            </li>
                            <li>
                                <b><label for="bio">Description</label></b>
                                <textarea class="w3-input w3-input w3-border w3-margin-bottom " id="bioo" name="bio" onkeyup="adjust_textarea(this)" ></textarea>
                            </li>
                            <li>
                                <b><label for="bio">Type of product</label></b>
                                <select name="typeSP" style="width: 120px;height: 30px;" required>
                                    <option value="tee">T-shirt</option>
                                    <option value="hoodie">Hoodie</option>
                                    <option value="sweater">Sweater</option>
                                    <option value="jacket">Jacket </option>
                                </select>
                            </li>
                            <li>
                                <b><label for="bio">Quantity of product</label></b>
                                <input class="w3-input w3-input w3-border w3-margin-bottom " type="number" maxlength="100" name="quantitySP" required>
                            </li>
                            <li>
                                <input type="submit" value="Insert" name="Insert" onclick="them()">
                            </li>
                        </ul>
                    </form>

                </div>
            </div>
            <!--Fix product-->
            <div id="suasp" class="w3-modal">
                <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

                    <div class="w3-center"><br>
                        <span onclick="document.getElementById('suasp').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>

                    </div>

                    <form class="w3-container " id="f77" action="Productmanagement.php" method="post" enctype="multipart/form-data">
                        <ul>
                            <input type="hidden" id="oldname" name="oldname" required>
                            <li>

                                <b><label>Name:</label></b>

                                <input class="w3-input w3-input w3-border w3-margin-bottom " id="ten" name="ten" type="text" maxlength="100" required>
                            </li>
                            <li>
                                <b><label>Price:</label></b>

                                <input class="w3-input w3-input w3-border w3-margin-bottom " id="gia1" name="gia1" type="number" maxlength="100" required>

                            </li>
                            <li>
                                <b><span>Image:</span></b> <br>
                                <input class="w3-margin-bottom " id="hinh" name="hinh" type="file" onchange="return fileValidation1()">
                                <img src="" alt="" style="width:100px" id="imagehere1">
                            </li>


                            <li>
                                <b><label>Description</label></b>

                                <textarea class="w3-input w3-input w3-border w3-margin-bottom " id="mota" name="mota" onkeyup="adjust_textarea(this)" ></textarea>

                            </li>
                            <li>
                                <b><label for="bio">Type of product</label></b>
                                <select name="loaiSP" id="loaiSP" style="width: 120px;height: 30px;" required>
                                    <option value="tee">T-shirt</option>
                                    <option value="hoodie">Hoodie</option>
                                    <option value="sweater">Sweater</option>
                                    <option value="jacket">Jacket </option>
                                </select>
                            </li>
                            <li>
                                <b><label for="bio">Quantity of product</label></b>
                                <input class="w3-input w3-input w3-border w3-margin-bottom " type="number" maxlength="100" name="soluongSP" id="soluongSP" required>
                            </li>
                            <li>
                                <input type="submit" value="Update" name="Update" onclick="capnhat()">
                                <input type="submit" name="Delete" onclick="return xoasp()" value="Delete">
                            </li>
                    </form>

                </div>
            </div>
            <!-------------- Phan trang--------------->
            <?php
            $conn = createDbConnection();
            // BƯỚC 2: TÌM TỔNG SỐ RECORDS
            $result = mysqli_query($conn, 'select count(*) as total from sanpham');
            $row = mysqli_fetch_assoc($result);
            $total_records = $row['total'];
            // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 8;
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
            $result = mysqli_query($conn, "SELECT * FROM sanpham LIMIT $start, $limit");
            ?>

            <div class="w3-row w3-whitescale">
                <?php
                $conn = createDBConnection();
                if ($result = mysqli_query($conn, "SELECT * FROM sanpham LIMIT $start, $limit")) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $sql1 = "SELECT loaiSP FROM loaisanpham WHERE maloaiSP='" . $row['maloaiSP'] . "'";
                        $result1 = $conn->query($sql1);
                        $row1 = $result1->fetch_assoc();
                ?>

                        <div class="w3-col l3 s6">
                            <div class="w3-container">
                                <div class="w3-display-container">
                                    <img src="Images/T-shirt/<?= $row['hinhanhSP'] ?>" style="width:200px">
                                    <span class="w3-tag w3-display-topleft">New</span>
                                </div>
                                <p><?= $row['tenSP'] ?><br><b>$ <?= $row['giaSP'] ?></b></p>
                                <a href="javascript:void(0)" class="w3-bar-item w3-left  " onclick="w3_open()">
                                    <p><button onclick="document.getElementById('suasp').style.display='block',suasp('<?= $row['tenSP'] ?>','<?= $row['giaSP'] ?>','Images/T-shirt/<?= $row['hinhanhSP'] ?>','<?= $row['thongtinSP'] ?>','<?= $row1['loaiSP'] ?>','<?= $row['soluongtonkho'] ?>')">Update and Delete
                                        </button>
                                    </p>
                                </a>

                            </div>
                        </div>

                <?php
                    }
                }
                ?>
            </div>
            <div class="w3-bar w3-center ">
                <?php
                // PHẦN HIỂN THỊ PHÂN TRANG
                // BƯỚC 7: HIỂN THỊ PHÂN TRANG

                // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                if ($current_page > 1 && $total_page > 1) {
                    echo '<a href="Productmanagement.php?page=' . ($current_page - 1) . '">Prev</a> | ';
                }

                // Lặp khoảng giữa
                for ($i = 1; $i <= $total_page; $i++) {
                    // Nếu là trang hiện tại thì hiển thị thẻ span
                    // ngược lại hiển thị thẻ a
                    if ($i == $current_page) {
                        echo '<span>' . $i . '</span> | ';
                    } else {
                        echo '<a href="Productmanagement.php?page=' . $i . '">' . $i . '</a> | ';
                    }
                }

                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                if ($current_page < $total_page && $total_page > 1) {
                    echo '<a href="Productmanagement.php?page=' . ($current_page + 1) . '">Next</a> | ';
                }
                ?>
            </div>
            <!-------------- Phan trang--------------->
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
                                <p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required>
                                </p>
                                <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required>
                                </p>
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

            <script src="IMGDEMO/jquery-2.1.4.min.js"></script>
    </body>
<?php } ?>

</html>