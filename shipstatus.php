
<?php
$servername = "us-cdbr-east-03.cleardb.com";
$username = "b474b95ea4f970";
$password = "46b36be7";
$db = "heroku_989d675bc42ca01";
$conn = new mysqli($servername, $username, $password, $db);


$countryid = $_POST["countryid"];
$shipnumber = $_POST["shipnumber"];
$curr_status = $_POST["curr_status"];



if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}
;

$sql= "Update Ships
       set Curr_Status = '".$curr_status."'
       where Number = '".$shipnumber."' and Id = '".$countryid."' ";



		if($result = mysqli_query($conn, $sql))
         {
             echo " Updated Successfully";

         }
   else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

echo "</table>";

?>

<a href="request_table.php">Return </a>
