<?php

$connection=  mysqli_connect("localhost","root","password","transaction") or die("coudn't connect to the server");

       $t=$_POST['username'];
        $user=mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM login WHERE login_id='$t'"),MYSQLI_ASSOC);
        $amount=$user['amount'];
	    
		echo $amount;
?>