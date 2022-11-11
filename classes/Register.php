<?php
include_once('lib/Database.php');
class Register
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addRegister($data, $file)
    {
        $role_as = $data['role_as'];
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];
        $phone = $data['phone'];
        $address = $data['address'];

        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['photo']['name'];
        $file_size = $file['photo']['size'];
        $file_temp = $file['photo']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $upload_image = "upload/" . $unique_image;

        if ($file_size > 1048567) {
            $msg = "ขนาดไฟล์ต้องน้อยกว่า";
            return $msg;
        } elseif (in_array($file_ext, $permited) == false) {
            $msg = "คุณสามารถ อัพโหลดได้เพียง" . implode(', ', $permited);
            return $msg;
        } else {
            move_uploaded_file($file_temp, $upload_image);

            $query = "INSERT INTO tb_register(name, email, password, phone, photo, address, role_as)
            VALUES ('$name','$email','$password','$phone','$upload_image','$address','$role_as')";

            $result = $this->db->insert($query);

            if ($result) {
                $msg = "ลงทะเบียนเรียบร้อยแล้ว";
                return $msg;
            } else {
                $msg = "ลงทะเบียนผิดพลาด";
                return $msg;
            }
        }
    }
}
?>