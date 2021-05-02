<?php
session_start();
$servername = "us-cdbr-east-03.cleardb.com";
$username = "b474b95ea4f970";
$password = "46b36be7";
$db = "heroku_989d675bc42ca01";
$conn = new mysqli($servername, $username, $password, $db);


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


$sql_tariff_paid="select s.Port_number as Port_number ,c1.Name as Name,c1.tarrif as tariff, count(*) as Total_ships
										from SHIPS s
										inner join (select p.Port_number,c.Name,c.tarrif
														from ports p
														inner join country c
													on p.Id=c.Id) c1
										on s.Port_number=c1.Port_number
										where s.Port_number <> '".$port."' and s.Id= '".$Id."'
										and DATE(Arrival_Date) >= '".$startdate."'
										and DATE(Departure_Date) <= '".$enddate."'
										group by s.Port_number;" ;



$sql_tariff_earned="select s.Port_number as Port_number,c1.tarrif as tariff, count(*) as Total_ships
									from SHIPS s
									inner join (select p.Port_number,c.Name,c.tarrif
													from ports p
													inner join country c
												on p.Id=c.Id) c1
									on s.Port_number=c1.Port_number
									where s.Port_number = '".$port."'  and s.Id <> '".$Id."'
									and DATE(Arrival_Date) >= '".$startdate."' and DATE(Departure_Date) <= '".$enddate."'
									group by s.Port_number;		" ;



	echo "<h4>Tariff Paid Report</h4>";


	echo "<table border='1'>
  <tr>
  <th>Port Number</th>
	<th>Country</th>
	<th>Tariff Charge </th>
	<th>No. of Ships </th>
	<th>Total Tariff Paid </th>
	</tr>";
			if($res_paid = mysqli_query($conn, $sql_tariff_paid))
				         {
				             if(( mysqli_num_rows($res_paid) > 0)){

				                 while($row_paid = $res_paid->fetch_assoc()) {
										       echo "<tr>";
										       echo "<td>". $row_paid["Port_number"] . "</td>";
													 echo "<td>". $row_paid["Name"] . "</td> " ;
													 echo "<td>". $row_paid["tariff"] . "</td> " ;
													 echo "<td>". $row_paid["Total_ships"] . "</td> " ;
													 echo "<td>". ($row_paid["tariff"]*$row_paid["Total_ships"]) . "</td> " ;
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

	echo "</table>";




echo "<h4>Tariff Earned Report</h4>";


echo "<table border='1'>
<tr>
<th>Port Number</th>
<th>Tariff Charge </th>
<th>No. of Ships </th>
<th>Total Tariff Paid </th>
</tr>";
		if($res_earn = mysqli_query($conn, $sql_tariff_earned))
			         {
			             if(( mysqli_num_rows($res_earn) > 0)){

			                 while($row_earn = $res_earn->fetch_assoc()) {
									       echo "<tr>";
									       echo "<td>". $row_earn["Port_number"] . "</td>";
												 echo "<td>". $row_earn["tariff"] . "</td> " ;
												 echo "<td>". $row_earn["Total_ships"] . "</td> " ;
												 echo "<td>". ($row_earn["tariff"]*$row_earn["Total_ships"]) . "</td> " ;
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

		echo "</table>";



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
