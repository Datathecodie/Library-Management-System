
<!DOCTYPE html>
<html>
	<head>
		<title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        
	</head>
	<body>
        
        <nav class="navbar navbar-toggleable-md navbar-dark bg-primary">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Menu</a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php?activity=adminLogin">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php?activity=search">Search</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" ariaexpanded="false">
                            Register
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="home.php?activity=sregister">Student</a>
                            <a class="dropdown-item" href="home.php?activity=fregister">Faculty</a>
                        </div>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" ariaexpanded="false">
                            Login
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="home.php?activity=studentLogin">Student</a>
                            <a class="dropdown-item" href="home.php?activity=facultyLogin">Faculty</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        
        
        <ul class="nav nav-pills">  
            <li class="nav-item">    
                
                
                        <a class="nav-link active" href="#">Home </a>
                    
                
            </li>  
            <li class="nav-item dropdown">    
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>   
                <div class="dropdown-menu">      
                    <a class="dropdown-item" href="#">Action</a>      
                    <a class="dropdown-item" href="#">Another action</a>      
                    <a class="dropdown-item" href="#">Something else here</a>      
                    <div class="dropdown-divider"></div>      
                    <a class="dropdown-item" href="#">Separated link</a>    
                </div>  
            </li>  
            
            
            <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" ariaexpanded="false" href="#">
                            Register
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="home.php?activity=sregister">Student</a>
                            <a class="dropdown-item" href="home.php?activity=fregister">Faculty</a>
                        </div>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" ariaexpanded="false" href="#">
                            Login
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="home.php?activity=studentLogin">Student</a>
                            <a class="dropdown-item" href="home.php?activity=facultyLogin">Faculty</a>
                        </div>
                    </li>
            
            <li class="nav-item">    
                <a class="nav-link" href="#">Link</a>  
            </li>  
            <li class="nav-item">    
                <a class="nav-link " href="#">Disabled</a>  
            </li>
        </ul>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins)  -->
        <script src="../js/jquery.js"></script>
        <script src="../js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../js/bootstrap.min.js"></script>
        
	</body>
</html>