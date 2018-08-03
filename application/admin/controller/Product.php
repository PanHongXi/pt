<?php
namespace app\admin\controller;

use Catetree\Catetree;

class Product extends Base
{
    public function plist()
    {
//        if (request()->isGet()) {
//            $data = input('get.');
//
//            //设置分页数
//            if ($data['pageSize']) {
//                $pageSize = $data['pageSize'];
//            } else {
//                $pageSize = 20;
//            }
//
//            //搜索
//            $map['pname']=array('like',''.$data['searchValue'].'%');
//        }
        //获取数据
        $pList = db('product')
            ->alias('p')
//            ->where($map)
            ->join('nav n', 'p.nid=n.id', 'LEFT')
            ->field('p.*,n.nav_name')
            ->order('id desc')
            ->paginate(20);

        $page = $pList->render();

        $this->assign([
            'pList' => $pList,
            'page' => $page,
//            'val' => $data['searchValue'],
        ]);
        return view();
    }

    public function padd()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $data['time'] = time();

            $validate = validate('product');
            if (!$validate->check($data)) {
                $msg = $validate->getError();
                return json_encode(['status' => 1, 'msg' => $msg, 'url' => 'plist']);
            }

            if ($_FILES['thumb']['tmp_name'])
            {
                $data['thumb'] = $this->upload();
            }

            $product = db('product')->insert($data);
            if ($product) {
                return json_encode(['status' => 1, 'msg' => '保存成功！', 'url' => 'plist']);
            } else {
                return json_encode(['status' => 0, 'msg' => '保存失败！']);
            }
        }

        //获取分类数据
        $navTree = new Catetree();
        $navObj = db('nav');
        $navRes = $navObj->order('orders asc')->select();
        $navList = $navTree->catetree($navRes);

        //返回路径
        $urlList = url('admin/Product/plist');
        $this->assign([
            'navList' => $navList,
            'urlList' => $urlList,
        ]);
        return view();
    }

    //修改
    public function pEdit($id)
    {
        $product = db('product');
        if (request()->isPost()) {
            $data = input('post.');
            $data['time'] = time();

            $validate = validate('product');
            if (!$validate->check($data)) {
                $msg = $validate->getError();
                return json_encode(['status' => 1, 'msg' => $msg, 'url' => 'plist']);
            }

            if ($_FILES['thumb']['tmp_name'])
            {
                //删除旧图片
                $oldimg = $product->where(array('id' => $id))->find();
                $oldimg = GOODS_THUMB.$oldimg['thumb'];
                if (file_exists($oldimg))
                {
                    @unlink($oldimg);
                }

                $data['thumb'] = $this->upload();
            }
            $product = $product->where(array('id' => $id))->setField($data);
            if ($product) {
                return json_encode(['status' => 1, 'msg' => '保存成功！', 'url' => 'plist']);
            } else {
                return json_encode(['status' => 0, 'msg' => '保存失败！']);
            }
        }

        //获取分类数据
        $navTree = new Catetree();
        $navObj = db('nav');
        $navRes = $navObj->order('orders asc')->select();
        $navList = $navTree->catetree($navRes);

        //返回路径
        $urlList = url('admin/Product/plist');

        //获取数据
        $info = $product->where(array('id' =>$id))->find();
        $this->assign([
            'info' => $info,
            'navList' => $navList,
            'urlList' => $urlList,
        ]);

        return view('product/pEdit');
    }

    //删除
    public function delete($ids)
    {
        $delete = db('product')->where(array('id' => $ids))->delete();
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