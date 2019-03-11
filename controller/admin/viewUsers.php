<?php

	include("../dbConfig.php");

	$query = "SELECT id,fullname,dept,phone FROM student";
	$returnD = mysql_query($query);
	$returnD1 = mysql_query($query);
	$result = mysql_fetch_assoc($returnD);


?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../../css/table.css">
		<link rel="stylesheet" type="text/css" href="../../css/title.css">
		<link rel="stylesheet" type="text/css" href="../../css/viewProfile.css">
	</head>
	<body>
		<div class="title">Students List</div>
		<table>
			<tr>
				<th>Id</th>
				<th>Full Name</th>
				<th>Department</th>
				<th>Mobile Number</th>
				<!-- <th>Delete Student</th> -->

			</tr>

			<?php
				while($result1 = mysql_fetch_assoc($returnD1)){
				?>
				<tr>
					<td>
						<a href="adminPage.php?activity=viewUserProfile&selectedMemberId=<?php echo $result1['id']; ?>"> <?php echo $result1['id']; ?> </a>
					</td>
					<td><?php echo ucfirst($result1['fullname']); ?></td>
					<td><?php echo ucfirst($result1['dept']); ?></td>
					<td><?php echo $result1['phone']; ?></td>
					<!-- <td>
						<a href="adminPage.php?activity=deleteMember&deleteMemberId=<?php echo $result1['id']; ?>">Delete</a>
					</td> -->

				</tr>
				<?php
				}

			?>
		</table>
	</body>
</html>
