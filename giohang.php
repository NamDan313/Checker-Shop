<?php

session_start();
if(isset($_REQUEST['ten'])){
    $soluongSP = $_REQUEST['soluongSP'];
    $_SESSION['soluongSP'] = $soluongSP;
    for ($i = 0; $i < $soluongSP; $i++) {
        if (!isset($_SESSION['cart']['ten'][$i]) && $_SESSION['cart']['ten'][$i]!=$_REQUEST['ten']) {
            $_SESSION['cart']['ten'][$i] = $_REQUEST['ten'];
            $_SESSION['cart']['hinhanh'][$i] = $_REQUEST['hinhanh'];
            $_SESSION['cart']['gia'][$i] = $_REQUEST['gia'];
            $_SESSION['cart']['soluongtonkho'][$i]=$_REQUEST['soluongtonkho'];
        }
    }
}
if(isset($_REQUEST['tenxoa'])){
    for ($i = 0; $i < $_SESSION['soluongSP']; $i++) {
        if ($_SESSION['cart']['ten'][$i]==$_REQUEST['tenxoa']) {;
            $_SESSION['cart']['ten'][$i]=$_SESSION['cart']['ten'][$_SESSION['soluongSP']-1];
            $_SESSION['cart']['hinhanh'][$i]=$_SESSION['cart']['hinhanh'][$_SESSION['soluongSP']-1];
            $_SESSION['cart']['gia'][$i]=$_SESSION['cart']['gia'][$_SESSION['soluongSP']-1];
            $_SESSION['cart']['soluongtonkho'][$i]=$_SESSION['cart']['soluongtonkho'][$_SESSION['soluongSP']-1];
            unset($_SESSION['cart']['ten'][$_SESSION['soluongSP']-1]) ;
            unset($_SESSION['cart']['hinhanh'][$_SESSION['soluongSP']-1]);
            unset($_SESSION['cart']['gia'][$_SESSION['soluongSP']-1]);
            unset($_SESSION['cart']['soluongtonkho'][$_SESSION['soluongSP']-1]);
            $_SESSION['soluongSP']--;
            return;
        }
    }
}
exit();
?>

