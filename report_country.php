
<?php
	$servername = "us-cdbr-east-03.cleardb.com";
$username = "b474b95ea4f970";
$password = "46b36be7";
$db = "heroku_989d675bc42ca01";
$conn = new mysqli($servername, $username, $password, $db);


$startdate = $_POST["startdate"];
$enddate = $_POST["enddate"];


echo "Start Date: ".$startdate."<br>";
echo "End Date: ".$enddate."<br>";


if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$Id = 3;
$port = 3;

$sql= "select Port_number, coalesce (count(*),0) as Total_ships,coalesce(sum(No_of_Containers),0) as Total_containers
						from SHIPS
						where DATE(Arrival_Date) >=  '".$startdate."' and DATE(Departure_Date) <= '".$enddate."' and Id ='".$Id."'
								and Number in (select Number from SHIPS_Operating_Seq where Operating_Seq like 'AU%')
						group by Port_number;";

 $sql1 ="select Port_number,count(*) as Total_ships,sum(No_of_Containers) as Total_containers
					from SHIPS
					where DATE(Arrival_Date) >= '".$startdate."' and DATE(Departure_Date) <= '".$enddate."'
							and Number in (select Number from SHIPS_Operating_Seq where Operating_Seq like 'AL%') and Id ='".$Id."'
					group by Port_number;";

//$sql = "select * from country";

//$row1 = $result1->fetch_assoc();

// echo $result1;

echo "Export Table"."<br>";
echo "<table border='1'>
    <tr>
    <th>Port Number</th>
    <th>Total Ships Export</th>
		<th>Total Containers Export</th>

    </tr>";
    $result1 = mysqli_query($conn, $sql1);
		if($result = mysqli_query($conn, $sql))
         {
             if((mysqli_num_rows($result) > 0)){

                 while( $row = $result->fetch_assoc()) {
						       echo "<tr>";
						      // echo "<td>". $row["Name"] . "</td>";
						       echo "<td>". $row["Port_number"] . "</td>";
						       echo "<td>". $row["Total_ships"] . "</td> " ;
									 echo "<td>". $row["Total_containers"] . "</td> " ;
									 // echo "<td>". $row1["Total_ships"] . "</td> " ;
									 // echo "<td>". $row1["Total_containers"] . "</td> " ;

						       echo "</tr>";
						 }
         }
				 else {
					 echo "<tr>";
					// echo "<td>". $row["Name"] . "</td>";
					 echo "<td>". $port. "</td>";
					 echo "<td>". "0" . "</td> " ;
					 echo "<td>". "0". "</td> " ;
					 // echo "<td>". $row1["Total_ships"] . "</td> " ;
					 // echo "<td>". $row1["Total_containers"] . "</td> " ;
					 echo "</tr>";
				 }
			 }
   else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

echo "</table>"."<br>";

echo "Import Table"."<br>";

echo "<table border='1'>
    <tr>
    <th>Port Number</th>
		<th>Total Ships Import</th>
		<th>Total Containers Import</th>

    </tr>";
    //$result1 = mysqli_query($conn, $sql1);
		if($result1 = mysqli_query($conn, $sql1))
         {
             if(( mysqli_num_rows($result1) > 0)){

                 while($row1 = $result1->fetch_assoc()) {
									 // echo $row;
						       echo "<tr>";
						       // echo "<td>". $row["Id"] . "</td>";
									 // echo "<td>". $row["Name"] . "</td>";
						       echo "<td>". $row1["Port_number"] . "</td>";
						       // echo "<td>". $row["Total_ships"] . "</td> " ;
									 // echo "<td>". $row["Total_containers"] . "</td> " ;
									 echo "<td>". $row1["Total_ships"] . "</td> " ;
									 echo "<td>". $row1["Total_containers"] . "</td> " ;

						       echo "</tr>";
             }
         }
				 else {
					 echo "<tr>";
					// echo "<td>". $row["Name"] . "</td>";
					 echo "<td>". $port. "</td>";
					 echo "<td>". "0" . "</td> " ;
					 echo "<td>". "0". "</td> " ;
					 // echo "<td>". $row1["Total_ships"] . "</td> " ;
					 // echo "<td>". $row1["Total_containers"] . "</td> " ;
					 echo "</tr>";
				 }

			 }
   else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

echo "</table>";



















?>
