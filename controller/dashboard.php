<?php

	include("dbConfig.php");

	$query = mysql_query("Select count(id) From student");
	$result = mysql_fetch_assoc($query);

	$query2 = mysql_query("Select count(bookId) From books");
	$result2 = mysql_fetch_assoc($query2);

	$query3 = mysql_query("Select count(id) From faculty");
	$result3 = mysql_fetch_assoc($query3);

	$query4 = mysql_query("Select count(publisher) From books Group By publisher");
	$result4 = mysql_num_rows($query4);
	
	$query5 = mysql_query("Select sum(price) From books");
	$result5 = mysql_fetch_assoc($query5);

	$query6 = mysql_query("Select count(bookId) From books Where available = 1");
	$result6 = mysql_fetch_assoc($query6);

?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<!--link rel="stylesheet" type="text/css" href="../css/dashboard.css">
		<link rel="stylesheet" type="text/css" href="../css/title.css" -->
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        
	</head>
	<body background="/pics/lib.jpg">
            
        <table class="table">
        
            <thead>
            <th> Dashboard</th>
            </thead>
            <tr> 
                 <td >Total Student : <br> <?php echo $result['count(id)'];?></td>

			     <td >Total Book : <br> <?php echo $result2['count(bookId)']; ?></td>

			     <td  >Total Faculty : <br> <?php echo $result3['count(id)']?></td>
            
            </tr>
            <tr>
                 <td >Total Publishers: <br> <?php echo $result4; ?></td>

			     <td>Price of all books: <br> <?php echo $result5['sum(price)']; ?></td>

			     <td>Books in library: <br> <?php echo $result6['count(bookId)']; ?></td>
            </tr>
        </table>
        
         <!-- jQuery (necessary for Bootstrap's JavaScript plugins)  -->
        <script src="../js/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../js/bootstrap.min.js"></script>
	</body>
</html>