<?php
// có class chứa các function thực thi xử lý logic 
class ProductController
{
    public $modelProduct;

    //tạo 1 biến để gọi model user
    public $modelUser;

    public function __construct() {
        $this->modelProduct = new ProductModel();
        //kết nối model user
        $this->modelUser = new UserModel();

    }

    public function Home(){
        $title = "Đây là trang chủ nhé hahaa";
        $thoiTiet = "Hôm nay trời có vẻ là mưa";
        require_once './views/trangchu.php';
    }



/////////////////////////////////////////     phần php của trang login      /////////////////////////////////////////
    public function Login(){
        require_once BASE_URL_VIEWS.'login/login.php';
    }

    public function formlogin() {
        if(isset($_POST['login'])) {
            $emailUser= $_POST['email'];
            $passWord= $_POST['password'];
            //lưu thông tin đã đăng nhập và gán vào hàm trong model để kiểm tra thông tin
            $user= $this->modelUser->getUser($emailUser,$passWord);
            if($user) {
                //kiểm tra quyền admin hay guide
                if($user['role']=='admin') {
                    //lưu session
                    $_SESSION['admin']=$user;
                    //chuyển hướng trang admin tạm thời đợi làm dashboard
                    header('Location: '.BASE_URL.'?act=admin'); 
                    exit();

                }else {
                    $_SESSION['guide']=$user;
                    //chuyển hướng trang guide tạm thời đợi làm dashboard
                    header('Location: '.BASE_URL.'?act=guide');
                    exit();
                }
        }

    }
}

/////////////////////////////////////////        phần đăng kí       /////////////////////////////////////////
public function register(){
    require_once BASE_URL_VIEWS.'login/register.php';
}

public function formregister(){
    if(isset($_POST['register'])){
        $fullname=$_POST['fullname'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $password=$_POST['password'];
        $confirm_password=$_POST['confirm_password'];
        $existingUser = $this->modelUser->checkMail($email);
        if($password!==$confirm_password){
            echo "<script>alert('Mật khẩu không khớp, vui lòng nhập lại!'); window.location='".BASE_URL."?act=register';</script>";
            exit();
        }
        //kiểm tra email đã tồn tại chưa
        
        if($existingUser){
            echo "<script>alert('Email đã tồn tại, vui lòng sử dụng email khác!'); window.location='".BASE_URL."?act=register';</script>";
            exit();
        }

        // Nếu không có lỗi, tiến hành đăng ký
          //vì là bảo mật 
           //dùng password_hash() là hàm của PHP dùng để mã hoá mật khẩu trước khi lưu vào cơ sở dữ liệu
           //PASSWORD_DEFAULT là thuật toán mã hoá mặc định của PHP (hiện tại là bcrypt)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->modelUser->register($fullname, $email, $hashedPassword, $phone, $address);
        echo "<script>alert('Đăng ký thành công! Vui lòng đăng nhập.'); window.location='".BASE_URL."?act=login';</script>";
        exit();
    }

}


/////////////////////////////////////////        phần quên mật khẩu      /////////////////////////////////////////
public function forgotpass(){
    require_once BASE_URL_VIEWS.'login/forgotpass.php';
}
function formforgotpassword() {
    if(isset($_POST['submit'])){
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $newpassword = $_POST['newpassword'];
        $confirmpassword = $_POST['confirmpassword'];

        // Kiểm tra mật khẩu mới và xác nhận mật khẩu có khớp không
        if ($newpassword !== $confirmpassword) {
            echo "<script>alert('Mật khẩu mới và xác nhận mật khẩu không khớp!'); window.location='".BASE_URL."?act=forgotpassword';</script>";
            exit();
        }

        // Kiểm tra thông tin người dùng trong cơ sở dữ liệu
        $user = $this->modelUser->checkUserForPasswordReset($fullname, $email, $phone);
        if (!$user) {
            echo "<script>alert('Thông tin không hợp lệ hoặc tài khoản không tồn tại!'); window.location='".BASE_URL."?act=forgotpassword';</script>";
            exit();
        }

        // Cập nhật mật khẩu mới (mã hóa trước khi lưu)
        $hashedNewPassword = password_hash($newpassword, PASSWORD_DEFAULT);
        $this->modelUser->updatePassword($email, $hashedNewPassword);

        echo "<script>alert('Mật khẩu đã được đặt lại thành công! Vui lòng đăng nhập với mật khẩu mới.'); window.location='".BASE_URL."?act=login';</script>";
        exit();
    }

}



}
