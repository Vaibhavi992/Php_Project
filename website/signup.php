<?php
if(isset($_SESSION['uid']))
{
	echo "<script>
		window.location='index'
		</script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="./assets/loginpage/style.css">

</head>

<body>

    <body>
        <section class="container">
            <div class="login-container">
                <div class="circle circle-one"></div>
                <div class="form-container">
                    <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png"
                        alt="illustration" class="illustration" />
                    <h1 class="opacity">Sign UP</h1>
                    <form method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td><input type="text" name="username" placeholder="USERNAME" required /></td>
                                <td><input type="text" name="gender" placeholder="GENDER" required/></td>
                            </tr>
                        </table>
                        <input type="email" name="email" placeholder="EMAIL" required />
                        <input type="password" name="password" placeholder="PASSWORD" required />
                        <input type="file" name="profileImg" placeholder="PROFILE-PIC" required />
                        <button name="submit" type="submit" class="opacity">Register</button>

                    </form>
                    <a href="login">Back To Login</a>
                </div>
                <div class="circle circle-two"></div>
            </div>

            <div class="theme-btn-container"></div>
        </section>
    </body>
    <!-- partial -->
    <script src=".assets/loginpage/script.js"></script>
</body>

</html>