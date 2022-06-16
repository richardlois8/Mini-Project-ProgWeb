<?php
    require('functions.php');
    session_start();

    if(isset($_SESSION['userLogin'])){
        if($_SESSION['userLogin'] == "true"){
            header("location:crud.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sehat Dulu | Login</title>
    <link rel="stylesheet" href="css/styleLogin.css?<?php echo time(); ?>">
    <link rel="shortcut icon" href="images/logo-title.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <div class="header-left">
            <img class="logo" src="images/logo-white.png" alt="logo">
        </div>
        <div class="header-right">
            <a href="index.php">Beranda</a>
            
            <a href="kontak.php">Kontak</a>
            <a href="login.php">Login</a>
        </div>
    </header>

    <main>
        <h2>Selamat Datang</h2>
        <div class="form-login">
            <form action="login.php" method="POST">
                <img src="images/contact/admin.png" alt="Admin">
                <!-- <label for="username">Username :</label><br> -->
                <input type="text" id="username" name="username" placeholder="  Username"><br>
                <!-- <label for="password">Password :</label><br> -->
                <input type="password" id="password" name="password" placeholder="  Password"> <br>
                <button type="submit" value="submit" name ="submit" id="submit">Login</button>
            </form>
        </div>
    </main>

    <footer>
        <div class="icon">
            <i class="fa fa-facebook fa-2x"></i>
            <i class="fa fa-twitter fa-2x"></i>
            <i class="fa fa-instagram fa-2x"></i>
            <i class="fa fa-whatsapp fa-2x"></i>
        </div>
        <div class="footer-menu">
            <ul>
                <li><a href="#">Workout Videos</a></li>
                <li><a href="#">Instructor</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </div>
        <div class="caption-footer">
            <h3>Sehat Dulu</h3>
            <p>Let's go workout at home | All Rights Reserved</p>
        </div>
    </footer>
</body>
<script src="js/login.js"></script>
</html>

<?php
var_dump($_POST);
    if(isset($_POST["submit"]) && isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST["password"];
        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password' LIMIT 1;";
        $result = query($sql);

        if($username == "" || $password == ""){
            echo "<script>alert('Username atau Password kosong');</script>";
        }elseif(count($result) > 0){
            if($result[0]['username'] == "admin" && $result[0]['password'] == "admin"){
                $_SESSION['userLogin'] = "true";
                header("Location: crud.php");
            }
        }else{
            echo "<script>alert('Username atau Password salah');</script>";
        }
    }
?>