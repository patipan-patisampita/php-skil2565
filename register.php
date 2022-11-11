<?php include("inc/header.php") ?>
<?php include("inc/navbar.php") ?>

<?php
    include_once('classes/Register.php');
    $res = new Register();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $register = $res->addRegister($_POST,$_FILES);
    }
?>

<div class="container my-3">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h3>User Registration</h3>
                </div>

                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="">ลงทะเบียนหน้าที่ ระบบสั่งจองอาหารออนไลน์</label>
                            <select name="role_as" class="form-control" required>
                                <option value="">เลือกหน้าที่</option>
                                <option value="manager">ผู้ดูแลร้านอาหาร</option>
                                <option value="customer">สมาชิกหรือลูกค้า</option>
                                <option value="rider">ผู้ส่งอาหาร</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="">ชื่อ-สกุล</label>
                            <input type="text" name="name" class="form-control" required placeholder="Enter Your Name">
                        </div>

                        <div class="mb-3">
                            <label for="">อีเมลล์</label>
                            <input type="text" name="email" class="form-control" required placeholder="Enter Your Email">
                        </div>

                        <div class="mb-3">
                            <label for="">รหัสผ่าน</label>
                            <input type="text" name="password" class="form-control" required placeholder="Enter Your Password">
                        </div>

                        <div class="mb-3">
                            <label for="">ยืนยันรหัสผ่าน</label>
                            <input type="text" name="confirm_password" class="form-control" required placeholder="Enter Your Confirm Password">
                        </div>

                        <div class="mb-3">
                            <label for="">โทรศัพท์</label>
                            <input type="text" name="phone" class="form-control" required placeholder="Enter Your Phone">
                        </div>

                        <div class="mb-3">
                            <label for="">รูปภาพ</label>
                            <input type="file" name="photo" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="">ที่อยู่</label>
                            <textarea name="address" rows="3" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <input type="submit" value="ลงทะเบียน" class="btn btn-success form-control">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include("inc/footer.php") ?>