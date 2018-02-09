<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>

<body>

<div class="form-style-10">
<h1>Check Your Balance</h1>
<form action="index.php" method="post"> 
<div class="button-section">
     <input type="submit" name="Logout" value="logout"/>
 </div>
</form>
<form action='' method="post">
    <div class="section"><span>1</span>Username</div>
    <div class="inner-wrap">
        <label>Your login-id <input type="text" name="username" /></label>
    </div>
	<div class="section"><span>2</span>Amount</div>
    <div class="inner-wrap">
        <label>Amount to be withdrawn <input type="BIGINT" name="value" /></label>
    </div>
	
	<div class="button-section">
     <input type="submit" name="Send" value="send" />
	
</form>
</body>
</html>
<?php
$connection=  mysqli_connect("localhost","root","","transaction") or die("coudn't connect to the server");

if(isset($_POST['Send']))
{       $username=$_POST['username'];
        $value=$_POST['value'];

        $user=mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM login WHERE login_id='$username'"),MYSQLI_ASSOC);
        $amount=$user['amount'];
		
		echo nl2br("\nAccount details::\n"."user::".$username."\nbalance::".$amount."\n");
		
		if($amount-$value<0)
		die("can't process your request,amount is less than 1000INR in your account! <a href='options.php'> &larr; Back</a>");
	    
	    mysqli_query($connection,"UPDATE login SET amount=amount-'$value' WHERE login_id='$username'");
		
        $user=mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM login WHERE login_id='$username'"),MYSQLI_ASSOC);
        $amount=$user['amount'];
		
		echo nl2br("REQUEST SUCCESSFUL\nAmount after transaction\n");
		echo nl2br("\nAccount details::\n"."user::".$username."\nbalance::".$amount."\n");

		die("INR<a href='options.php'> &larr; Back</a>");
		
}
?>