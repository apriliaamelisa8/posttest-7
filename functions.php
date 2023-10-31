<?php
function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'elibrary';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}
function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style.css" rel="stylesheet" type="text/css">		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
	<nav>
	<div class="menu-icon">
	   <span class="fas fa-bars"></span>
	</div>
	<div class="logo">E-Library</div>
	<div class="nav-items">
	   <li><a href="index.html">Home</a></li>
	   <li><a href="index.html">About</a></li>
	   <li><a href="index.html">Menu</a></li>
	   <li><a href="create.php">Peminjaman</a></li>
	</div>
	<div class="search-icon">
	   <span class="fas fa-search"></span>
	</div>
	<div class="cancel-icon">
	   <span class="fas fa-times"></span>
	</div>
	<form action="#">
	   <input type="search" class="search-data" placeholder="Search" required>
	   <button type="submit" class="fas fa-search"></button>
	</form>

	<div class="darkLight-searchBox">
	 <div class="dark-light">
		 <i class='bx bx-moon moon'></i>
		 <i class='bx bx-sun sun'></i>
	 </div>
	 </div>
 </nav>
EOT;
}
function template_footer() {
echo <<<EOT
    </body>
</html>
EOT;
}
?>