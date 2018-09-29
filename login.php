<?php  session_start(); ?>  // session starts with the help of this function 

<?php

if(isset($_SESSION['use']))   // Checking whether the session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
    header("Location:home.php"); 
 }
else
{
    include 'login.html';
}

if(isset($_POST['login']))   // it checks whether the user clicked login button or not 
{
     $user = $_POST['user'];
     $pass = $_POST['pass'];

    if(isset($_POST["user"]) && isset($_POST["pass"])){
    $file = fopen('data.txt', 'r');
    $good=false;
    while(!feof($file)){
        $line = fgets($file);
        $array = explode(";",$line);
	if(trim($array[0]) == $_POST['user'] && trim($array[1]) == $_POST['pass']){
            $good=true;
            break;
        }
    }

    if($good){
	$_SESSION['use'] = $user;
        echo '<script type="text/javascript"> window.open("home.php","_self");</script>';            //  On Successful Login redirects to home.php
    }else{
        echo "invalid UserName or Password";
    }
    fclose($file);
    }
    else{
        include 'login.html';
    }

}
?>
