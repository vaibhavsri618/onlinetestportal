<?php

session_start();
if (isset($_SESSION['userdata'])) {
    if (isset($_GET['id'])) {
        $status=$_GET['id'];
        $_SESSION['status']=$_GET['id'];
        echo $status;
        if ($status=="Aptitude") {
            header("Location:showtest.php");
        }

        if ($status=="Reasoning") {
            header("Location:showtest.php");
        }

        if ($status=="Coding") {
            header("Location:showtest.php");
        }



    }
} else {
    header("Location:Loginalert.php");
}
?>
