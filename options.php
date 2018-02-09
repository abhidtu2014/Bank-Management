<?php
$connection=  mysqli_connect("localhost","root","","transaction") or die("coudn't connect to the server");
?>
<html>
 <title><?php echo $_POST['username']; ?></title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>

<body>

<div class="form-style-10">
<h1>what you want to do?<span>options::</span></h1>
<form action="index.php" method="post"> 
<div class="button-section">
     <input type="submit" name="Logout" value="logout"/>
 </div>
</form>  

    <form action="rs1.php" method="post"> 
    <div class="button-section">
	<div class="section"><span>1</span></div>
    <input type="submit" name="check_balance" value="Check Balance"/>
    </div>
	</form>
	
    <br />
	
	<form action="rs2.php" method="post"> 
	<div class="button-section">
	<div class="section"><span>2</span></div>
     <input type="submit" name="transfer amount" value="Transfer Amount" />

    </div>
	</form>
	
	<br />

	
	<form action="rs3.php" method="post"> 
	<div class="button-section">
	<div class="section"><span>3</span></div>
     <input type="submit" name="withraw amount" value="Withdraw Amount" />

    </div>
	</form>

	<br />
	<form action="rs4.php" method="post"> 
	<div class="button-section">
	<div class="section"><span>4</span></div>
     <input type="submit" name="deposit amount" value="Deposit Amount" />

    </div>	
	</form>
</div>

</body>
</html>