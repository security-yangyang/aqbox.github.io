<?php
namespace Manager\Controller;

use Think\Controller;
use Think\Verify;

class LoginController extends Controller
{

    public function index()
    {
        if (C('VERTIFY')) {
            $this->assign('vertify', '<div class="input-box"><span class="uic glyphicon glyphicon-alert"></span><input style="width: 160px;" class="user vertify form-control" placeholder="验证码" type="text" class="vertify" /><img /></div>');
            $this->assign('err_btn', '<div class="input-box"><span class="err">*输入错误</span><input type="submit" style="width:100%;" class="btn btn-primary login_btn" value="登录" /></div>');
        } else {
            $this->assign('vertify', null);
            $this->assign('err_btn', '<div style="padding-top:10px" class="input-box"><span class="err">*输入错误</span><input type="submit" style="width:100%;margin-top:10px" class="btn btn-primary login_btn" value="登录" /></div>');
        }
        $this->assign(COMPANY_NAME, C('COMPANY_NAME'));
        $this->assign(FOOTER_TEXT, C('FOOTER_TEXT'));
        if (empty($_SESSION['MANAGER'])) {
            $this->display();
        } else {
            echo "<script>window.location.href='/Manager/Index/index'</script>";
        }
    }

    public function act()
    {
        switch ($_GET['act']) {
            case "Login":
                $username = $_POST['username'];
                $password = $_POST['password'];
                $vertify = $_POST['vertify'];
                $this->Login_Sign($username, $password, $vertify);
                break;
            case "pwdmodify":

                break;
            case "logout":
                $this->logout();
                echo "<script>window.location.href='/Manager/Index/index'</script>";
                break;
            default:

                break;
        }
    }

    protected function Login_Sign($username, $password, $vertify = null)
    {
        if (C('VERTIFY')) {
            if ($vertify != $_SESSION['VERTIFY']) {
                $this->ajaxReturn(json_encode([
                    'code' => 400,
                    'msg' => '验证码输入不正确！'
                ]));
            }
            $this->NotEmpty($username, $password, $a = "login");
        }
        $this->NotEmpty($username, $password, $a = "login");
    }

    protected function NotEmpty($username, $password)
    {
        if (empty($username) || empty($password)) {
            $this->ajaxReturn([
                'code' => 400,
                'msg' => '用户名或密码不能为空！'
            ]);
        }
        $this->userAuth($username, $password);
    }

    /**
     * 数据库实例化
     *
     * @return \Think\Model
     */
    protected function dbConnect()
    {
        return M(htuser);
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
            $_SESSION['MANAGER'] = "欢迎您，" . $relute[0]['real_name'];
            $_SESSION['AUTHOR'] = $relute[0]['real_name'];
            $this->ajaxReturn([
                'code' => 200,
                'msg' => 'success',
                'data' => [
                    'uid' => $relute[0]['uid'],
                    'username' => $_SESSION['MANAGER']
                ]
            ]);
        }
        $this->ajaxReturn([
            'code' => 400,
            'msg' => 'Error'
        ]);
    }

    protected function logout()
    {
        if (! empty($_SESSION['MANAGER']) || ! empty($_SESSION['AUTHOR'])) {
            $_SESSION['MANAGER'] = null;
            $_SESSION['AUTHOR'] = null;
            unlink(str_replace("\\", "/", session_save_path()) . "/sess_" . session_id());
        }
    }
}