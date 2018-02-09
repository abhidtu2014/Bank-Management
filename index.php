<?php

$connection=  mysqli_connect("localhost","root","","transaction") or die("coudn't connect to the server");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

if(isset($_POST['login']))
{
	if($_POST['username']&&$_POST['password'])
	{   $username=$_POST['username'];
        session_start();
        $_SESSION["username"]=$username;
		
        $password=$_POST['password'];
        $user=mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM login WHERE login_id='$username'"),MYSQLI_ASSOC);
    if($user['username']==NULL)		
	{die("That username <i>$username</i> doesn't exist! <a href='index.php'>&larr;Back</a>");
	}
	
	if($user['password']!=$password)
	die("Incorrect passowrd! <a href='index.php'>&larr;Back</a>");
	}
	//die("logged in successfully");
	echo "VISIT<a href='options.php'>&larr;OPTIONS</a>";
}
?>

 <html>
 <title>The login system</title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>

<body>

<div class="form-style-10">
<h1>Login!<span>log into your Account!</span></h1>
<form action="options.php" method="post">
    <div class="section"><span>1</span>Username</div>
    <div class="inner-wrap">
        <label>Your login-id <input type="text" name="username" /></label>
    </div>

    
    <div class="section"><span>2</span>Passwords</div>
        <div class="inner-wrap">
        <label>Password <input type="password" name="password" /></label>
    </div>
    <div class="button-section">
     <input type="submit" name="login" value="login" />
	 	 
     <span class="privacy-policy">
     <input type="checkbox" name="field7"><a href="t&c.php">You agree to our Terms and Policy.</a>
     </span>
    </div>
	<br />
	<br />
	 <!--No account?<a href='register.php'>Register</a>-->
</form>
 
 <form action="register.php" method="post">
     <div class="button-section">
     <input type="submit" name="Sign Up" value="Sign Up" />
	 </div>	 
	 
 </form>
</div>

</body>
</html>

