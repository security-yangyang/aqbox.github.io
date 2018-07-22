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
}