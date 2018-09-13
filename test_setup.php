<?php
	$con=mysqli_connect("localhost","root","");
	
	$query="drop database if exists dw";
	if(mysqli_query($con,$query)) echo" Database Dropped <br>";
	
	$query="create database dw ";
	mysqli_query($con,$query);
	$con=mysqli_connect("localhost","root","","dw");
	$query="CREATE TABLE `users` (
		`id` int(11) AUTO_INCREMENT,
		`first_name` varchar(50) NOT NULL,
		`last_name` varchar(50) NOT NULL,
		`email` varchar(50) NOT NULL,
		`phone` int(24) NOT NULL,
		`password` varchar(50) NOT NULL,
		`address_1` varchar(50) NOT NULL,
		`address_2` varchar(50) NOT NULL,
		`city` varchar(50) NOT NULL,
		`state` varchar(50) NOT NULL,
		`zip` varchar(30) NOT NULL,
		`distance` varchar(50) NOT NULL,
		`level` varchar(50) NOT NULL,
		PRIMARY KEY (`id`))";
	if(mysqli_query($con,$query)) echo "Customer Table Created <br>";
	else echo mysqli_error($con);
	$query="CREATE TABLE `pet_info` (
		`id` int(11)  AUTO_INCREMENT,
		`pet_name` varchar(70) NOT NULL,
		`pet_color` varchar(70) NOT NULL,
		`pet_age` int(20) NOT NULL,
		`food_habit` varchar(70) NOT NULL,
		`games_toys` varchar(70) NOT NULL,
		`about` varchar(50) NOT NULL,
		`micro_id` varchar(50) NOT NULL,
		`medical_status` varchar(50) NOT NULL,
		`email` varchar(50) NOT NULL,
		`gender` varchar(50) NOT NULL,
		PRIMARY KEY (`id`))";
	if(mysqli_query($con,$query)) echo " Pet Info Table Created<br>";
	else echo mysqli_error($con);
	$query="CREATE TABLE `service` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`email` varchar(50) DEFAULT NULL,
		`duration` varchar(30) DEFAULT NULL,
		`date` varchar(20) DEFAULT NULL,
		`time` varchar(20) DEFAULT NULL,
		`pet_name` varchar(20) DEFAULT NULL,
		`service_cost` float(20,0) DEFAULT NULL,
		`service_name` varchar(20) DEFAULT NULL,
		`interval` varchar(20) DEFAULT NULL,
		`session` int(20) DEFAULT NULL,
		PRIMARY KEY (`id`))";
	if(mysqli_query($con,$query)) echo " Service Table Created<br>";
	else echo mysqli_error($con);
	
	
	$query="INSERT INTO `users` VALUES ('2', 'Foysal', 'Ahammad', 'admin@lpsc.uk', '1852595966', 'admin', 'london', 'n/a', '', '', 'london', '00 km', '1')";
	if(mysqli_query($con,$query)) echo "Data successfully inserted <br>";
	else echo mysqli_error($con);
?>