<?php
include "connectdb.php";

if (isset($_POST['submitr'])) {
  $name = mysqli_real_escape_string($conn, $_POST['InputName']);
  $lastname = mysqli_real_escape_string($conn, $_POST['InputLname']);
  $username = mysqli_real_escape_string($conn, $_POST['InputUsername']);
  $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
  $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $datetime = date('Y-m-d H:i:s');

  if (empty($name)) {
    echo "<script>alert('กรุณาใส่ชื่อ...'); window.history.back();</script>";
  }
  if (empty($lastname)) {
    echo "<script>alert('กรุณาใส่นามสกุล...'); window.history.back();</script>";
  }
  if (empty($username)) {
    echo "<script>alert('กรุณาใส่username...'); window.history.back();</script>";
  }
  if (empty($email)) {
    echo "<script>alert('กรุณาใส่email...'); window.history.back();</script>";
  }
  if (empty($password1)) {
    echo "<script>alert('กรุณาใส่password...'); window.history.back();</script>";
  }
  if ($password1 != $password2) {
    echo "<script>alert('passwordไม่ตรงกัน...'); window.history.back();</script>";
  }

  $query = "SELECT * FROM user WHERE Username='$username' OR Email='$email'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    echo "Username or email already exists";

  }

  // Insert the form data into the database
  $query = "INSERT INTO user(Name, Lastname, Username, Password, Email,Create_date) VALUES ('$name','$lastname','$username','$password1','$email','$datetime')";
  $run = mysqli_query($conn, $query);
  if ($password1 == $password2) {
    if ($run) {
      echo "<script>alert('สมัครสมาชิกสำเร็จ...'); window.location ='../login.html';</script>";
    }
  } else {
    echo "<script>alert('สมัครสมาชิกไม่สำเร็จ...'); window.history.back()</script>" . mysqli_error($conn);
  }


  // Close the database connection
  mysqli_close($conn);
} else {
  echo "All fields are required";
}



?>