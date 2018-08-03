<?php
namespace app\admin\controller;

class Broad extends Base
{
    public function bList()
    {
        $list = db('broad')->paginate(20);
        $page = $list->render();
        $this->assign([
            'list' => $list,
            'page' => $page,
        ]);
        return view('broad/bList');
    }

    public function bAdd()
    {
        if (request()->isPost()) {
            $data = input('post.');

            //字段验证
            $validate = validate('Broad');
            if (!$validate->check($data)) {
                $msg = $validate->getError();
                return json_encode(['status' => 0, 'msg' => $msg]);
            }

            //获取图片
            if ($_FILES['thumb']['tmp_name']) {
                $data['thumb'] =str_replace('\\','/',$this->upload());
            }

            $add = db('broad')->insert($data);

            if ($add) {
                return json_encode(['status' => 1, 'msg' => '保存成功！', 'url' => 'bList']);
            } else {
                return json_encode(['status' => 0, 'msg' => '保存失败！']);
            }
        }
        //返回路径
        $urlList = url('admin/Broad/bList');
        $this->assign([
            'urlList' => $urlList,
        ]);
        return view('broad/bAdd');
    }

    public function bEdit($id)
    {

        $broad = db('broad');

        if (request()->isPost()) {
            $data = input('post.');

            //字段验证
            $validate = validate('Broad');
            if (!$validate->check($data)) {
                $msg = $validate->getError();
                return json_encode(['status' => 0, 'msg' => $msg]);
            }

            //获取图片
            if ($_FILES['thumb']['tmp_name']) {
                $data['thumb'] =str_replace('\\','/',$this->upload());
            }

            $add = $broad->where(array('id' => $id))->setField($data);

            if ($add) {
                return json_encode(['status' => 1, 'msg' => '保存成功！', 'url' => 'bList']);
            } else {
                return json_encode(['status' => 0, 'msg' => '保存失败！']);
            }
        }

        //获取数据
        $info = $broad->find($id);

        //返回路径
        $urlList = url('admin/Broad/bList');
        $this->assign([
            'urlList' => $urlList,
            'info'    => $info,
        ]);
        return view('broad/bEdit');
    }

    public function delete($ids)
    {
        $delete =  db('broad')->where(array('id' => $ids))->delete();
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