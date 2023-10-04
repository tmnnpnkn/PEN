<?php
session_start();
session_destroy();
echo "<script>alert('ยืนยันการออกจากระบบ...'); window.location ='../login.html';</script>";
// header("Location: ../logad.html ");

?>