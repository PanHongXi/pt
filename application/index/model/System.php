<?php
namespace app\index\model;

use think\Model;
class System extends Model
{
    public function sys($id)
    {
        $sys = db('system')->where(array('id' => $id, 'show_nav' => 1))->find();

        return $sys;

    }
}