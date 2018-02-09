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
        <label>depositor's login-id <input type="text" name="username1" /></label>
    </div>
	
	<div class="section"><span>2</span>Username</div>
    <div class="inner-wrap">
        <label>recipients login-id <input type="text" name="username2" /></label>
    </div>
	
	<div class="section"><span>3</span>Amount</div>
    <div class="inner-wrap">
        <label>Amount to be Transferred <input type="BIGINT" name="value" /></label>
    </div>
	
	<div class="button-section">
     <input type="submit" name="Send" value="send" />
	
</form>
</body>
</html>
<?php
$connection=  mysqli_connect("localhost","root","","transaction") or die("coudn't connect to the server");

if(isset($_POST['Send']))
{       $username1=$_POST['username1'];
        $username2=$_POST['username2'];
		$value=$_POST['value'];
		
        $user=mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM login WHERE login_id='$username1'"),MYSQLI_ASSOC);
        $amount1=$user['amount'];
		
		if($amount1-$value<0)
		die("can't process your request,low amount in your account to be transferred! <a href='options.php'> &larr; Back</a>");
	
		$user=mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM login WHERE login_id='$username2'"),MYSQLI_ASSOC);
        $amount2=$user['amount'];
		
		echo nl2br("\nAccount details::\n"."user 1::".$username1."\nbalance::".$amount1."\n");
		echo nl2br("user 2::".$username2."\nbalance::".$amount2);
		
	    mysqli_query($connection,"UPDATE login SET amount=amount-'$value' WHERE login_id='$username1'");
		mysqli_query($connection,"UPDATE login SET amount=amount+'$value' WHERE login_id='$username2'");
        
		echo "TRANSFER SUCCESSFUL";
		die("<a href='options.php'> &larr; Back</a>");
}
?>