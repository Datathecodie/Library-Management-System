<?php
	session_start();

	include("../dbConfig.php");
	error_reporting(0);

	$username = $_SESSION['username'];

	$result = mysql_fetch_assoc(mysql_query("SELECT dept FROM student WHERE fullname = '$username'"));

	if($_REQUEST['activity'] == 'logout'){
        $username = null;
        $username ="";
        unset($username);
        
        $_SESSION['username'] = null;
        $_SESSION['username'] ="";
        unset($_SESSION['username']);
        
        session_destroy();
    }

    if(empty($username)){
        header("location: ../home.php?activity=dashboard");
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../../css/title.css">
		<link rel="stylesheet" type="text/css" href="../../css/userPage.css">
		<link rel="stylesheet" type="text/css" href="../../css/home.css">
		<link rel="stylesheet" type="text/css" href="../../css/header.css">
		<link rel="stylesheet" type="text/css" href="../../css/navigation.css">
	</head>
	<body>
		<div class="container">
			<div class="header">
				<?php include("../header.php"); ?>
			</div>
			<div class="userContainer">
				<div class="title">
					<?php 
						
						if($result['position'] == 'Student'){
							echo "Student Page";
						}
						else if($result['position'] == 'Faculty'){
							echo "Faculty Page";
						}
					?>
				</div>

				<div class="userWelcome">Welcome : <?php echo $_SESSION['username']; ?></div>
                

				<div class="logout"><a href="userPage.php?activity=logout">Logout</a></div>

				<div class="userAction">
					

	


</br></br></br></br><center>UNDER CONSTRUCTION!</center>

				
				


				</div>
			</div>
		</div>
	</body>
</html>