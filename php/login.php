<?php

include "connectdb.php";

   
 
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
   
 session_start();

    $sql = "SELECT * FROM user WHERE Username = '" . $username . "' AND Password = '" . $password . "' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);
        $_SESSION["role"] = $row["Role"];
        if ($_SESSION["role"] == 'a') {
            $_SESSION['username'] = $username;
            header("Location: ../adminpanel.php");
        }else if ($_SESSION["role"] == 'n' OR $_SESSION["role"] == 'm' ) {
            $_SESSION['username'] = $username;
            header("Location: ../index.php");
        } 
        else {
            echo "<script>";
            echo "alert(\" Username หรือ  Password ไม่ถูกต้อง\");";
            echo "window.history.back()";
            echo "<script>";
        }

    } else{
        echo "<script>";
            echo "alert(\" Username หรือ  Password ไม่ถูกต้อง\");"; 
            echo "window.history.back()";
        echo "</script>";

      }
}



?>