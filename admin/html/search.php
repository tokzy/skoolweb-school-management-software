<?php
ob_start();
session_start();
error_reporting(E_ALL^E_DEPRECATED);
include ("../../connect.php");
include ("functions/functionlogin.php");

$sql = "SELECT schoolname FROM users WHERE administrator = '".$_SESSION['username']."' AND schoolname = '".$_SESSION['school']."' LIMIT 1";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
$school_name = $row['schoolname'];

if (logged_in()){
	if (isset($_POST['search_term'])) {
		$search_term 	=	mysqli_real_escape_string($conn,  htmlentities($_POST['search_term']));

		if (!empty($search_term)) {
			
			$query 	=	"SELECT name, picture, email FROM studentadd WHERE schoolidentity = '$school_name' AND name LIKE '%$search_term%'";
			$result 	=	mysqli_query($conn, $query);
			$count 		=	mysqli_num_rows($result);
			$suffix 	=	($count != 1) ? 's' : '';
			echo "Your search for <b>$search_term</b> returned <b>$count record$suffix from our database</b>";
			echo "<br>";
			if ($count == 0) {
					echo '<div class="alert alert-danger fade in">
				    <p>No records found for '.$search_term.'</p>
				  </div>';
				}
			while ($rows 	=	mysqli_fetch_array($result)) {
				
				$name 	=	$rows['name'];
				$picture	=	$rows['picture'];
				$email 		=	$rows['email'];
				echo "<br>";
				echo "<a href='finance_manage.php?name=".urlencode($name)."' style='border: 1px solid #eee;'><div style='padding: 1em;'>";
				echo '<img src="../../logo/'.$picture.'" alt="user-img" width="36" class="img-circle">';
				echo $name;
				echo "</div></a>";
			}

		}
	}
} else {
redirect_to("../../index.php");	
}	
ob_end_flush();
?>