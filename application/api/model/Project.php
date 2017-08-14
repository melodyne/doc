<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/9
 * Time: 15:22
 */

namespace app\api\model;
use think\Model;


class Project extends Model
{
    public function website(){
        return $this->hasMany('Website','pro_id','pro_id');
    }
}