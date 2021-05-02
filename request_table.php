<style>
table {
  border-collapse: collapse;
  width: 80%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}
</style>


<?php
$servername = "us-cdbr-east-03.cleardb.com";
$username = "b474b95ea4f970";
$password = "46b36be7";
$db = "heroku_989d675bc42ca01";
$conn = new mysqli($servername, $username, $password, $db);


if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}


$sql = "select  * from request ; ";


echo "<h4> REQUEST SUMMARY </h4>";

echo "<table border='1'>
    <tr>
    <th> Origin Country </th>
		<th> Destination Country </th>
    <th> Ship Number</th>
    <th> Arrival Date</th>
		<th> Departure Date</th>
    <th> Trade Type </th>
    <th> Request Status </th>
    </tr>";

		if($result = mysqli_query($conn, $sql))
         {
             if(mysqli_num_rows($result) > 0){

                 while($row = $result->fetch_assoc()) {
						       echo "<tr>";
						       echo "<td>". $row["From_Country"] . "</td>";
									 echo "<td>". $row["To_Country"] . "</td>";
						       echo "<td>". $row["Ship_Number"] . "</td>";
						       echo "<td>". $row["Arrival_Date"] . "</td> " ;
									 echo "<td>". $row["Departure_Date"] . "</td> " ;
                   echo "<td>". $row["Trade_Type"] . "</td> " ;
                   echo "<td>". $row["Status"] . "</td> " ;
						       echo "</tr>";
             }
         }
			 }
   else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

echo "</table>". "<br>" . "<br>" ;


/// update ship Status



?>


<h4> UPDATE SHIP STATUS </h4>

<form method = "post" action= shipstatus.php>
                     <tr>
                        <td width = "100"> Country ID</td>
                        <td><input name = "countryid"
                           id = "countryid"></td>
                     </tr>

                     <tr>
                        <td width = "100">Ship Number</td>
                        <td><input name = "shipnumber"
                           id = "shipnumber"></td>
                     </tr>
                     <tr>
                        <td width = "100">Current Status</td>
                        <td><input name = "curr_status"
                           id = "curr_status"></td>
                     </tr>

               <tr>
                  <td width = "100"> </td>
                  <td>
                     <input name = "Update" type = "submit"
                        id = "update" value = "Update">
                  </td>
               </tr>

 </form>
