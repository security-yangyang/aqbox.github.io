<?php
namespace Manager\Controller;

use Think\Controller;
use Think\Verify;

class UserController extends Controller
{
    
    public function check(){
        if (isset($_SESSION['MANAGER'])) {
            $this->display();
        } else {
            echo "<script>window.location.href='/Manager/Login/index'</script>";
        }
    }

    public function index()
    {
        $this->check();
        $this->display();
    }

    public function yhgl()
    {
        $this->check();
        $this->show('用户管理');
    }
}