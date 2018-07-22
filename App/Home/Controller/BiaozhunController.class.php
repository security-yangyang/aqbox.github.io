<?php
namespace Home\Controller;

use Think\Controller;
use Think\Think;

class BiaozhunController extends Controller
{

    public function lgb()
    {
        $this->show('老国标');
    }

    public function xgb()
    {
        $this->show('新国标');
    }

    public function hybz()
    {
        $this->show('行业标准');
    }
}