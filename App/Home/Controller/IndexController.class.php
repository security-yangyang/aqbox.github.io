<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->assign(COMPANY_NAME,C('COMPANY_NAME'));
        $this->assign(FOOTER_TEXT,C('FOOTER_TEXT'));
        $this->display();
    }
}