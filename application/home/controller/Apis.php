<?php
namespace app\home\controller;

use think\Controller;
use app\home\model\Links as LinksModel;

class Apis extends Controller
{
    public function index()
    {
		$list = LinksModel::all();
		$this->assign("linksList",$list);
        return $this->fetch();
    }
}
