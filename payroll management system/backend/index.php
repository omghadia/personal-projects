<?php
include('config.php');
$msg = "";
if (isset($_POST['signin-button'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$res = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
	if (mysqli_num_rows($res) <= 0) {
		$msg = "Username/Password Incorrect!";
	} else {
		$row = mysqli_fetch_assoc($res);
		$_SESSION['UNAME'] = $row['email'];
		echo "<script> window.location.href = 'home.php' </script>";
	}
}
?>
<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width",initial scale="1.0">
    <title>Sigin Page</title>
    <link rel="stylesheet" href="signin.css">
</head>
<body>
    <div class="container">
        <div class="form-group">
            <h1>Sign In</h1>
            <form action="" method="POST">
                <div class="input-group">
                    <div class="input-field">
                        <i class="fa solid fa user"></i>
                        <input type="text" name ="email" placeholder="Email">
                    </div>

                    <div class="input-field">
                        <i class="fa solid fa user"></i>
                        <input type="password" name = "password"  placeholder="Password">
                    </div>
                    
                </div>
                <center><button type="submit" name="signin-button"  onclick="">Submit</button></center>
				<?php echo $msg; ?>
            </form>
        </div>
    </div>
</body>
</html>