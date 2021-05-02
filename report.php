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


$startdate = $_POST["startdate"];
$enddate = $_POST["enddate"];


echo "<h3> Start Date: ".$startdate." </h3>";
echo "<h3> End Date: ".$enddate."</h3>";


if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}


$sql = "select c.Id as Id,c.Name as Name,Port_Number,count(*) as Total_ships,sum(No_of_Containers) as Total_containers
            from SHIPS s
						join COUNTRY c on
						s.Id =c.Id
            where DATE(Arrival_Date) >= '".$startdate."' and DATE(Departure_Date) <= '".$enddate."'
            group by c.Id,c.Name,Port_number; ";


echo "<h4> Port Report </h4>";
//$sql = "select * from country";

echo "<table border='1'>
    <tr>
    <th>Country ID</th>
		<th>Ship Owner</th>
    <th>Port Number</th>
    <th>Total Ships</th>
		<th>Total Containers</th>
    </tr>";

		if($result = mysqli_query($conn, $sql))
         {
             if(mysqli_num_rows($result) > 0){

                 while($row = $result->fetch_assoc()) {
						       echo "<tr>";
						       echo "<td>". $row["Id"] . "</td>";
									 echo "<td>". $row["Name"] . "</td>";
						       echo "<td>". $row["Port_Number"] . "</td>";
						       echo "<td>". $row["Total_ships"] . "</td> " ;
									 echo "<td>". $row["Total_containers"] . "</td> " ;
						       echo "</tr>";
             }
         }
			 }
   else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

echo "</table>";


?>
