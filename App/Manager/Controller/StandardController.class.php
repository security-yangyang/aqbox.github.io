<?php
namespace Manager\Controller;

use Think\Controller;
use Think\Verify;

class StandardController extends Controller
{

    public function index()
    {
        $this->display();
    }

    public function xgb()
    {
        $this->show('新国标');
    }

    public function lgb()
    {
        $this->show('老国标');
    }

    public function hybz()
    {
        $this->show('行业标准');
    }
}