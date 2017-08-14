<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/9
 * Time: 15:22
 */

namespace app\admin\model;
use think\Model;
use common\model\Project as ProjectModel;


class Project extends ProjectModel
{
    public function website(){
        return $this->hasMany('Website','pro_id','pro_id');
    }
}