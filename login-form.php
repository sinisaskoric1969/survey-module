<?php
//Start session
session_start();

include_once('top.php');

//Check if access is unautorized
if(isset($_SESSION['error'])) {
	echo $_SESSION['error'];
	unset($_SESSION['error']);
}

if(isset($_POST['login'])) {
	$username = $_POST['username']; 
	$password = $_POST['password']; 

	if (empty($username) || empty($password)) { 
		$error = '<div class="error_message">Attention! Please enter your username and password.</div>';
		echo $error;
	} else { 

	
	
	
	require_once('functions/dbconn.php');	
	include_once('functions/functions.php');
	
	//Sanitize the POST values
	$login = clean($_POST['login']);
	$password = clean($_POST['password']);
	
	//Create query
	$qry="SELECT * FROM members WHERE username='$username' AND password='".md5($_POST['password'])."'";
	$result=mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) == 1) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			$_SESSION['SESS_ACCESS_LEVEL'] = $member['acl'];
			session_write_close();
			header("location: member-index.php");
			exit();
		}else {
			//Login failed
			//header("location: login-failed.php");
			$error = '<div class="error_message">Attention! Wrong username or password.</div>';
			echo $error;
			//exit();
		}
	}else {
		die("Query failed");
	}

	}
}
?>

<form id="loginForm" name="loginForm" method="post" action="login-form.php">
<label>Username</label><input type="text" name="username" size="20" class="login"> 
<br />
<label>Password</label><input type="password" name="password" size="20" class="login"> 
<br />
<input type="submit" value="Submit" name="login" class="login"> 
</form> 

<?php
include_once('bottom.php');
?>
