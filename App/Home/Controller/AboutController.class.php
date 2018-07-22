<?php
namespace Home\Controller;

use Think\Controller;
use Think\Think;

class AboutController extends Controller
{

    public function about()
    {
        $this->show('联系我');
    }
}