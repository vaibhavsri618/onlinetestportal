

<?php

$error=array();
require 'connection.php';
session_start();
if (isset($_POST['submit'])) {
    $name=isset($_POST['username'])?$_POST['username']:'';
    $password=isset($_POST['password'])?$_POST['password']:'';
    
    if ($name=="" || $password=="") {
        $error[]=array("id"=>'form','msg'=>"Field cant be empty");
    }

    if (count($error)==0) {
        $sql = "SELECT * FROM login WHERE username='".$name."'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['username']==$name && $row['userpass']==$password) {
                    if ($row['role']=="admin") {
                        $_SESSION['userdata']=array('userid'=>$row['id'],
                        'username'=>$row['username'],'email'=>$row['email']);  
                        print_r($_SESSION['userdata']);
                        header('Location:admin.php'); 
                    } else {

                        $_SESSION['userdata']=array('userid'=>$row['id'],
                        'username'=>$row['username'],'email'=>$row['email']);  
                        print_r($_SESSION['userdata']);
                        header('Location:homeuser.php');
                    }
                } else {
                        echo "<p style='color:red;margin:10px 0px 0px 30%;'>Username or Password does'nt match</p>";
                }
            }
        } 

    } else {
        foreach ($error as $err) {
            $display=$err['msg'];
        }
    }

}

$conn->close();
?>

    























<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <body>
        <?php echo "<script>alert('Please Login First')</script>"?>
    <h1 style="text-align: center;padding: 20px;font-style: italic;">Please Login First to Continue .</h1>
        
    <h4 id='error'><?php 
    if (count($error)>0) {
    
        echo $display; 
    } ?></h5>
        <div id="form">
        <form action="#" method="POST">
            <label><b>UserName:</b></label>
            <input type="text" name="username" id="user" placeholder="Username"><br>
            <label><b>Password:</b></label>
            <input type="password" name="password"
             id="user2" placeholder="Password"><br>
            <input type="submit" name="submit" value="Submit" id="submit">
      
        </form>
    </div>
    </body>
</html>