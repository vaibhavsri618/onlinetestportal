
<?php

session_start();
echo '<a href="Logout.php" style="float:right;margin:0px 20px 0px 0px">Logout</a>';
require 'connection.php';
if (isset($_SESSION['userdata'])) {
    $name=$_SESSION['userdata']['username'];

    $sql = "SELECT * FROM user WHERE username='".$name."'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
           
            ?>


<!DOCTYPE html>
<html>
    <head>
        <title>View Previous</title>
    </head>
    <link rel="stylesheet" type="text/css" href="styleshow.css">
    <body>
        <h2>Welcome <?php echo $name?> Your Previous Attempt Marks are:</h2><br>
        <div id="main">
            <label class="label">UserName:</label>
            <input type="text" id="name"  value=<?php echo $row['username']  ?> readonly> <br>
            <label class="label">Category:</label>
            <input type="text" id="category" value=<?php echo $row['category'] ?> readonly><br>
            <label class="label"> Percentage of Marks Obtain:</label>
            <input type="text" id="marks" value=<?php echo $row['mark'] ?> readonly><br>
        
        </div>

    </body>
</html>


            <?php

        }
    } 
}
?>