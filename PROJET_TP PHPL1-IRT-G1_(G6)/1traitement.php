<?php
    require_once('connexion.php');

    $req= sprintf("insert into exoauthent values(Null,'%s','%d','%s')",
    mysqli_real_escape_string($link,$_REQUEST['login']),
    md5(mysqli_real_escape_string($link,$_REQUEST['password'])),
    mysqli_real_escape_string($link, $_REQUEST['email']));


    $result=mysqli_query($link,$req);
    header('location:1verif.php')
?>
 