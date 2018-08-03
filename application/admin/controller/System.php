<?php
namespace app\admin\controller;

use think\Controller;

class System extends Base
{
    public function sList()
    {
        //获取数据
        $list = db('system')->paginate(20);
        $page = $list->render();
        //输出
        $this->assign([
            'list' => $list,
            'page' => $page,
        ]);

        return view('system/sList');
    }

    public function sAdd()
    {
        if (request()->isPost()) {
            $data = input('post.');

            //字段验证
            $validate = validate('System');
            if (!$validate->check($data)) {
                $msg = $validate->getError();
                return json_encode(['status' => 0, 'msg' => $msg]);
            }

            //获取图片
            if ($_FILES['thumb']['tmp_name'])
            {
                $data['thumb'] = $this->upload();
            }


            $add = db('system')->insert($data);

            if ($add) {
                return json_encode(['status' => 1, 'msg' => '保存成功！', 'url' => 'sList']);
            } else {
                return json_encode(['status' => 0, 'msg' => '保存失败！']);
            }
        }

        //返回路径
        $urlList = url('admin/System/sList');
        $this->assign([
            'urlList' => $urlList,
        ]);
        return view('system/sAdd');
    }

    public function sEdit($id)
    {
        $system = db('system');

        if (request()->isPost()) {
            $data = input('post.');

            //字段验证
            $validate = validate('System');
            if (!$validate->check($data)) {
                $msg = $validate->getError();
                return json_encode(['status' => 0, 'msg' => $msg]);
            }

            //获取图片
            if ($_FILES['thumb']['tmp_name'])
            {
                $data['thumb'] = $this->upload();
            }

            $add = $system->where(array('id' => $id))->setField($data);

            if ($add) {
                return json_encode(['status' => 1, 'msg' => '保存成功！', 'url' => 'sList']);
            } else {
                return json_encode(['status' => 0, 'msg' => '保存失败！']);
            }
        }

        //获取数据
        $info = $system->where(array('id' => $id))->find();

        //返回路径
        $urlList = url('admin/System/sList');

        //输出
        $this->assign([
            'info' => $info,
            'urlList' => $urlList,
        ]);

        return view('system/sEdit');
    }

    public function delete($ids)
    {
        $delete =  db('system')->where(array('id' => $ids))->delete();
        if ($delete) {
            return json_encode(['status' => 1, 'msg' => '删除成功！', 'url' => 'navList']);
        } else {
            return json_encode(['status' => 0, 'msg' => '删除失败！']);
        }
    }

    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('thumb');

        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'static' .DS. 'uploads');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
                return $info->getSaveName();

            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }
}