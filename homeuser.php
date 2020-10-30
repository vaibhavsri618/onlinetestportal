
<?php

require 'connection.php';
session_start();
if (isset($_SESSION['userdata'])) {
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Online Test Portal</title>
    </head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <body>
        <div id="header">
            <h2>Hello, <?php echo $_SESSION['userdata']['username'] ?> welcome To Our Online Test Platform</h2>
        </div>
        <div class="nav">
            <ul>
                <li><a href="viewprevious.php">PreviousTestResult</a></li>
                
                <li><a href="Logout.php">Logout</a></li>
                </ul>

        </div>
        <div id="aside">
            <img src="images/online.jpg">
        </div>
    
        <div id="main">
        <h3 id="h3">Online Test We Offer</h3><br><br>
            <div id="products">

            <?php
            $display="";
            $sql = "SELECT * FROM test";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $display.='<div id="product-101" class="product">';
                    $display.='<img src=images/'.$row['image'].'
                    style="width:100px;height:100px">';
                    
                    $display.='<h3 class="title"><a href="#">'.$row['name'].'</a></h3>';
                    $display.='<span>'.$row['about'].'</span>';
                    
                    $display.='<a class="add-to-cart" name="addtocart" 
                    href="redirect.php?id='.$row['name'].'">Start</a>';
                    $display.='</div>';
                    
    

                    
                }
               
            } else {
                echo "0 results";
            }
            echo $display;
            


            ?>
        </div>
        </div>


        
       </body>
</html>
    <?php

} else {
    header("Location:Login.php");
}

?>