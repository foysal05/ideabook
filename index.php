<?php
include('std_main/ac_session.php');
session_start();
if($_SESSION['login']==TRUE AND $_SESSION['status']=='Activate'){
	header('location:std_main/index.php');
}else{
	header('location:login.php');
}


?>