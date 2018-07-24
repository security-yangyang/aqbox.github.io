<?php
namespace Manager\Controller;

use Think\Controller;
use Think\Verify;

class StandardController extends Controller
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

    public function xgb()
    {
        $this->check();
        $this->show('新国标');
    }

    public function lgb()
    {
        $this->check();
        $this->show('老国标');
    }

    public function hybz()
    {
        $this->check();
        $this->show('行业标准');
    }
}