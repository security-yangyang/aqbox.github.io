<?php
namespace Manager\Controller;

use Think\Controller;
use Think\Verify;

class SettingController extends Controller
{

    public function index()
    {
        $this->display();
    }

    public function xtsz()
    {
        $this->show('系统设置');
    }
}