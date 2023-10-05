<?php
include('connectdb.php');
include('../headtotoe/header.php');

?>

<head>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css"> -->


    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- <link rel="stylesheet" href="../css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/tooplate-style.css">
</head>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มผู้ใช้งาน</h5>
                <a href="register.php"><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></a>
            </div>
            <form action="code.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <br></br>
                        <label> Name </label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label> Lastname </label>
                        <input type="text" name="lastname" class="form-control" placeholder="Enter Lastname">
                    </div>
                    <div class="form-group">
                        <label> Username </label>
                        <input type="text" name="username" class="form-control" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label>เบอร์โทร</label>
                        <input type="text" name="tel" class="form-control" placeholder="Enter Tel">

                    </div>
                    <div class="form-group ">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirmpassword" class="form-control"
                            placeholder="Confirm Password">
                    </div>
                    <div class="from-group">
                        <label for="">สถานะ</label>
                        <select name="role" class="form-control">
                            <option value="">--เลือกสถานะ--</option>
                            <option value="a">แอดมิน</option>
                            <option value="m">พนักงานขาย</option>
                            <option value="n">พนักงานคลัง</option>
                        </select>

                    </div>


                </div>
                <div class="modal-footer">
                    <a href="register.php" class="btn btn-danger"> Close </a>
                    <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>



<?php

?>

<div class="container-fluid">

    <div class="card shadow my-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-2 font-weight-bold text-primary ">จัดการผู้ใช้</h6>
            <?php
            ini_set('display_errors', 1);
            error_reporting(~0);
            $strKeyword = null;
            if (isset($_POST["txtKeyword"])) {
                $strKeyword = $_POST["txtKeyword"];
            }
            ?>
            <form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">

                <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $strKeyword; ?>">
                <input type="submit" value="Search">

            </form>
            <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal"
                data-bs-target="#exampleModal">เพิ่มผู้ใช้งาน</button>

        </div>
        <div class="card-body">
            <div class="table-responsive">

                <?php


                $query = "SELECT * FROM user WHERE Name LIKE '%" . $strKeyword . "%'  limit {$start},{$perpage}";
                $query_run = mysqli_query($conn, $query);
                $totalUsers = mysqli_num_rows($query_run);
                // echo "Total users: " . $totalUsers . "<br><br>";
                ?>
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> ชื่อ </th>
                            <th> นามสกุล </th>
                            <th> ชื่อผู้ใช้ </th>
                            <th> เบอร์โทร </th>
                            <th> รหัสผ่าน</th>
                            <th> สถานะ</th>
                            <th>EDIT</th>
                            <!-- <th>DELETE</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row['id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['Name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['Lastname']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['Username']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['Tel']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['Password']; ?>
                                    </td>
                                    <td>
                                        <!-- <ฃ?php echo $row['Role']; ?> -->
                                        <?php
                                        $roleValue = $row['Role'];

                                        if ($roleValue === 'a') {
                                            echo 'แอดมิน';
                                        } elseif ($roleValue === 'm') {
                                            echo 'พนักงานขาย';
                                        }elseif ($roleValue === 'n') {
                                            echo 'พนักงานคลัง';
                                        }
                                         else {
                                            // Handle other cases or display a default value if needed
                                            echo 'Unknown Role';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <form action="user_edit.php" method="post">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="edit_btn" class="fa fa-pencil-square-o"></button>
                                        </form>
                                    </td>
                                    <td>
                                        <!-- <form action="code.php" method="post">
                                            <input type="hidden" name="delete_id" value="<\?php echo $row['id']; ?>">
                                            <button type="submit" name="delete_btn" class="btn btn-danger">
                                                DELETE</button>
                                        </form> -->
                                    </td>
                                </tr>

                                <?php
                            }



                        } else {
                            echo "No Record Found";
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                $sql2 = "select * from user ";
                $query2 = mysqli_query($conn, $sql2);
                $total_record = mysqli_num_rows($query2);
                // echo "Total users: " . $total_record . "<br><br>";
                $total_page = ceil($total_record / $perpage);
                ?>

                <nav>
                    <ul class="pagination ">
                        <li>
                            <a href="register.php?page=1" aria-label="Previous">
                                <span aria-hidden="true">&NestedLessLess;</span>
                            </a>
                        </li>
                        <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                            <li><a href="register.php?page=<?php echo $i; ?>">
                                    <?php echo $i; ?>
                                </a></li>
                        <?php } ?>
                        <li>
                            <a href="register.php?page=<?php echo $total_page; ?>" aria-label="Next">

                                <span aria-hidden="true">&NestedGreaterGreater;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.js"></script>
<?php

?>