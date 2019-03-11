<?php

include("dbConfig.php");

	$query = "Select Max(id) From student";
	$returnD = mysql_query($query);
	$result = mysql_fetch_assoc($returnD);
	$maxRows = $result['Max(id)'];
	if(empty($maxRows)){
        $lastRow = $maxRows = 1;      
    }else{
		$lastRow = $maxRows + 1 ;
    }

?>


<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../css/title.css">
		<link rel="stylesheet" type="text/css" href="../css/register.css">
	</head>
	<body>
		<div class="title">Student Register</div>
		<div class="addMemberForm">
			<form action="home.php" method="POST" enctype="multipart/form-data" class="addform">

				<div class="inputs">
					<input type="text" name="id" required autofocus placeholder="ID" value=<?php if(!empty($lastRow)){ echo $lastRow; }?> readonly>
				</div>

				<div class="inputs">
					<input type="text" name="fullname" required autofocus placeholder="Full-Name">
				</div>

				<div class="inputs">
					<input type="text" name="rollno" required autofocus placeholder="Roll-No" title="Roll Number must contain atleast 3 letters.">
				</div>
				
				<div class="inputs">
					<input type="text" name="unumber" required autofocus placeholder="University-No" pattern="[0-9]{4,}" title="University Number must contain atleast 3 letters.">
				</div>

				
				<div class="inputs">
					<div class="addMemberFormList">
						<select name="dept" required autofocus>
							<option value="">Select Department</option>
							<option value="COMP">COMP</option>
							<option value="ETC">ETC</option>
							<option value="IT">IT</option>
						</select>
					</div>
				</div>

				<div class="inputs">
					<input type="text" name="phone" required autofocus placeholder="Mobile" pattern="[0-9]{10}">
				</div>

				<div class="inputs">
					<input type="email" name="email" required autofocus placeholder="Email" title="example.example1@gmail.com">
				</div>

				
				<div class="inputs">
					<input type="password" name="pwd" required autofocus placeholder="Password">
				</div>

				<input type="submit" name="addMemberBtn1" value="Add Member">
			</form>
		</div>
	</body>
</html>