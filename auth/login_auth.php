<?php
session_start();
require_once("../config.php");

if ($_server["request_method"] == "post") {
    $username = $_post["username"];
    $password = $_post["password"];

    $sql = "select * from users where username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row["password"])) {
            $_SESSION["username"] = $username;
            $_SESSION["name"] = $row ["$name"];
            $_SESSION["role"] = $row ["$role"];
            $_SESSION["user_id"] = $row ["$user_id"];
            
            $_session['notification'] = [
                'type' => 'primary',
                'message' => 'selamat datang kembali!'
            ];
            header('Location: ../dashboard.php')
            exit();
        }  else {
            $_session['notification'] = [
                'type' => 'danger',
                'message' => 'username atau password salah!'
            ];
        }
      }else {
        
        $_session['notification'] =[
          'type' => 'danger',
          'message' => 'username atau password salah!'
        ];
       }
       header('location: login.php');
       exit();
    }
    $conn->close();
    ?>