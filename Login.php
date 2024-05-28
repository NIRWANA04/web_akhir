<?php
session_start();
include "koneksi.php";

// Jika tombol login ditekan
if(isset($_POST['login'])){
    $name = $_POST['name'];
    $password = md5($_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE name='$name' AND password='$password'");

    if(mysqli_num_rows($query) > 0){
        $data = mysqli_fetch_array($query);
        $_SESSION['user'] = $data;
        header("Location: Menu.html"); 
        exit; 
    } else {
        $error = "Name atau Password Salah.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Ke Web Reservasi Cafe ITH</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }

        .container {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            border-radius: 5px;
            background-color: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: calc(100% - 10px);
            height: 40px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn-primary {
            width: calc(100% - 10px);
            height: 40px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        }

        h3 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .error-message {
            color: red;
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post">
            <table align="center">
                <tr>
                    <td colspan="2" align="center">
                        <h3>Login</h3>
                    </td>
                </tr>
                <?php if(isset($error)): ?>
                <tr>
                    <td colspan="2" class="error-message"><?php echo $error; ?></td>
                </tr>
                <?php endif; ?>
                <tr>
                    <td><i class="fas fa-user"></i></td>
                    <td><input type="text" name="name" class="form-control" placeholder="Name"></td>
                </tr>
                <tr>
                    <td><i class="fas fa-lock"></i></td>
                    <td><input type="password" name="password" class="form-control" placeholder="Password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" name="login" class="btn-primary">Login</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
