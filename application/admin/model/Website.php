<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/9
 * Time: 15:22
 */

namespace app\admin\model;
use app\common\model\Website as WebsiteModel;


class Website extends WebsiteModel
{
    protected $autoWriteTimestamp = true;
    protected $updateTime = false;
}