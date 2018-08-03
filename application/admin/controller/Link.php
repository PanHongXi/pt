<?php
namespace app\admin\controller;

class Link extends Base
{
    public function lList()
    {
        //获取数据
        $list = db('link')->paginate(20);
        $page = $list->render();
        //输出
        $this->assign([
            'list' => $list,
            'page' => $page,
        ]);

        return  view('link/lList');
    }

    public function lAdd()
    {
        if (request()->isPost()) {
            $data = input('post.');

            //字段验证
            $validate = validate('Link');
            if (!$validate->check($data)) {
                $msg = $validate->getError();
                return json_encode(['status' => 0, 'msg' => $msg]);
            }

            //链接处理
            if (false !== stripos(input('post.url'), 'http://')) {
                $data['url'] = input('post.url');
            } else {
                $data['url'] = 'http://' . input('post.url');
            }

            $add = db('link')->insert($data);
            if ($add) {
                return json_encode(['status' => 1, 'msg' => '保存成功！', 'url' => 'lList']);
            } else {
                return json_encode(['status' => 0, 'msg' => '保存失败！']);
            }
        }

       //返回路径
        $urlList = url('admin/Link/lList');

        //输出
        $this->assign([
            'urlList' => $urlList,
        ]);
        return view('link/lAdd');
    }

    public function lEdit($id)
    {
        $link = db('link');

        if (request()->isPost()) {
            $data = input('post.');

            //字段验证
            $validate = validate('Link');
            if (!$validate->check($data)) {
                $msg = $validate->getError();
                return json_encode(['status' => 0, 'msg' => $msg]);
            }

            //链接处理
            if (false !== stripos(input('post.url'), 'http://')) {
                $data['url'] = input('post.url');
            } else {
                $data['url'] = 'http://' . input('post.url');
            }

            $add = $link->setField($data);
            if ($add) {
                return json_encode(['status' => 1, 'msg' => '保存成功！', 'url' => 'lList']);
            } else {
                return json_encode(['status' => 0, 'msg' => '保存失败！']);
            }
        }

        //获取数据
        $info = $link->where(array('id' => $id))->find();

        //返回路径
        $urlList = url('admin/Link/lList');

        //输出
        $this->assign([
            'info' => $info,
            'urlList' => $urlList,
        ]);
        return view('link/lEdit');
    }

    public function delete($ids)
    {
        $delete =  db('link')->where(array('id' => $ids))->delete();
        if ($delete) {
            return json_encode(['status' => 1, 'msg' => '删除成功！', 'url' => 'navList']);
        } else {
            return json_encode(['status' => 0, 'msg' => '删除失败！']);
        }
    }
}