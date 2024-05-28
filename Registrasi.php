<?php
session_start();
include "koneksi.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Menggunakan MD5 untuk mengenkripsi password

    $query = mysqli_query($koneksi, "INSERT INTO user (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$password')");

    if ($query) {
        echo '<script>alert("Selamat, pendaftaran anda berhasil. Silahkan login."); window.location.href="Login.php";</script>';
    } else {
        echo '<script>alert("Pendaftaran gagal.")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Ke Web Kos-kosan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-control {
            width: 100%;
            height: 40px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn-primary {
            width: 100%;
            height: 40px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .input-group-addon {
            margin-right: 10px;
        }

        .input-group {
            display: flex;
            align-items: center;
        }

        .clearfix {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .icon {
            font-size: 18px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="Registrasi.php" method="post" class="bg-white">
            <h2 class="text-center">Registrasi</h2>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fas fa-user"></i>
                    </span>
                    <input autocomplete="off" required="required" class="form-control text-center" type="text" name="name" id="name" placeholder="Name">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fas fa-phone"></i>
                    </span>
                    <input autocomplete="off" required="required" type="tel" name="phone" id="phone" class="form-control text-center" placeholder="Phone">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input autocomplete="off" required="required" type="email" name="email" id="email" class="form-control text-center" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input autocomplete="off" required="required" type="password" name="password" id="password" class="form-control text-center" placeholder="Password">
                </div>
            </div>
            <div class="clearfix">
                <input type="submit" name="submit" value="Registrasi" class="btn btn-primary float-right">
                <p class="text-center"><a href="Login.php"></a></p>
            </div>
        </form>
    </div>
</body>
</html>
