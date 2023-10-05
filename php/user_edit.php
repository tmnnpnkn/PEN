<?php
include('connectdb.php');
include('../headtotoe/header.php');
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <head>
        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> EDIT User Profile </h6>
                </div>
                <div class="card-body">
                    <?php

                    if (isset($_POST['edit_btn'])) {
                        $id = $_POST['edit_id'];

                        $query = "SELECT * FROM user WHERE id='$id' ";
                        $query_run = mysqli_query($conn, $query);


                        foreach ($query_run as $row) {
                            ?>

                            <form action="code.php" method="POST">

                                <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

                                <div class="form-group">
                                    <label> ชื่อผู้ใช้ </label>
                                    <input type="text" name="edit_username" value="<?php echo $row['Username'] ?>"
                                        class="form-control" placeholder="Enter Username">
                                </div>
                                <div class="form-group">
                                    <label>เบอร์โทร</label>
                                    <input type="text" name="edit_tel" value="<?php echo $row['Tel'] ?>" class="form-control"
                                        placeholder="Enter Tel">
                                </div>
                                <div class="form-group">
                                    <label>รหัสผ่าน</label>
                                    <input type="password" name="edit_password" value="<?php echo $row['Password'] ?>"
                                        class="form-control" placeholder="Enter Password">
                                </div>
                                <!-- <div class="form-group">
                                    <label>สถานะ</label>
                                    <input type="text" name="edit_role" value="<\?php echo $row['Role'] ?>" class="form-control"
                                        placeholder="Enter Role">
                                </div> -->
                                <div class="from-group mb-3">
                                    <label for="">สถานะ</label>
                                    <select name="edit_role" class="form-control">
                                        <option value="">--เลือกสถานะ--</option>
                                        <option value="a">แอดมิน</option>
                                        <option value="m">พนักงานขาย</option>
                                        <option value="n">พนักงานคลัง</option>
                                    </select>

                                </div>
                                <br>
                                <a href="register.php" class="btn btn-danger"> CANCEL </a>
                                <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>

                            </form>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        </div>