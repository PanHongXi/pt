<?php
namespace app\index\controller;

use think\Controller;

class Product extends Controller
{
    public function pList()
    {
        $id = input('id');

        return 2 ;
    }

    public function details()
    {
        return 1 ;
    }
}