<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dct119c2";
$con = new mysqli($servername, $username, $password, $dbname);
$sql="UPDATE donhang set tinhtrang='Da xu ly' where maDon=".$_REQUEST['madon'];
$result=$con->query($sql);
$con->close();


?>