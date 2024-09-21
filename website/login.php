 <!-- below statment for if login then open website -->
<?php
if (isset($_SESSION['uid'])) {
    echo "<script>
		window.location='index'
		</script>";
}
// include_once ('header.php');   // if the header call in different component
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/loginpage/style.css">

</head>

<body>
    <!-- partial:index.partial.html -->

    <body>
        <section class="container">
            <div class="login-container">
                <div class="circle circle-one"></div>
                <div class="form-container">
                    <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png"
                        alt="illustration" class="illustration" />
                    <h1 class="opacity">LOGIN</h1>
                    <form method="post" enctype="multipart/form-data">
                        <input type="text" name="email" placeholder="EMAIL" required />
                        <input type="password" name="password" placeholder="PASSWORD"  required />
                        <button name="submit" type="submit" class="opacity">SUBMIT</button>
                    </form>
                    <a href="signup">If You Not Register Pls Sign Up</a>
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