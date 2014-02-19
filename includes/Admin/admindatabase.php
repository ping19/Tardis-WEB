<?php
$rank = 1;

include '../sqllogin.php';

$result = mysqli_query($con,"SELECT * FROM `Top Players` ORDER 	`Distance` DESC");

echo "<table class='table table-striped'>
				<tr>
					<th>ID</th>
					<th>Rank</th>
					<th>Name</th>
					<th>Distance</th>
				</tr>";

while($row = mysqli_fetch_array($result))
{
	echo "<tr>";
	echo "<td>" . $row['ID'] . "</td>";
	echo "<td>" . $rank++ . "</td>";
	echo "<td>" . $row['Name'] . "</td>";
	echo "<td>" . $row['Distance'] . "</td>";
	echo "<td><a href='edituser.php?id=". $row['ID'] . "'>EDIT</a></td>";
	echo "<td><a href='delete.php?id=". $row['ID'] . "'>DELETE</a></td>";
	echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>