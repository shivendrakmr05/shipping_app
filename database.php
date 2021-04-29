<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<a href="index.php">Home</a>
<br>
<br>

<?php

$servername = "us-cdbr-east-03.cleardb.com";
$username = "b474b95ea4f970";
$password = "46b36be7";
$db = "heroku_989d675bc42ca01";
$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

if(isset($_POST['update']))
{
    $user_id = mysqli_real_escape_string($conn, $_REQUEST['user_id']);
	$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $password = mysqli_real_escape_string($conn, $_REQUEST['password']);
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO 180b_users (user_id, name, email, password) VALUES 
            			('$user_id', '$name', '$email', '$hash')";
            
            if(mysqli_query($conn, $sql))
            {
            	echo "New User Added Successfully\n";
            }
            else
            {
            	echo "Error: " . $sql . "<br>" . $conn->error;
            }
}
else if(isset($_POST['submit']))
{
    $from = mysqli_real_escape_string($conn, $_REQUEST['from']);
    $to = mysqli_real_escape_string($conn, $_REQUEST['to']);
    $shipno = mysqli_real_escape_string($conn, $_REQUEST['shipno']);
    $arr_date = mysqli_real_escape_string($conn, $_REQUEST['arrdate']);
    $dep_date = mysqli_real_escape_string($conn, $_REQUEST['depdate']);
    $trade = mysqli_real_escape_string($conn, $_REQUEST['trade']);
    $exp_code = mysqli_real_escape_string($conn, $_REQUEST['expcode']);
    $imp_code = mysqli_real_escape_string($conn, $_REQUEST['impcode']);

    $sql = "select Id from country where (Name='$from')";
    $send;
    $receive;
    // $sql = "INSERT INTO request (From_Country, To_Country, Ship_Number, Arrival_Date, Departure_Date, Trade_Type, Export_Code, Import_Code) VALUES ('$from', '$to', '$shipno', '$arr_date', '$dep_date', '$trade', '$exp_code', '$imp_code')";
            
            if($result = mysqli_query($conn, $sql))
            {
                if(mysqli_num_rows($result) > 0){
        
                    while($row = mysqli_fetch_array($result)){
                        $send = $row['Id'];
                    }
                }
            }
            else
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

             $sql = "select Id from country where (Name='$to')";
             if($result = mysqli_query($conn, $sql))
            {
                if(mysqli_num_rows($result) > 0){
        
                    while($row = mysqli_fetch_array($result)){
                        $receive = $row['Id'];
                    }
                }
            }
            else
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            echo "send: ".$send." receive: ".$receive;

            $sql = "select * from trade where ((Id_1='$send' and TRADEId_2='$receive') or (Id_1='$receive' and TRADEId_2='$send'))";

            if($result = mysqli_query($conn, $sql))
            {
                if(mysqli_num_rows($result) > 0){

                    echo " True";
                }
                else echo " False";
            }
            else
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
}

$conn->close();
?>

</body>
</html>