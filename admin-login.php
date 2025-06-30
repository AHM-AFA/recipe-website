<?php
    include "database.php";
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM `admin` WHERE `username` = '$username'";
        $row = mysqli_fetch_assoc((mysqli_query($conn, $sql)));
        if($row){
            if(password_verify($password, $row['password'])){
                session_start();
                $_SESSION['name'] = $username;
                header("Location: admin");
                exit();
            }
            else{
                echo("<script> alert('Incorrect password'); </script>");
            }
        }
        else{
            echo("<script> alert('Incorrect Username'); </script>");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Statics/style.css">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
</head>
<body>
    <div class="login">
        
        <form method="POST" action="admin-login.php" class="login-form">
            <img src="Images/WhatsApp Image 2025-05-12 at 14.07.22_4641ef17.jpg" class="logo-login">
            <div>
                <label>
                    Username:
                </label>
                <input type="text" name="username">
                <label>
                    Password:
                </label>
                <input type="password" name="password">
                <input type="submit">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="Statics/script.js"></script>
</body>
</html>