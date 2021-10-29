<?php 
$u=$_POST['username'];
$p=$_POST['password'];

if($u=="admin" && $p=="1111")
{
    //session_id('admin_Session');
    session_start();
    $_SESSION['verified']="true";
    $_SESSION['sess_id']=session_id();
    header("location:admin.php");
}
else
header("Location:login.php?f=1");