<?php

$connection= mysqli_connect("localhost","root","","transaction") or die("coudn't connect to the server");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
if(isset($_POST['register']))
{       
	if($_POST['username']&&$_POST['password'])
	{   $username=$_POST['username'];
        $password=$_POST['password'];
        $name=$_POST['name'];			
		$amount=$_POST['amount'];
		$cpassword=$_POST['cpassword'];
		
		if($password!=$cpassword)
		die("entered passwords are not identical");
		
		if($amount < 1000)
		die("registration unsuccesful ! deposit money should be more than or equal to 1000 INR");
		
		$check=mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM login WHERE login_id='$username'"),MYSQLI_ASSOC);
    
		if($check['username']==$username)
		die("That username already exists! <a href='register.php'>&larr;Back</a>");
	
	    mysqli_query($connection,"INSERT INTO login(username,login_id,password,amount) VALUES ('$name','$username','$password','$amount')");
		
		die("Your account has been created and you are logged in!");
		
	}
	mysqli_close($connection);
}
?>
<html>
 <title>The register system</title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>

<body>

<div class="form-style-10">
<h1>Resiter Now!<span>Sign up and join CSS BANK!</span></h1>
<form action='' method="post">
    
	<div class="section"><span>1</span>Name</div>
    <div class="inner-wrap">
        <label>Enter Your Name<input type="text" name="name" /></label>
    </div>
	
    <div class="section"><span>2</span>Username</div>
    <div class="inner-wrap">
        <label>Enter Your login-id <input type="text" name="username" /></label>
    </div>

    
    <div class="section"><span>3</span>Passwords</div>
        <div class="inner-wrap">
        <label>Enter Password <input type="password" name="password" /></label>
        <label>Confirm Password <input type="password" name="cpassword" /></label>
    </div>
	
	 <div class="section"><span>4</span>Amount</div>
        <div class="inner-wrap">
        <label>Enter Initial Deposit Money <input type="text" name="amount" /></label>
    </div>
	
    <div class="button-section">
     <input type="submit" value="register" name="register" />
     <span class="privacy-policy">
     <input type="checkbox" name="field7"><a href="t&c.php">You agree to our Terms and Policy.</a>
     </span>
    </div>
	
</form>
</div>

</body>
</html>
