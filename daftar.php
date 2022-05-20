<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/styleDaftar.css">
    <link rel="shortcut icon" href="../images/logo-title.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <div class="header-left">
            <img class="logo" src="images/logo-white.png" alt="logo">
        </div>
        <div class="header-right">
            <a href="index.php">Beranda</a>
            <a href="latihan.php">Latihan</a>
            <a href="kontak.php">Kontak</a>
            <a href="daftar.php">Login</a>
        </div>
    </header>

    <main>
        <h2>Selamat Datang</h2>
        <!-- <h4>Hidup sehat bersama Sehat Dulu</h4> -->
        <form action="daftar.php" method="POST">
            <label for="username">Username :</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="password">Password :</label><br>
            <input type="text" id="password" name="password">
            <button type="submit" value="submit">Login</button>
        </form>
    </main>

    <footer>
        <!-- <img src="images/logo-black.png" alt="logo"> -->
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
</html>