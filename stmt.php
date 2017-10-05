<?php

include 'koneksi.php';

$stmt = $con->prepare("SELECT nama, username, password FROM master_admin WHERE USERNAME = ?");
$stmt->bind_param("s", $username);
 
$username = "burhan";
$pass = "subur";
$stmt->execute();
 
$stmt->bind_result($nama, $username, $password);
$stmt->store_result();
 
if($stmt->num_rows == 1) {
	if($stmt->fetch()) //fetching the contents of the row
	{
		if(password_verify($pass, $password)){ 
			echo $nama."<br>".$username."<br>".$password;
			exit();
		} else {
			echo "Password anda salah";
			exit();
		}
   }
} else {
	echo "Username tidak terdaftar!";
}

 
$stmt->close();
$con->close();

?>
