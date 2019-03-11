
<?php
	include("../dbConfig.php");

	$selectedMemberId = $_REQUEST['selectedMemberId'];

	$query = mysql_query("Select fullname,phone,email From Student Where id = '$selectedMemberId'");
	$result = mysql_fetch_assoc($query);

?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../../css/title.css">
		<link rel="stylesheet" type="text/css" href="../../css/viewProfile.css">
	</head>
	<body>
		<div class="title">View Profile</div>
		<div class="infoContainer">

			<div class="userName">
				<?php echo ucfirst($result['fullname']); ?>
			</div>
			<div class="info">
				<hr>
				<div class="label">Id</div>
				<div class="details"><?php echo $selectedMemberId; ?></div>
				<hr>

				<hr>
				<div class="label">Mobile</div>
				<div class="details"><?php echo $result['phone']; ?></div>
				<hr>
				<div class="label">Email</div>
				<div class="details"><?php echo ucfirst($result['email']); ?></div>
				<hr>
			</div>
		</div>
	</body>
</html>
