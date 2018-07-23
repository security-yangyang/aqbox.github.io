<?php
namespace Manager\Controller;

use Think\Controller;
use Think\Verify;

class UserController extends Controller
{

    public function index()
    {
        $this->display();
    }

    public function yhgl()
    {
        $this->show('用户管理');
    }
}