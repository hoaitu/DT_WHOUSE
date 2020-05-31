<?php 


require_once ('../connection.php');
// code bên url
if (!isset ($_GET["code"])){
	exit("Can't find page");
	
	}

	$code = $_GET["code"];
	$getEmailQuery = mysqli_query($connection , "SELECT email FROM resetpassword WHERE code='$code'");

		// var_dump($getEmailQuery);
	// ==0 là ko có dữ liệu
	if (mysqli_num_rows($getEmailQuery) == 0) {
		exit ("Can't find page");

	}

	if (isset($_POST['pass'])) {
		$pw = $_POST['pass'] ;
		// mã hóa mật khẩu
		$pw = md5($pw);
		// 
		// láy ra giá trị đầu tiên của cột đo s
		$row = mysqli_fetch_array($getEmailQuery);
		$email = $row ['email'];
		// 
		$query = mysqli_query($connection , "UPDATE user SET password = '$pw' WHERE email ='$email'");
		# code...
		if ($query){
			$query =  mysqli_query($connection , "DELETE FROM resetpassword WHERE code='$code'" );
			exit ("Password update");
	}else {
		exit ("Something went wrong");
	}
}
	
 ?>
<form method="POST">
    <input type="password" name="pass" ><br>

 <input type="submit" name="submit" value="Update password"><br>
</form>