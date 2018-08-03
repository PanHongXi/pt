<?php

namespace app\admin\model;

use think\Model;

class Product extends Model
{
    protected $field = true;

    protected static function init()
    {

        //后置钩子方法获取商品的id
        Product::afterInsert(function ($product) {
            $goodsData = input('post.');//接收商品的数据
            $id = $product->id;//接收商品的id

            //处理商品相册上传的图片
            if ($product->_hasImages($_FILES['photos']['tmp_name'])) {
                // 获取表单上传文件
                $files = request()->file('photos');

                foreach ($files as $file) {

                    // 移动到框架应用根目录/public/uploads/ 目录下
                    $info = $file->move(ROOT_PATH . 'public' . DS . 'static' . DS . 'uploads' . DS . 'product');

                    if ($info) {

                        // 输出 42a79759f284b767dfcb2a0197904287.jpg
                        $photoName = $info->getFilename();
                        $ogPhoto = date('Ymd') . DS . $photoName;//原图
                        $bigPhoto = date('Ymd') . DS . 'big_' . $photoName;//大图
                        $midPhoto = date('Ymd') . DS . 'mid_' . $photoName;//中图
                        $smPhoto = date('Ymd') . DS . 'sm_' . $photoName;//小图

                        //生成商品主图缩略图
                        $image = \think\Image::open(GOODS_THUMB . $ogPhoto);

                        // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
                        $image->thumb(300, 230)->save(GOODS_THUMB . $bigPhoto);
                        $image->thumb(270, 200)->save(GOODS_THUMB . $midPhoto);
                        $image->thumb(120, 100)->save(GOODS_THUMB . $smPhoto);
                        db('photos')->insert(['id' => $id, 'sm_photo' => $smPhoto, 'mb_photo' => $midPhoto, 'big_photo' => $bigPhoto, 'og_photo' => $ogPhoto]);
                    } else {
                        // 上传失败获取错误信息
                        echo $file->getError();
                    }
                }
            }
        });

        //后置钩子删除与商品有关的数据
        Product::beforeDelete(function ($product) {
            $goodsId = $product->id;

            //删除关联的商品相册
            $goodsPhotoRes = \model('Photos')->where('nid', '=', $goodsId)->select();
            if (!empty($goodsPhotoRes))
            {
                foreach ($goodsPhotoRes as $k => $v)
                {
                    $photo = [];
                    $photo[] = GOODS_THUMB . $v['og_photo'];
                    $photo[] = GOODS_THUMB . $v['big_photo'];
                    $photo[] = GOODS_THUMB . $v['mb_photo'];
                    $photo[] = GOODS_THUMB . $v['sm_photo'];
                    foreach ($photo as $k1 => $v1)
                    {
                        if (file_exists($v1))
                        {
                            @unlink($v1);
                            db('photos')->where(array('id' => $goodsId))->delete();
                        }
                    }
                }

            }
        });

        //前置钩子，处理修改上传的商品数据
        Product::beforeUpdate(function ($product) {
            $goodsData = input('post.');//接收商品的数据
            $id = $product->id;

            $product->uptime = time();//商品修改时间

            //处理修改商品的相册
            //处理商品相册上传的图片
            if ($product->_hasImages($_FILES['photos']['tmp_name'])) {

                // 获取表单上传文件
                $files = request()->file('photos');
                foreach ($files as $file) {

                    // 移动到框架应用根目录/public/uploads/ 目录下
                    $info = $file->move(ROOT_PATH . 'public' . DS . 'static' . DS . 'uploads' . DS . 'product');
                    if ($info) {
                        // 输出 42a79759f284b767dfcb2a0197904287.jpg
                        $photoName = $info->getFilename();
                        $ogPhoto = date('Ymd') . DS . $photoName;//原图
                        $bigPhoto = date('Ymd') . DS . 'big_' . $photoName;//大图
                        $midPhoto = date('Ymd') . DS . 'mid_' . $photoName;//中图
                        $smPhoto = date('Ymd') . DS . 'sm_' . $photoName;//小图

                        //生成商品主图缩略图
                        $image = \think\Image::open(GOODS_THUMB . $ogPhoto);

                        // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png
                        $image->thumb(300, 230)->save(GOODS_THUMB . $bigPhoto);
                        $image->thumb(270, 200)->save(GOODS_THUMB . $midPhoto);
                        $image->thumb(120, 100)->save(GOODS_THUMB . $smPhoto);
                        db('photos')->insert(['nid' => $id, 'sm_photo' => $smPhoto, 'mb_photo' => $midPhoto, 'big_photo' => $bigPhoto, 'og_photo' => $ogPhoto]);
                    } else {

                        // 上传失败获取错误信息
                        echo $file->getError();
                    }
                }
            }
        });
    }


    //判断商品相册是否有图片上传
    public function _hasImages($photoArr)
    {
        foreach ($photoArr as $k => $v) {
            if ($v) {
                return true;
            }
        }
        return false;
    }

    //处理上产图片的路径
    public function upload($imgName)
    {
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file($imgName);

        // 移动到框架应用根目录/public/uploads/ 目录下
        if ($file) {
            $info = $file->move(ROOT_PATH . 'public' . DS . 'static' . DS . 'uploads' . DS . 'product');
            if ($info) {
                return $info->getFilename();
            } else {

                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }
}