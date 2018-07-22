<?php
namespace Home\Controller;

use Think\Controller;
use Think\Think;

class NewsController extends Controller
{

    public function index()
    {
        $this->show('<div class="w-930" style="padding:30px 30px;overflow:scroll;overflow-x:hidden;">');
        $db = M(news);
        $ret = $db->field('*')->select();
        for ($i = 0; $i < count($ret); $i ++) {
            $_1[$i] = $ret[$i]['img_url'];
            $_2[$i] = $ret[$i]['title'];
            $_3[$i] = $ret[$i]['ltt_text'] . "......";
            $_4[$i] = $ret[$i]['id'];
            $this->show('<div class="media"><div class="media-left"><img style="width:100px;height:100px;" src="' . $_1[$i] . '" alt="" class="media-object" /></div><div class="media-body"><h4 class="media-heading"><a style="text-align:left;" href=/Home/News/view?id=' . $_4[$i] . '>' . $_2[$i] . '</a></h4><p>' . $_3[$i] . '</p></div></div><hr/>');
        }
        $this->show("<div style='text-align:center;'>已经到底了</div></div>");
        echo "<script>var height = $(window).height()-140;$('.w-930').css('height',height+'px');</script>";
    }

    public function view()
    {
        $this->assign(COMPANY_NAME, C('COMPANY_NAME'));
        $this->assign(FOOTER_TEXT, C('FOOTER_TEXT'));
        $text_id = $_GET['id'];
        $db = M(news);
        $ret = $db->field('*')
            ->where('id=' . $text_id)
            ->select();
        $this->assign('title', $ret[0]['title']);
        $this->assign('user', $ret[0]['user']);
        $this->assign('time', $ret[0]['create_time']);
        $this->assign('content', $ret[0]['content']);
        if ($_SESSION['AUTHOR'] == $ret[0]['user']) {
            $this->assign('edit', '<span class="glyphicon glyphicon-edit"><a href="/Manager/Index/edit?id=' . $text_id . '">编辑</a></span>');
            $this->assign('delete', '<span class="glyphicon glyphicon-remove"><a class="delete" data-toggle="modal" data-target="#myModal" href="javascript:;" src="/Manager/Index/delete?id=' . $text_id . '">删除</a></span>');
        }
        if ($ret[0]['content'] == null) {
            exit('非法的访问');
        }
        $this->display();
    }
}