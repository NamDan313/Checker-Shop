<?php

function Register($username,$password,$repassword,$sdt,$hoten){
     $con = createDBConnection();
     
       $sql = sprintf("INSERT INTO khachhang
                    VALUES ('%s', '%s', '%s', '%s')", $username , $password,$sdt,$hoten);
       if(!$con->query($sql)){
          echo '<script type="text/javascript">alert("Username has existed")</script>' ;
       }
      echo '<script type="text/javascript">alert("Sign up successfully")</script>' ;
     }


?>