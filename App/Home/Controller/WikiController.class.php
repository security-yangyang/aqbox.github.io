<?php
namespace Home\Controller;

use Think\Controller;
use Think\Think;

class WikiController extends Controller
{

    public function wiki()
    {
        $this->show('知识库');
    }
}