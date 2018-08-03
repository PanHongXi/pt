<?php

namespace app\admin\controller;

use Catetree\Catetree;

class Nav extends Base
{
    public function navList()
    {
        $navTree = new Catetree();
        $navObj = db('nav');

        $navRes = $navObj->order('orders asc')->paginate(20);
        $page = $navRes->render();
        $navList = $navTree->catetree($navRes);

        $this->assign([
            'navList' => $navList,
            'page' => $page,
        ]);

        return view('nav/navList');
    }

    public function navAdd()
    {
        $navObj = db('nav');
        if (request()->isPost()) {
            $data = input('post.');

            $data['position'] = implode(',', $data['position']);

            $validate = validate('Nav');
            if (!$validate->check($data)) {
                $msg = $validate->getError();
                return json_encode(['status' => 0, 'msg' => $msg]);
            }

            $add = $navObj->insert($data);

            if ($add) {
                return json_encode(['status' => 1, 'msg' => '保存成功！', 'url' => 'navList']);
            } else {
                return json_encode(['status' => 0, 'msg' => '保存失败！']);
            }
        }

        //获取树形导航列表
        $navTree = new Catetree();
        $navRes = $navObj->order('orders asc')->select();
        $nav = $navTree->catetree($navRes);

        //返回路径
        $urlList = url('admin/Nav/navList');
        $this->assign([
            'nav' => $nav,
            'urlList' => $urlList,
        ]);

        return view('nav/navAdd');
    }

    //导航修改
    public function navEdit($id)
    {
        $navObj = db('nav');

        if (request()->isPost()) {
            $data = input('post.');

            $data['position'] = implode(',', $data['position']);

            $validate = validate('Nav');
            if (!$validate->check($data)) {
                $msg = $validate->getError();
                return json_encode(['status' => 0, 'msg' => $msg]);
            }

            $add = $navObj->where(array('id' => $data['id']))->setField($data);

            if ($add) {
                return json_encode(['status' => 1, 'msg' => '保存成功！', 'url' => 'navList']);
            } else {
                return json_encode(['status' => 0, 'msg' => '保存失败！']);
            }
        }

        //获取数据
        $navList = $navObj->where(array('id' => $id))->find();

        //获取树形导航列表
        $navTree = new Catetree();
        $navRes = $navObj->order('orders asc')->select();
        $nav = $navTree->catetree($navRes);

        //返回路径
        $urlList = url('admin/Nav/navList');

        //输出
        $this->assign([
            'nav' => $nav,
            'navList' => $navList,
            'urlList' => $urlList,
        ]);

        return view('nav/navEdit');
    }

    //导航删除
    public function delete($ids)
    {
        $navRes = db('nav');
        $navTree = new Catetree();
        $sonids = $navTree->childrenids($ids, $navRes);
        $sonids[] = intval($ids);//获取本栏目的id

        $delete = $navRes->delete($sonids);
        if ($delete) {
            return json_encode(['status' => 1, 'msg' => '删除成功！', 'url' => 'navList']);
        } else {
            return json_encode(['status' => 0, 'msg' => '删除失败！']);
        }
    }

}
