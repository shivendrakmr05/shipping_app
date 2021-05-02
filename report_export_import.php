<?php
session_start();
$servername = "us-cdbr-east-03.cleardb.com";
$username = "b474b95ea4f970";
$password = "46b36be7";
$db = "heroku_989d675bc42ca01";
$conn = new mysqli($servername, $username, $password, $db);

//
// $startdate = $_POST["startdate"];
// $enddate = $_POST["enddate"];

$startdate = $_SESSION['startdate'] ;
$enddate = $_SESSION['enddate'] ;


echo "<h3> Start Date: ".$startdate." </h3>";
echo "<h3> End Date: ".$enddate."</h3>";


if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$c_id ="India";
$sql_c= " select Id from COUNTRY where Name = '".$c_id."'";
$id_res = mysqli_query($conn, $sql_c);
$r = $id_res->fetch_assoc();

$Id=$r["Id"];


$sql_p= " select distinct Port_number from PORTS where Id = '".$Id."'";
$p_res = mysqli_query($conn, $sql_p);
$p = $p_res->fetch_assoc();
$port=$p["Port_number"];




$sql= "select Port_number, coalesce (count(*),0) as Total_ships,coalesce(sum(No_of_Containers),0) as Total_containers
						from SHIPS
						where DATE(Arrival_Date) >=  '".$startdate."' and DATE(Departure_Date) <= '".$enddate."' and Port_number ='".$port."'
								and Number in (select Number from SHIPS_Operating_Seq where Operating_Seq like 'AU%')
						group by Port_number;";

 $sql1 ="select Port_number,count(*) as Total_ships,sum(No_of_Containers) as Total_containers
					from SHIPS
					where DATE(Arrival_Date) >= '".$startdate."' and DATE(Departure_Date) <= '".$enddate."'
							and Number in (select Number from SHIPS_Operating_Seq where Operating_Seq like 'AL%') and Port_number ='".$port."'
					group by Port_number;";


echo "<h4>Export Report </h4>";
echo "<table border='1' >
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
						       echo "<td>". $row["Port_number"] . "</td>";
						       echo "<td>". $row["Total_ships"] . "</td> " ;
									 echo "<td>". $row["Total_containers"] . "</td> " ;
						       echo "</tr>";
						 }
         }
				 else {
					 echo "<tr>";
					 echo "<td>". $port. "</td>";
					 echo "<td>". "0" . "</td> " ;
					 echo "<td>". "0". "</td> " ;
					 echo "</tr>";
				 }
			 }
   else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

echo "</table>"."<br>";

echo "<h4>Import Report</h4>";

echo "<table border='1'>
    <tr>
    <th>Port Number</th>
		<th>Total Ships Import</th>
		<th>Total Containers Import</th>

    </tr>";
		if($result1 = mysqli_query($conn, $sql1))
         {
             if(( mysqli_num_rows($result1) > 0)){

                 while($row1 = $result1->fetch_assoc()) {
						       echo "<tr>";
						       echo "<td>". $row1["Port_number"] . "</td>";
									 echo "<td>". $row1["Total_ships"] . "</td> " ;
									 echo "<td>". $row1["Total_containers"] . "</td> " ;
						       echo "</tr>";
             }
         }
				 else {
					 echo "<tr>";
					 echo "<td>". $port. "</td>";
					 echo "<td>". "0" . "</td> " ;
					 echo "<td>". "0". "</td> " ;
					 echo "</tr>";
				 }

			 }
   else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

echo "</table>"."<br>";



?>

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
