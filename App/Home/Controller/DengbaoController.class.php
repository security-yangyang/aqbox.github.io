<?php
namespace Home\Controller;

use Think\Controller;
use Think\Think;

class DengbaoController extends Controller
{

    public function is_login()
    {
        if (empty($_SESSION['REAL_NAME'])) {
            $this->ajaxReturn(400);
            return false;
        }
        return true;
    }

    public function zzdj()
    {
        if ($this->is_login()) {
            $this->display('index');
        }
    }

    public function dbmn()
    {
        if ($this->is_login()) {
            $this->show('等保模拟');
        }
    }

    public function dbzc()
    {
        if ($this->is_login()) {
            $this->show('等保自查');
        }
    }
}