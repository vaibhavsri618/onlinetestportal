<?php

require 'connection.php';
$c=0;
session_start();
echo '<a id="button" href="Logout.php" >Logout</a>
';
if (isset($_SESSION['userdata'])) {
    $name=$_SESSION['userdata']['username'];
    if (isset($_SESSION['status'])) {
        $category=$_SESSION['status'];
        if (isset($_POST['submit'])) {
            if (!empty($_POST['radio'])) {
                $count=count($_POST['radio']);
                //echo $count;
                $check=$_POST['radio'];
                //print_r($check);
                $sql = "SELECT * FROM addtest";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        foreach ($check as $ans) {
                            if ($ans==$row['aid']) {
                                $c=$c+1;
                            }  
                        }
                    } 
                
                }
                $per=($c)*10;

                $sql20 = "INSERT INTO user (username, category, mark)
                        VALUES ('".$name."', '".$category."', '".$per."')";

                if ($conn->query($sql20) === true) {
                
                }

           
                



            }
                
            //echo $c;
            if ($per>39) {
                echo "<h3 id='h3'>Congrats You have Successfully Clear the test</h3>";
            } else {
                echo "<h4 id='h4'>Oops!!Hard Luck .... You have'nt clear the test</h4>";
            }

        }
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Result</title>
    </head>
    <link rel="stylesheet" type="text/css" href="resultstyle.css">
    <body>
        <div id="header">
            <div id="main">
                <h2>Result</h2>

            </div>
            <div id="content">
            <div class="left">
                <p>Question Attempted</p>

            </div>
            <div class="right">
                <p><?php  echo $count. "(" ;
                
                
                foreach ($check as $que=>$ans) {
                    echo $que-2 .",";
                }

                echo ")";
                
                
                
                ?></p>
            </div>
            
            <div class="left">
                <p>Percentage Of Marks Obtain</p>

            </div>
            <div class="right">
                <p><?php
                 echo "Your Score is ".$per."% <br>";
           
                ?></p>
            </div>    
            
            </div>
        </div>
        
    </body>
</html>