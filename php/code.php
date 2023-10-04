<?php
include('connectdb.php');
include('../headtotoe/header.php');

session_start();
if (isset($_POST['updatebtn'])) {
  $id = $_POST['edit_id'];
  $username = $_POST['edit_username'];
  $email = $_POST['edit_email'];
  $password = $_POST['edit_password'];

  $query = "UPDATE user SET Username='$username', Email='$email', Password ='$password' WHERE id='$id' ";
  $query_run = mysqli_query($conn, $query);

  if ($query_run) {
    echo '
        <script>
          setTimeout(function() {
            swal({
              title: "อัปเดทข้อมูลสำเร็จ!",
              text: "จะหายไปใน 2 วินาที.",
              type: "success",
              timer: 2000,
              showConfirmButton: false
            }, function() {
              window.location.href = "register.php";
            });
          });
        </script>
        ';

    // $_SESSION['status'] = "Your Data is Updated";
    // $_SESSION['status_code'] = "success";
    //  header('Location: register.php');
  } else {
    $_SESSION['status'] = "Your Data is NOT Updated";
    $_SESSION['status_code'] = "error";
    header('Location: register.php');
  }
}
if (isset($_POST['update_pbtn'])) {
  $id = $_POST['edit_pid'];
  $title = $_POST['edit_title'];
  $text = $_POST['edit_text'];
  // $img = $_POST['image'];
  // $password = $_POST['edit_password'];
  $img = $_FILES['image']['name'];
  $img_tmp = $_FILES['image']['tmp_name'];
  $img_path = '../images/' . $img;

  if (!empty($img_tmp)) {
    if (move_uploaded_file($img_tmp, $img_path)) {
      $query = "UPDATE articles SET title='$title' ,txtMessage='$text' , img = '$img_path'  WHERE a_id='$id' ";
      $query_run = mysqli_query($conn, $query);

      if ($query_run) {
        echo '
        <script>
          setTimeout(function() {
            swal({
              title: "อัปเดทข้อมูลสำเร็จ!",
              text: "จะหายไปใน 2 วินาที.",
              type: "success",
              timer: 2000,
              showConfirmButton: false
            }, function() {
              window.location.href = "post_manage.php";
            });
          });
        </script>
        ';

        // $_SESSION['status'] = "Your Data is Updated";
        // $_SESSION['status_code'] = "success";
        //  header('Location: register.php');
      } else {
        echo '
        <script>
          setTimeout(function() {
            swal({
              title: "อัปเดทข้อมูลไม่สำเร็จ!",
              text: "จะหายไปใน 2 วินาที.",
              type: "warning",
              timer: 2000,
              showConfirmButton: false
            }, function() {
              window.location.href = "post_manage.php";
            });
          });
        </script>
        ';
      }
    } else {
      echo "Error uploading image.";
    }
  } else {
    $query = "UPDATE articles SET title='$title', txtMessage='$text' WHERE a_id='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
      echo '
        <script>
          setTimeout(function() {
            swal({
              title: "อัปเดทข้อมูลสำเร็จ!",
              text: "จะหายไปใน 2 วินาที.",
              type: "success",
              timer: 2000,
              showConfirmButton: false
            }, function() {
              window.location.href = "post_manage.php";
            });
          });
        </script>
        ';
    } else {
      echo '
        <script>
          setTimeout(function() {
            swal({
              title: "อัปเดทข้อมูลไม่สำเร็จ!",
              text: "จะหายไปใน 2 วินาที.",
              type: "warning",
              timer: 2000,
              showConfirmButton: false
            }, function() {
              window.location.href = "post_manage.php";
            });
          });
        </script>
        ';
    }

  }
}

if (isset($_POST['update_pkbtn'])) {
  $id = $_POST['edit_pkid'];
  $title = $_POST['edit_title'];
  $text = $_POST['edit_text'];
  $query = "UPDATE prakad SET title='$title', txtmssge='$text' WHERE pk_id='$id'";
  $query_run = mysqli_query($conn, $query);

  if ($query_run) {
    echo '
        <script>
          setTimeout(function() {
            swal({
              title: "อัปเดทข้อมูลสำเร็จ!",
              text: "จะหายไปใน 2 วินาที.",
              type: "success",
              timer: 2000,
              showConfirmButton: false
            }, function() {
              window.location.href = "notice_manage.php";
            });
          });
        </script>
        ';
  } else {
    echo '
        <script>
          setTimeout(function() {
            swal({
              title: "อัปเดทข้อมูลไม่สำเร็จ!",
              text: "จะหายไปใน 2 วินาที.",
              type: "warning",
              timer: 2000,
              showConfirmButton: false
            }, function() {
              window.location.href = "notice_manage.php";
            });
          });
        </script>
        ';
  }
}

if (isset($_POST['delete_btn'])) {
  $id = $_POST['delete_id'];

  $query = "DELETE FROM user WHERE id='$id' ";
  $query_run = mysqli_query($conn, $query);

  if ($query_run) {
    echo '<script>
             setTimeout(function() {
              swal({
                  title: "ลบข้อมูลสำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "register.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';


    // $_SESSION['status'] = "Your Data is Deleted";
    // $_SESSION['status_code'] = "success";
    // header('Location: register.php'); 
  } else {
    echo '<script>
             setTimeout(function() {
              swal({
                  title: "ลบข้อมูลไม่สำเร็จ",
                  type: "error"
              }, function() {
                  window.location = "register.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
  }
}
if (isset($_POST['delete_pbtn'])) {
  $id = $_POST['delete_pid'];

  $query = "DELETE FROM articles WHERE a_id='$id' ";
  $query_run = mysqli_query($conn, $query);

  if ($query_run) {
    echo '<script>
             setTimeout(function() {
              swal({
                  title: "ลบข้อมูลสำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "post_manage.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';


    // $_SESSION['status'] = "Your Data is Deleted";
    // $_SESSION['status_code'] = "success";
    // header('Location: register.php'); 
  } else {
    echo '<script>
             setTimeout(function() {
              swal({
                  title: "ลบข้อมูลไม่สำเร็จ",
                  type: "error"
              }, function() {
                  window.location = "post_manage.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
  }
}
if (isset($_POST['delete_pkbtn'])) {
  $id = $_POST['delete_pkid'];

  $query = "DELETE FROM prakad WHERE pk_id='$id' ";
  $query_run = mysqli_query($conn, $query);

  if ($query_run) {
    echo '<script>
             setTimeout(function() {
              swal({
                  title: "ลบข้อมูลสำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "notice_manage.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';


    // $_SESSION['status'] = "Your Data is Deleted";
    // $_SESSION['status_code'] = "success";
    // header('Location: register.php'); 
  } else {
    echo '<script>
             setTimeout(function() {
              swal({
                  title: "ลบข้อมูลไม่สำเร็จ",
                  type: "error"
              }, function() {
                  window.location = "notice_manage.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
  }
}
if (isset($_POST['registerbtn'])) {
  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['confirmpassword'];

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
  if (empty($password)) {
    echo "<script>alert('กรุณาใส่password...'); window.history.back();</script>";
  } else {

    $eu_query = "SELECT * FROM user WHERE Username ='$username' OR Email='$email' ";
    $eu_query_run = mysqli_query($conn, $eu_query);
    if (mysqli_num_rows($eu_query_run) > 0) {
      // $_SESSION['status'] = "Username or Email Already Taken. Please Try Another one.";
      echo "<script>alert( 'Username or Email Already Taken. Please Try Another one...'); window.history.back();</script>";
      // $_SESSION['status_code'] = "error";
      // header('Location: register.php');
    } else {
      if ($password == $cpassword) {
        $query = "INSERT INTO user (Name,Lastname,Username,Email,Password) VALUES ('$name','$lastname','$username','$email','$password')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
          // echo "Saved";
          echo '<script>
             setTimeout(function() {
              swal({
                  title: "เพิ่มผู้ใช้สำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "register.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
          // $_SESSION['status'] = "User Profile Added";
          // $_SESSION['status_code'] = "success";
          // header('Location: register.php');
        } else {
          //echo "<script>alert('User Profile Not Added...'); window.history.back();</script>";
          // $_SESSION['status'] = "User Profile Not Added";
          // $_SESSION['status_code'] = "error";
          // header('Location: register.php');
          echo '<script>
             setTimeout(function() {
              swal({
                  title: "เพิ่มผู้ใช้ไม่สำเร็จ",
                  type: "error"
              }, function() {
                  window.location = "register.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
        }
      } else {
        echo "<script>alert('Password and Confirm Password Does Not Match...'); window.history.back();</script>";
        // $_SESSION['status'] = "Password and Confirm Password Does Not Match";
        // $_SESSION['status_code'] = "warning";
        // header('Location: register.php');
      }
    }

  }
}
?>