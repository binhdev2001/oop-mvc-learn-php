<?php
class UserCtrl extends Controller
{
    public $loadModel;
    private $userData;
    public function __construct()
    {
        $this->loadModel = $this->loadModel('UserModel');  // Gọi File Models thên tên truyền vào
        // $userModel = $this->loadModel;
        if (!empty($_POST['signup_user'])) {
            $this->SignupUser();
        }
        if (!empty($_SESSION['userinfo'])) {
            $this->ViewTheme('theme/Account-info');
            if (!empty($_POST['logout_user'])) {
                $this->logoutUser();
            }
        } else {
            $error = $this->loginUser();
            $this->ViewTheme('theme/Loginpage');
        }


    }
    public function SignupUser()
    {
        $username = $password = $fullName = NULL;
        $check_error = true;
        $error['email_user'] = $error['password'] = $error['display_name'] = NULL;
        if (!empty($_POST['signup_user'])) {
            if (empty($_POST['email_user'])) {
                $error['email_user'] = 'Vui lòng điền email';
                $check_error = false;
            } else {
                $email_user = $_POST['email_user'];
            }
            if (empty($_POST['password'])) {
                $error['password'] = 'Vui lòng điền mật khẩu';
                $check_error = false;
            } else {
                $password = md5($_POST['password']);
            }
            if (empty($_POST['display_name'])) {
                $error['display_name'] = 'Vui lòng điền tên người dùng';
                $check_error = false;

            } else {
                $display_name = $_POST['display_name'];
            }

            if ($check_error) {  // $check_error = true; == không tồn tại lỗi
                $result = $this->loadModel->SignupUserModel($email_user, $password, $display_name);
                if (!empty($result) && $result['status'] == 1) {
                    echo "<script>alert('" . $result['msg'] . "')</script>";
                    echo "<script>window.location.href = '" . siteUrl . "/dang-nhap';   </script>";
                } else {
                    echo "<script>alert('" . $result['msg'] . "')</script>";
                }
            } else {
                echo "<script>alert(' Vui lòng điền đủ thông tin đăng kí !')</script>";
            }
        }
    }
    public function loginUser()
    {

        $username = $password = $fullName = NULL;
        $error = array();
        $error['email_user'] = $error['password'] = NULL;
        if (!empty($_POST['login_user'])) {
            if (empty($_POST['email_user'])) {
                $error['email_user'] = '* Cần điền tên đăng nhập';
                echo "<script>alert('" . $error['email_user'] . "')</script>";
            } else {
                $username = $_POST['email_user'];

            }
            if (empty($_POST['password'])) {
                $error['password'] = '* Cần điền mật khẩu';
                echo "<script>alert('" . $error['password'] . "')</script>";
            } else {
                $password = md5($_POST['password']);
            }

            if ($username && $password) {
                $result = $this->loadModel->loginUserModel($username, $password);
                if (!empty($result)) {
                    if ($result['status'] == 1) {
                        if ($result['user_role'] == 1) {
                            header('Location: wp-admin');
                        } else {
                            echo "<script>window.location.href = '" . siteUrl . "/thong-tin-tai-khoan';   </script>";

                        }
                    } else {
                        echo "<script>alert('" . $result['msg'] . "')</script>";
                        echo "<script>window.location.href = '" . siteUrl . "/dang-nhap';   </script>";
                    }

                } else {
                    echo "<script>alert('" . $result['msg'] . "')</script>";
                    echo "<script>window.location.href = " . siteUrl . ";   </script>";
                }
            }
        }

        return $error;
    }
    public function logoutUser()
    {

        unset($_SESSION['userinfo']); // Delete session user
        header('Location: trang-chu'); // Redirect go home page
    }
}