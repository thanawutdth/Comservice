<?php
$con= mysqli_connect("localhost","root","1234","image_path") or die("Error: " . mysqli_error($con));

mysqli_query($con, "SET NAMES 'utf8' ");
 
?>