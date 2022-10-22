<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dct119c2";
$con = new mysqli($servername, $username, $password, $dbname);
$sql = sprintf(
    "INSERT INTO donhang(giaDon,soluongMua,tinhtrang,ngaydat,userKH,diachinhan) VALUES ('%s','%s','Chua xu ly','%s','%s','%s')",
    $_REQUEST['totalprice'],
    $_REQUEST['soluongSP'],
    date('Y-m-d'),
    $_REQUEST['userKH'],
    $_REQUEST['diachi']
);
$soluongSP = $_REQUEST['soluongSP'];
$con->query($sql);
//khoi tao mang
$data = [
    'ten' => array(),
    'hinhanh' => array(),
    'soluong' => array(),
    'gia' => array()
];
//them san pham vao mang
for ($i = 0; $i < $soluongSP; $i++) {
    $ten = "ten".$i;
    $hinhanh = "hinhanh".$i;
    $soluong = "soluong".$i;
    $gia = "gia".$i;
    $data['ten'][$i]= $_REQUEST[$ten];
    $data['hinhanh'][$i]= $_REQUEST[$hinhanh];
    $data['soluong'][$i]= $_REQUEST[$soluong];
    $data['gia'][$i]= $_REQUEST[$gia];
}
var_dump($data);
//them vao database
for ($i = 0; $i < $soluongSP; $i++) {
    $sql = sprintf("SELECT maSP FROM sanpham WHERE tenSP='%s'", $data['ten'][$i]);
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    $masp = $row['maSP'];
    $sql = sprintf("SELECT maDon FROM donhang 
                    ORDER BY maDon DESC 
                     LIMIT 1;");
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    $madon=$row['maDon'];
    $sql = sprintf(
        "INSERT INTO chitiethoadon(maDon,maSP,tenSP,userKH,soluong,gia) VALUES ('%s','%s','%s','%s','%s','%s')",
        $madon,
        $masp,
        $data['ten'][$i],
        $_REQUEST['userKH'],
        $data['soluong'][$i],
        $data['gia'][$i]
    );
    $con->query($sql);
    $sql = sprintf("UPDATE sanpham set soluongtonkho=soluongtonkho-'%s' WHERE tenSP='%s'",$data['soluong'][$i], $data['ten'][$i]);
    $con->query($sql);        
}
unset($_SESSION['cart']);
$con->close();
?>
