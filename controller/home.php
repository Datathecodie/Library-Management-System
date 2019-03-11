<?php
	session_start();
	include("dbConfig.php");
	error_reporting(0);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Book My Books</title>
        
        <!-- Required meta tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
		<!--link rel="stylesheet" type="text/css" href="../css/home.css">
		<link rel="stylesheet" type="text/css" href="../css/title.css"-->
        
	</head>
	<body background="/pics/lib.jpg">
		<div class="container">
			<div class="header">
				<?php include("header.php"); ?>
			</div>

			<div class="navigation">
				<?php include("navigation.php"); ?>
			</div>

			<div class="content">
				<?php
				//ACTIVITY PERFORM...

					$activity = $_REQUEST['activity'];

					switch ($activity) {
						case 'dashboard':
							include("dashboard.php");
							break;

						case 'search':
							include("search.php");
							break;

						case 'adminLogin':
							include("adminLogin.php ");
							break;
						
						case 'studentLogin':
							include("studentLogin.php");
							break;

						case 'facultyLogin':
							include("facultyLogin.php");
							break;

						case 'sregister':
							include("sregister.php");
							break;

						case 'fregister':
							include("fregister.php");
							break;

						case 'userDashboard':
							include("userDashboard.php");
							break;

						case 'issueBooks':
							include("issueBooks.php");
							break;

						case 'returnBooks':
							include("returnBooks.php");
							break;

						case 'issuedBooks':
							include("issuedBooks.php");
							break;

						case 'returnedBooks':
							include("returnedBooks.php");
							break;

						case 'forgetpwd':
							include("forgetpwd.php");
							break;

						default:
							# code...
							break;
					}

				?>

				<?php
				//ADMIN LOGIN...

					if(isset($_REQUEST['adminLoginBtn'])){
		
						$username= $_REQUEST['username'];
						$pwd= $_REQUEST['pwd'];

						if(!empty($username) && !empty($pwd)){

							$query = mysql_query("SELECT id,username,pwd FROM admin WHERE username = '$username'");
							$result = mysql_fetch_assoc($query);

								if($username == $result['username'] && $pwd == $result['pwd']){
				
									$_SESSION['username'] = $result['username'];
									$_SESSION['uid'] = $result['id'];

									header("location: admin/adminPage.php?activity=adminDashboard");
								}
								else{
									include("adminLogin.php");
									$errorMsg = "Invalid User....";
								}
						}
						else{
							include("adminLogin.php");
							$errorMsg = "Enter in empty field...";
						}
						
					}

				?>

				<?php
				//STUDENT LOGIN...

					if(isset($_REQUEST['studentLoginBtn'])){
		
						$fullname= $_REQUEST['fullname'];
						$pwd= $_REQUEST['pwd'];

						if(!empty($fullname) && !empty($pwd)){

							$query = mysql_query("SELECT id,fullname,pwd,dept,rollno,unumber FROM student WHERE fullname = '$fullname' && pwd = '$pwd'");
							$result = mysql_fetch_assoc($query);

								if($fullname == $result['fullname'] && $pwd == $result['pwd']){
				
									$_SESSION['username'] = $fullname;
									$_SESSION['uid'] = $result['id'];
                                    $_SESSION['dept'] = $result['dept'];
                                    $_SESSION['rollno'] = $result['rollno'];
                                    $_SESSION['unumber'] = $result['unumber'];
                                    
                                    

									header("location: members/userPage.php?activity=viewProfile");
								}
								else{
									include("studentLogin.php");
									$errorMsg = "Invalid User....";
								}
						}
						else{
							include("studentLogin.php");
							$errorMsg = "Enter in empty field...";
						}
						
					}

				?>

				<?php
				//FACULTY LOGIN...

					if(isset($_REQUEST['facultyLoginBtn'])){
		
						$fullname= $_REQUEST['fullname'];
						$pwd= $_REQUEST['pwd'];

						if(!empty($fullname) && !empty($pwd)){

							$query = mysql_query("SELECT id,fullname,pwd FROM faculty WHERE fullname = '$fullname' && pwd = '$pwd'");
							$result = mysql_fetch_assoc($query);

								if($fullname == $result['fullname'] && $pwd == $result['pwd']){
				
									$_SESSION['username'] = $fullname;
									$_SESSION['uid'] = $result['id'];

									header("location: members/userPage.php?activity=viewProfile");
								}
								else{
									include("facultyLogin.php");
									$errorMsg = "Invalid User....";
								}
						}
						else{
							include("facultyLogin.php");
							$errorMsg = "Enter in empty field...";
						}
						
					}

				?>

				<?php
				//ADD Student MEMBER...
					             
                    $query = "Select Max(id) From student";
                    $returnD = mysql_query($query);
                    $result = mysql_fetch_assoc($returnD);
                    $maxRows = $result['Max(id)'];
                    if(empty($maxRows)){
                        $lastRow = $maxRows = 1;      
                    }else{
                        $lastRow = $maxRows + 1 ;
                    }

                    if(isset($_REQUEST['addMemberBtn1'])){

                        $id = $_REQUEST['id'];
                        $fullname = $_REQUEST['fullname'];
                        $rollno = $_REQUEST['rollno'];
                        $unumber = $_REQUEST['unumber'];                  
                        $dept = $_REQUEST['dept'];
                        $phone = $_REQUEST['phone'];
						$email = $_REQUEST['email'];
                        $pwd = $_REQUEST['pwd'];

						if(!empty($id) && !empty($fullname) && !empty($rollno) && !empty($unumber) && !empty($pwd) && !empty($phone)){

                        	$usernameExists = mysql_fetch_assoc(mysql_query("SELECT fullname FROM student WHERE fullname = '$fullname'"));

                            if($usernameExists['fullname'] != $fullname){

                            	$mobileExists = mysql_fetch_assoc(mysql_query("SELECT phone FROM student WHERE phone = '$phone'"));

                            	if($mobileExists['phone'] != $phone){

                            		$emailExists = mysql_fetch_assoc(mysql_query("SELECT email FROM student WHERE email = '$email'"));

                            		if($emailExists['email'] != $email){


		                                $query = "Insert Into student(id,fullname,rollno,unumber,pwd,dept,phone,email) Values('$id','$fullname','$rollno','$unumber','$pwd','$dept','$phone','$email')";
		                                $res = mysql_query($query);

		                                if(!empty($res)){
			                                $errorMsg = "Member Sucessfully Added.";
			                            }
			                                $query = "Select Max(id) From student";
			                                $returnD = mysql_query($query);
			                                $result = mysql_fetch_assoc($returnD);
			                                $maxRows = $result['Max(id)'];

			                                if(empty($maxRows)){
			                                    $lastRow = $maxRows = 1;      
			                                }else{
			                                    $lastRow = $maxRows + 1 ;
			                                }
		                            }
		                            else{
		                            	$errorMsg = "Email ID already exists. ";	
		                            }

		                        }
		                        else{
		                        	$errorMsg = "Mobile number already exists. ";
		                        }
                            }
                            else{
                                $errorMsg = "Name already exists.Choose another.";
                            }

                        }
                        else{
                            $errorMsg = "Please! Enter in Empty Field.";
                        }

                        include("sregister.php");
                    }

				?>

				<?php


//ADD Faculty MEMBER...
					
 $query = "Select Max(id) From faculty";
                    $returnD = mysql_query($query);
                    $result = mysql_fetch_assoc($returnD);
                    $maxRows = $result['Max(id)'];
                    if(empty($maxRows)){
                        $lastRow = $maxRows = 1;      
                    }else{
                        $lastRow = $maxRows + 1 ;
                    }

                    if(isset($_REQUEST['addMemberBtn2'])){

                        $id = $_REQUEST['id'];
                        $fullname = $_REQUEST['fullname'];
                        $fid = $_REQUEST['fid'];                  
                        $dept = $_REQUEST['dept'];
                        $phone = $_REQUEST['phone'];
						$email = $_REQUEST['email'];
                        $pwd = $_REQUEST['pwd'];

						if(!empty($id) && !empty($fullname) && !empty($fid) && !empty($pwd) && !empty($phone)){

                        	$usernameExists = mysql_fetch_assoc(mysql_query("SELECT fullname FROM faculty WHERE fullname = '$fullname'"));

                            if($usernameExists['fullname'] != $fullname){

                            	$mobileExists = mysql_fetch_assoc(mysql_query("SELECT phone FROM faculty WHERE phone = '$phone'"));

                            	if($mobileExists['phone'] != $phone){

                            		$emailExists = mysql_fetch_assoc(mysql_query("SELECT email FROM faculty WHERE email = '$email'"));

                            		if($emailExists['email'] != $email){


		                                $query = "Insert Into faculty(id,fullname,fid,pwd,dept,phone,email) Values('$id','$fullname','$fid','$pwd','$dept','$phone','$email')";
		                                $res = mysql_query($query);

		                                if(!empty($res)){
			                                $errorMsg = "Member Sucessfully Added.";
			                            }
			                                $query = "Select Max(id) From faculty";
			                                $returnD = mysql_query($query);
			                                $result = mysql_fetch_assoc($returnD);
			                                $maxRows = $result['Max(id)'];

			                                if(empty($maxRows)){
			                                    $lastRow = $maxRows = 1;      
			                                }else{
			                                    $lastRow = $maxRows + 1 ;
			                                }
		                            }
		                            else{
		                            	$errorMsg = "Email ID already exists. ";	
		                            }

		                        }
		                        else{
		                        	$errorMsg = "Mobile number already exists. ";
		                        }
                            }
                            else{
                                $errorMsg = "Name already exists.Choose another.";
                            }

                        }
                        else{
                            $errorMsg = "Please! Enter in Empty Field.";
                        }

                        include("fregister.php");
                    }

				?>

				
				<?php
                    //SEARCH BOOK OR STUDENT OR FACULTY USING THEIR NAME...

                        $searchList = $_REQUEST['searchList'];//SESSION['searchListValue'];
                        //echo $searchList;
                        if(isset($searchList)){

                            if($searchList == 'bookName'){

                                $searchField = $_REQUEST['searchField'];

                                if($searchField){

                                    $query = "SELECT bookId,title,author,price,available FROM books Where title LIKE '%$searchField%'";
                                    $returnD = mysql_query($query);
                                    $returnD1 = mysql_query($query);
                                    $result = mysql_fetch_assoc($returnD);

                                    if(empty($result)){
                                        $errorMsg = "Invalid Book Name...";
                                    }

                                }
                                else{
                                    $errorMsg = "Field can't be Empty...";
                                }

                            }
                            elseif($searchList == 'authorName'){

                                $searchField = $_REQUEST['searchField'];

                                if(!empty($searchField)){

                                     $query = "SELECT bookId,title,author,price,available FROM books Where author LIKE '%$searchField%'";
                                    $returnD = mysql_query($query);
                                    $returnD1 = mysql_query($query);
                                    $result = mysql_fetch_assoc($returnD);

                                    if(empty($result)){
                                        $errorMsg = "Invalid Author Name...";
                                    }

                                }
                                else{
                                    $errorMsg = "Field can't be Empty...";
                                }
                            }
                            elseif($searchList == 'bookId'){
                            	$searchField = $_REQUEST['searchField'];

                                if(!empty($searchField)){

                                     $query = "SELECT bookId,title,author,price,available FROM books Where bookId = '$searchField'";
                                    $returnD = mysql_query($query);
                                    $returnD1 = mysql_query($query);
                                    $result = mysql_fetch_assoc($returnD);

                                    if(empty($result)){
                                        $errorMsg = "Invalid Book-ID...";
                                    }

                                }
                                else{
                                    $errorMsg = "Field can't be Empty...";
                                }
                            }

                            include("search.php");
                        }
                ?>

                <?php
                //FORGET PASSWORD...

                	if(isset($_REQUEST['pwdSaveBtn'])){

                		$request = $_REQUEST['request'];

                		if($request == "admin"){
                			$regEmail = $_REQUEST['regEmail'];

							$query = mysql_query("SELECT email FROM admin WHERE email = '$regEmail'");
							$result = mysql_fetch_assoc($query);

							if($regEmail == $result['email']){

								$newP = $_REQUEST['newP'];
								$confirmP = $_REQUEST['confirmP'];

								if($newP == $confirmP){
									$query = mysql_query("UPDATE admin SET pwd = '$newP' WHERE email = '$regEmail'");

									if(!empty($query)){
										header("location: home.php?activity=adminLogin");
										//$errorMsg = "Password successfully changed.";
									}
								}
								else{
									//header("location: index.php?activity=forgetpwd");
									$errorMsg = "Password must be same.";
								}
							}
							else{
								//header("location: index.php?activity=forgetpwd");
								$errorMsg = "Please ! Enter authorised's user email.";
							}
                		}
                		else if($request == "user"){

							$regEmail = $_REQUEST['regEmail'];

							$query = mysql_query("SELECT email,position FROM members WHERE email = '$regEmail'");
							$result = mysql_fetch_assoc($query);

							if($regEmail == $result['email']){

								$newP = $_REQUEST['newP'];
								$confirmP = $_REQUEST['confirmP'];

								if($newP == $confirmP){

									$query = mysql_query("UPDATE members SET pwd = '$newP' WHERE email = '$regEmail'");

									if(!empty($query)){

										if($result['position'] == 'Student')
											header("location: home.php?activity=studentLogin");
										else if($result['position'] == 'Faculty')
											header("location: home.php?activity=facultyLogin");
										//$errorMsg = "Password successfully changed.";
									}
								}
								else{
									//header("location: index.php?activity=forgetpwd");
									$errorMsg = "Password must be same.";
								}
							}
							else{
								//header("location: index.php?activity=forgetpwd");
								$errorMsg = "Please ! Enter authorised's user email.";
							}
						}
						include("forgetpwd.php");
					}

                ?>

				<?php
		        if(isset($errorMsg)){
		            ?>
		            <div class="errorMsg"><?php echo $errorMsg; ?></div>
	                <?php	
	        	}
		  		?>

			</div>

			
			<div class="footer">
				<?php include("footer.php"); ?>
			</div>
		</div>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
	</body>
</html>



