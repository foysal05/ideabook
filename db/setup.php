<?php
	$con=mysqli_connect("localhost","root","");
	
	$query="Drop database if exists ewsd";
	if(mysqli_query($con,$query)) echo" Database Dropped <br>";
	
	$query="create database ewsd";
	
	mysqli_query($con,$query);
	echo "Database Created";
	$con=mysqli_connect("localhost","root","","ewsd");
	$query="CREATE TABLE `department` (
			`d_id` int(11) NOT NULL,
			 `d_name` varchar(100) DEFAULT NULL,
			 PRIMARY KEY (`d_id`)
			) ENGINE=InnoDB DEFAULT CHARSET=latin1";
	if(mysqli_query($con,$query)){
		echo "Department Table Created <br>";
	}
	else echo mysqli_error($con);
	$query="CREATE TABLE `category` (
	  `c_id` int(11) NOT NULL AUTO_INCREMENT,
	  `category_name` varchar(100) DEFAULT NULL,
	  `start_date` varchar(20) DEFAULT NULL,
	  `closure_date` varchar(20) DEFAULT NULL,
	  `final_closure_date` varchar(20) DEFAULT NULL,
	  PRIMARY KEY (`c_id`)
	) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1";
	if(mysqli_query($con,$query)) echo " Category Table Created<br>";
	else echo mysqli_error($con);
	$query="CREATE TABLE `users` (
			  `uid` int(11) NOT NULL AUTO_INCREMENT,
			  `first_name` varchar(50) DEFAULT NULL,
			  `last_name` varchar(50) DEFAULT NULL,
			  `user_type` varchar(10) DEFAULT NULL,
			  `email` varchar(100) DEFAULT NULL,
			  `password` varchar(30) DEFAULT NULL,
			  `status` varchar(20) DEFAULT NULL,
			  PRIMARY KEY (`uid`)
			) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1";
	if(mysqli_query($con,$query)) echo " Users Table Created<br>";
	else echo mysqli_error($con);
	$query="CREATE TABLE `student` (
			  `std_id` int(11) NOT NULL,
			  `department_id` int(11) DEFAULT NULL,
			  `session` int(10) DEFAULT NULL,
			  `account_status` varchar(20) DEFAULT NULL,
			  `photo` varchar(50) DEFAULT NULL,
			  PRIMARY KEY (`std_id`),
			  KEY `F2` (`department_id`),
			  CONSTRAINT `F1` FOREIGN KEY (`std_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
			  CONSTRAINT `F2` FOREIGN KEY (`department_id`) REFERENCES `department` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE
			) ENGINE=InnoDB DEFAULT CHARSET=latin1
			";
	if(mysqli_query($con,$query)) echo " Student Table Created<br>";
	else echo mysqli_error($con);
	$query="CREATE TABLE `staff` (
			  `s_id` int(11) NOT NULL,
			  `department_id` int(11) DEFAULT NULL,
			  `joinning_date` varchar(20) DEFAULT NULL,
			  `post` varchar(20) DEFAULT NULL,
			  `photo` varchar(50) DEFAULT NULL,
			  PRIMARY KEY (`s_id`),
			  KEY `F4` (`department_id`),
			  CONSTRAINT `F3` FOREIGN KEY (`s_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
			  CONSTRAINT `F4` FOREIGN KEY (`department_id`) REFERENCES `department` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE
			) ENGINE=InnoDB DEFAULT CHARSET=latin1";
	if(mysqli_query($con,$query)) echo " Staff Table Created<br>";
	else echo mysqli_error($con);
	$query="CREATE TABLE `idea` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `idea_title` varchar(200) DEFAULT NULL,
  `idea_body` varchar(2000) DEFAULT NULL,
  `idea_author_id` int(11) DEFAULT NULL,
  `department` varchar(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `author_type` varchar(20) DEFAULT NULL,
  `attachment` varchar(50) DEFAULT NULL,
  `idea_status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `F6` (`category_id`),
  KEY `F7` (`idea_author_id`),
  KEY `D2` (`department`),
  CONSTRAINT `F6` FOREIGN KEY (`category_id`) REFERENCES `category` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `F7` FOREIGN KEY (`idea_author_id`) REFERENCES `student` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=latin1
";
		if(mysqli_query($con,$query)) echo " Idea Table Created<br>";
		else echo mysqli_error($con);
	
		$query="CREATE TABLE `likes` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `pid` int(11) DEFAULT NULL,
	  `like` int(10) DEFAULT '0',
	  `unlike` int(10) DEFAULT '0',
	  `uid` int(11) DEFAULT NULL,
	  PRIMARY KEY (`id`),
	  KEY `F8` (`pid`),
	  KEY `F9` (`uid`),
	  CONSTRAINT `F8` FOREIGN KEY (`pid`) REFERENCES `idea` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
	  CONSTRAINT `F9` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
	) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1";
		if(mysqli_query($con,$query)) echo " Likes Table Created<br>";
		else echo mysqli_error($con);
	
		$query="CREATE TABLE `favourite` (
	  `idea_id` int(11) NOT NULL,
	  `idea_lover_id` int(11) DEFAULT NULL,
	  PRIMARY KEY (`idea_id`),
	  KEY `F15` (`idea_lover_id`),
	  CONSTRAINT `F14` FOREIGN KEY (`idea_id`) REFERENCES `idea` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
	  CONSTRAINT `F15` FOREIGN KEY (`idea_lover_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
	) ENGINE=InnoDB DEFAULT CHARSET=latin1
	";
		if(mysqli_query($con,$query)) echo " Favourite Table Created<br>";
		else echo mysqli_error($con);
	
		$query="CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `idea_id` int(11) DEFAULT NULL,
  `comment_body` varchar(500) DEFAULT NULL,
  `comment_author_id` int(11) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `comment_status` int(2) unsigned zerofill DEFAULT NULL,
  `anonymous` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `F10` (`idea_id`),
  KEY `F11` (`comment_author_id`),
  CONSTRAINT `F10` FOREIGN KEY (`idea_id`) REFERENCES `idea` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `F11` FOREIGN KEY (`comment_author_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1";
	if(mysqli_query($con,$query)) echo " Comment Table Created<br>";
	else echo mysqli_error($con);

	$query="CREATE TABLE `reply` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_id` int(11) DEFAULT NULL,
  `r_author_id` int(11) DEFAULT NULL,
  `reply_body` varchar(500) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`r_id`),
  KEY `F12` (`comment_id`),
  KEY `F13` (`r_author_id`),
  CONSTRAINT `F12` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`comment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `F13` FOREIGN KEY (`r_author_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
	if(mysqli_query($con,$query)) echo " Reply Table Created<br>";
	else echo mysqli_error($con);

	$query="CREATE TABLE `view` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `idea_id` int(11) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1";
	if(mysqli_query($con,$query)) echo " View Table Created<br>";
	else echo mysqli_error($con);

	$query="CREATE TABLE `message` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  PRIMARY KEY (`m_id`),
  KEY `MF1` (`sender_id`),
  KEY `MF2` (`receiver_id`),
  CONSTRAINT `MF1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `MF2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1";
	if(mysqli_query($con,$query)) echo " Message Table Created<br>";
	else echo mysqli_error($con);

	
header('location:database.php?table_created');
?>