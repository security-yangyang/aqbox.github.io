<?php
namespace Manager\Controller;

use Think\Controller;

class IndexController extends Controller
{

    public function index()
    {
        $this->assign(COMPANY_NAME, C('COMPANY_NAME'));
        $this->assign(FOOTER_TEXT, C('FOOTER_TEXT'));
        if (isset($_SESSION['MANAGER'])) {
            $this->display();
        } else {
            echo "<script>window.location.href='/Manager/Login/index'</script>";
        }
    }

    protected function emptyContent($par1, $type_text, $strMinLength = 1)
    {
        if (strlen($par1) < $strMinLength) {
            $this->ajaxReturn([
                'code' => 400,
                'msg' => $type_text . '不能为空'
            ]);
            return false;
        }
        return true;
    }

    public function delete()
    {
        $db = M('news');
        $text_id = $_GET['id'];

        if ($db->where('id="' . $text_id . '"')->delete()) {
            $this->ajaxReturn([
                'code' => 200,
                'msg' => '删除成功'
            ]);
        } else {
            $this->ajaxReturn([
                'code' => 400,
                'msg' => '未知错误'
            ]);
        }
    }

    public function addContent()
    {
        $data['title'] = $_POST['title'];
        $data['img_url'] = $_POST['url'];
        $data['content'] = $_POST['content'];
        $data['user'] = $_SESSION['AUTHOR'];
        $data['ltt_text'] = substr($_POST['head_text'], 0, 634);
        $data['create_time'] = date("Y-m-d H:i:s");

        if ($this->emptyContent($data['title'], "标题")) {
            if ($this->emptyContent($data['img_url'], "图片地址")) {
                if ($this->emptyContent($data['content'], "正文", "14")) {
                    $this->writeContent($data);
                } else {
                    $this->emptyContent($data['content'], "正文", "14");
                }
            } else {
                $this->emptyContent($data['img_url'], "图片地址");
            }
        } else {
            $this->emptyContent($data['title'], "标题");
        }
    }

    protected function writeContent($data)
    {
        $db = M('news');
        $db->add($data);

        $this->ajaxReturn([
            'code' => 200,
            'msg' => 'Success'
        ]);
    }

    public function modify()
    {
        $data['title'] = $_POST['title'];
        $data['img_url'] = $_POST['url'];
        $data['content'] = $_POST['content'];
        $data['user'] = $_SESSION['AUTHOR'];
        $data['ltt_text'] = substr($_POST['head_text'], 0, 634);
        $data['create_time'] = date("Y-m-d H:i:s");

        $db = M('news');
        $db->where('id=' . $_GET['id'])->save($data);
        $this->assign('content', '');
        $this->ajaxReturn([
            'code' => 200,
            'msg' => 'Success'
        ]);
    }

    public function edit()
    {
        if (isset($_SESSION['MANAGER'])) {
            $this->assign(COMPANY_NAME, C('COMPANY_NAME'));
            $this->assign(FOOTER_TEXT, C('FOOTER_TEXT'));
            $text_id = $_GET['id'];
            $db = M(news);
            $ret = $db->field('*')
                ->where('id=' . $text_id)
                ->select();
            $this->assign('title', $ret[0]['title']);
            $this->assign('url', $ret[0]['img_url']);
            $this->assign('content', $ret[0]['content']);
            $this->assign('text_id', $text_id);
            $this->display();
        } else {
            echo "<script>window.location.href='/Manager/Login/index'</script>";
        }
    }
}