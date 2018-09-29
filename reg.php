<?php
if(isset($_POST["user"]) && isset($_POST["pass"]))
{
    // check if user exist.
    $file=fopen("data.txt","r");
    $finduser = false;
    while(!feof($file))
    {
        $line = fgets($file);
        $array = explode(";",$line);
        if(trim($array[0]) == $_POST['user'])
        {
            $finduser=true;
            break;
        }
    }
    fclose($file);
    
    // register user or pop up message
    if( $finduser )
    {
        echo $_POST["user"];
        echo ' existed!\r\n';
        include 'reg.html';
    }
    else
    {
        $file = fopen("data.txt", "a");
        fputs($file,$_POST["user"].";".$_POST["pass"]."\r\n");
        fclose($file);
        echo $_POST["user"];
        echo " registered successfully!";
    }
}
else
{
    include 'reg.html';
}
?>
