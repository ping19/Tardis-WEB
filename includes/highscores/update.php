<?php

$username = $_GET['username'];
$distance = $_GET['distance'];
$con = mysqli_connect("localhost", "thedreamteam", "El3ven", "SSA") or die ("Error " . mysqli_error($con));

// Let's check to see if the user exists

$usercheck = mysqli_query($con, "SELECT * FROM `Top Player` WHERE PlayerName='$username'");
$scorecheck = mysqli_query($con, "SELECT `Distance` FROM `Top Player` WHERE PlayerName='$username' AND Distance='$distance'");
$id = mysqli_query($con, "SELECT `PlayerID` FROM `Top Player` WHERE PlayerName='$username' AND Distance='$distance'");

if (mysql_num_rows($usercheck) >= 1) {
    if ($distance > $scorecheck) {
        $query = mysqli_query($con, "UPDATE `Top Player` SET Distance=$distance WHERE PlayerName='$username' AND PlayerID='$id'");
    } else {
        echo "Did not beat previous high score";
    }
} else {
    $query = mysqli_query($con, "INSERT INTO `Top Player` (`PlayerID`, `PlayerName`, `Distance`) VALUES (NULL, '$username', '$distance')");
}


echo $_GET['username'];
echo " ";
echo $_GET['distance'];
?>