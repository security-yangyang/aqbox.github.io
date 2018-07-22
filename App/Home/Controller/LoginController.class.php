<?php
namespace Home\Controller;

use Think\Controller;
use Think\Verify;

class LoginController extends Controller
{

    public function index()
    {
        if (C('VERTIFY')) {
            $this->assign('vertify', '<div class="input-box"><span class="uic glyphicon glyphicon-alert"></span><input style="width: 160px;" class="user vertify form-control" placeholder="验证码" type="text" class="vertify" /><img /></div>');
            $this->assign('reg_btn', '<div class="input-box"><span class="reg_err">*输入错误</span><span class="cg label label-success">用户添加成功</span><input type="submit" style="width:100%;" class="btn btn-primary reg_btn" value="登录" /></div>');
            $this->assign('err_btn', '<div class="input-box"><span class="err">*输入错误</span><input type="submit" style="width:100%;" class="btn btn-primary login_btn" value="登录" /></div>');
        } else {
            $this->assign('vertify', null);
            $this->assign('reg_btn', '<div style="padding-top:10px" class="input-box"><span class="reg_err">*输入错误</span><span class="cg label label-success">用户添加成功</span><input type="submit" style="width:100%;margin-top:10px" class="btn btn-primary reg_btn" value="登录" /></div>');
            $this->assign('err_btn', '<div style="padding-top:10px" class="input-box"><span class="err">*输入错误</span><input type="submit" style="width:100%;margin-top:10px" class="btn btn-primary login_btn" value="登录" /></div>');
        }
        if (! isset($_SESSION['REAL_NAME'])) {
            $this->display();
        }
        // $this->redirect($url)
    }

    public function act()
    {
        switch ($_GET['act']) {
            case "login":
                $username = $_POST['username'];
                $password = $_POST['password'];
                $vertify = $_POST['vertify'];
                $this->Login_Sign($username, $password, $vertify);
                break;
            case "pwdmodify":

                break;
            case "register":
                $username = $_POST['username'];
                $password1 = $_POST['password1'];
                $password2 = $_POST['password2'];
                $real_name = $_POST['real_name'];
                $email = $_POST['email'];
                $vertify = $_POST['vertify'];
                $this->Register($username, $password1, $password2, $real_name, $email, $vertify);
                break;
            case "logout":
                $this->logout();
                echo "<script>window.location.href='/'</script>";
                break;
            default:
                break;
        }
    }

    protected function eqpwd($pwd1, $pwd2)
    {
        if ($pwd1 != $pwd2) {
            $this->ajaxReturn([
                'code' => 400,
                'msg' => '两次密码不正确'
            ]);
            return false;
        }
        return true;
    }

    protected function Login_Sign($username, $password, $vertify = null)
    {
        if (C('VERTIFY')) {
            if ($vertify != $_SESSION['VERTIFY']) {
                $this->ajaxReturn(json_encode([
                    'code' => 400,
                    'msg' => '验证码输入不正确！'
                ]));
            } else {
                $this->NotEmpty($username, $password, null, null, "login");
            }
        } else {
            $this->NotEmpty($username, $password, null, null, "login");
        }
    }

    protected function NotEmpty($username, $password, $rel_name = null, $email = null, $a = null)
    {
        if (empty($username) || empty($password)) {
            $this->ajaxReturn([
                'code' => 400,
                'msg' => '用户名或密码不能为空'
            ]);
        }
        if ($a == "login") {
            $this->userAuth($username, $password);
        } elseif ($a == "register") {
            if (! $this->pwdlt($password)) {
                $this->ajaxReturn([
                    'code' => 400,
                    'msg' => '密码长度不能小于8位'
                ]);
            }
            $this->user_register($username, $password, $rel_name, $email);
        }
    }

    protected function Register($username, $password1, $password2, $real_name, $email, $vertify = null)
    {
        if (C('VERTIFY')) {
            if ($vertify != $_SESSION['VERTIFY']) {
                $this->ajaxReturn(json_encode([
                    'code' => 400,
                    'msg' => '验证码输入不正确！'
                ]));
            }
            if ($this->eqpwd($password1, $password2)) {
                if ($this->isName($username)) {
                    $this->NotEmpty($username, $password1, $real_name, $email, $a = "register");
                } else {
                    return $this->isName($username);
                }
            }
        }
        if ($this->eqpwd($password1, $password2)) {
            if ($this->isName($username)) {
                $this->NotEmpty($username, $password1, $real_name, $email, $a = "register");
            } else {
                return $this->isName($username);
            }
        }
    }

    protected function isName($username)
    {
        $db = $this->dbConnect();
        $ret = $db->field('*')
            ->where('username="' . $username . '"')
            ->select();
        if (count($ret) != null) {
            $this->ajaxReturn([
                'code' => 400,
                'msg' => '用户名已存在'
            ]);
            return false;
        } else {
            return true;
        }
    }

    /**
     * 数据库实例化
     *
     * @return \Think\Model
     */
    protected function dbConnect()
    {
        return M(user);
    }

    /**
     * 用户登录
     *
     * @param string $username
     * @param string $password
     */
    protected function userAuth($username, $password)
    {
        $db = $this->dbConnect();
        $relute = $db->field('*')
            ->where('USERNAME="' . $username . '"')
            ->select();
        if (strtoupper($username) == strtoupper($relute[0]['username']) && sha1($password) == $relute[0]['password']) {
            $_SESSION['REAL_NAME'] = "欢迎您，" . $relute[0]['real_name'];
            $this->ajaxReturn([
                'code' => 200,
                'msg' => 'User Login success.',
                'data' => [
                    'uid' => $relute[0]['uid'],
                    'username' => $_SESSION['REAL_NAME']
                ]
            ]);
        } else {
            $this->ajaxReturn([
                'code' => 400,
                'msg' => 'User Login Error.'
            ]);
        }
    }

    protected function pwdlt($pwd)
    {
        if (strlen($pwd) < 8) {
            return false;
        }
        return true;
    }

    protected function user_register($usr, $pwd, $rel_name, $email)
    {
        $db = $this->dbConnect();
        $data['username'] = $usr;
        $data['password'] = sha1($pwd);
        $data['real_name'] = $rel_name;
        $data['email'] = $email;
        $data['date'] = date("Y-m-d H:i:s");

        if ($db->add($data)) {
            $this->ajaxReturn([
                'code' => 200,
                'msg' => 'Register Users Success.'
            ]);
        } else {
            $this->ajaxReturn([
                'code' => 400,
                'msg' => 'Register Users Error.'
            ]);
        }
    }

    protected function logout()
    {
        if (! empty($_SESSION['REAL_NAME'])) {
            $_SESSION['REAL_NAME'] = null;
            unlink(str_replace("\\", "/", session_save_path()) . "/sess_" . session_id());
        }
    }

    /**
     * 判断新旧密码一致性
     *
     * @param string $pwd1
     * @param string $pwd2
     * @param string $pwd3
     * @return boolean
     */
    // protected function eqpwd($pwd1, $pwd2, $pwd3)
    // {
    // if ($pwd1 == $pwd2 || $pwd2 != $pwd3) {
    // return false;
    // }
    // return true;
    // }

    /**
     * 修改密码
     *
     * @param string $username
     * @param string $password
     * @param string $password1
     * @param string $password2
     */
    protected function pwdModify($username, $password, $password1, $password2)
    {
        if ($this->eqpwd($password, $password1, $password2)) {
            $db = $this->dbConnect();
            $relute = $db->field('PASSWORD')
                ->where('USERNAME="' . $username . '"')
                ->select();
            if (sha1($password) == $relute[0]['password']) {
                $db->where('username=' . $username)->save([
                    'password' => sha1($password1)
                ]);
                // 还未加入强制注销登录的逻辑
                $this->ajaxReturn([
                    'code' => 200,
                    'msg' => 'Success'
                ]);
            }
        } else {
            $this->ajaxReturn([
                'code' => 400,
                'msg' => 'Error'
            ]);
        }
    }
}